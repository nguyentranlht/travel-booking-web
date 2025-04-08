<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FacebookController extends Controller
{
    /**
     * Redirect the user to the Facebook authentication page.
     */
    public function redirectToFacebook(): RedirectResponse
    {
        try {
            $clientId = config('services.facebook.client_id');
            $redirectUri = config('services.facebook.redirect');
            
            // Add debug logging
            Log::info('Facebook OAuth client ID and redirect URI', [
                'client_id' => $clientId,
                'redirect_uri' => $redirectUri
            ]);
            
            if (empty($clientId)) {
                Log::error('Facebook OAuth Client ID is not configured.');
                return redirect()->route('login')->with('error', 'Facebook login is not configured properly. Please contact the administrator.');
            }
            
            $url = 'https://www.facebook.com/v18.0/dialog/oauth?' . http_build_query([
                    'client_id' => $clientId,
                    'redirect_uri' => $redirectUri,
                    'scope' => 'email',
                    'response_type' => 'code',
                    'auth_type' => 'rerequest',
                    'display' => 'popup'
            ]);
            
            Log::info('Redirecting to Facebook OAuth URL', ['url' => $url]);
            
            return redirect()->away($url);
        } catch (Exception $e) {
            Log::error('Error redirecting to Facebook: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Could not connect to Facebook. Please try again later.');
        }
    }

    /**
     * Handle the callback from Facebook.
     */
    public function handleFacebookCallback()
    {
        if (request()->has('error')) {
            return redirect()->route('login')
                ->with('error', 'Facebook authentication failed: ' . request()->error_description);
        }
        
        try {
            $code = request()->code;
            if (empty($code)) {
                return redirect()->route('login')
                    ->with('error', 'Authorization code not received from Facebook');
            }
            
            // Create a Guzzle client with SSL verification disabled
            $client = new Client([
                'verify' => false // Disable SSL verification - NOTE: This should not be used in production
            ]);
            
            // Exchange code for access token
            $tokenResponse = $client->get('https://graph.facebook.com/v18.0/oauth/access_token', [
                'query' => [
                    'client_id' => config('services.facebook.client_id'),
                    'client_secret' => config('services.facebook.client_secret'),
                    'redirect_uri' => config('services.facebook.redirect'),
                    'code' => $code,
                ]
            ]);
            
            $tokenData = json_decode($tokenResponse->getBody(), true);
            
            if (!isset($tokenData['access_token'])) {
                Log::error('Facebook token exchange failed: No access token received', ['response' => $tokenData]);
                return redirect()->route('login')
                    ->with('error', 'Failed to authenticate with Facebook: No access token received');
            }
            
            $accessToken = $tokenData['access_token'];
            Log::info('Successfully got access token from Facebook');
            
            // Get user info with access token
            $userResponse = $client->get('https://graph.facebook.com/v18.0/me', [
                'query' => [
                    'fields' => 'id,name,email,first_name,last_name',
                    'access_token' => $accessToken
                ]
            ]);
            
            $facebookUser = json_decode($userResponse->getBody(), true);
            
            if (!isset($facebookUser['email'])) {
                Log::error('Facebook user info missing email', ['user_info' => $facebookUser]);
                return redirect()->route('login')
                    ->with('error', 'Failed to get email from Facebook account. Make sure to allow email permission.');
            }
            
            Log::info('Facebook user info retrieved', ['email' => $facebookUser['email'] ?? 'not provided']);
            
            // Check if user exists
            $user = User::where('email', $facebookUser['email'])->first();
            
            DB::beginTransaction();
            try {
                if (!$user) {
                    // Get name from Facebook
                    $firstName = $facebookUser['first_name'] ?? ($facebookUser['name'] ?? 'Facebook');
                    $lastName = $facebookUser['last_name'] ?? 'User';
                    
                    Log::info('Creating new user from Facebook login', [
                        'email' => $facebookUser['email'],
                        'first_name' => $firstName,
                        'last_name' => $lastName
                    ]);
                    
                    // Create new user with all required fields
                    $user = new User();
                    $user->email = $facebookUser['email'];
                    $user->facebook_id = $facebookUser['id'] ?? Str::random(24); // Store Facebook ID
                    $user->first_name = $firstName;
                    $user->last_name = $lastName;
                    $user->password = bcrypt(Str::random(16));
                    $user->date_of_birth = Carbon::now()->subYears(20);
                    $user->gender = 'other';
                    $user->email_verified_at = now();
                    $user->role = 'user';
                    
                    // Ensure phone is set to avoid null constraint issues
                    if (!isset($user->phone)) {
                        $user->phone = null; // Explicit null assignment for nullable field
                    }
                    
                    $user->save();
                    
                    Log::info('New user created from Facebook login', ['user_id' => $user->id]);
                } else {
                    // Update Facebook ID if user exists but no Facebook ID
                    if (empty($user->facebook_id) && isset($facebookUser['id'])) {
                        $user->facebook_id = $facebookUser['id'];
                        $user->save();
                        Log::info('Updated existing user with Facebook ID', ['user_id' => $user->id]);
                    }
                }
                
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                Log::error('Failed to save user data', [
                    'error' => $e->getMessage(),
                    'trace' => $e->getTraceAsString()
                ]);
                return redirect()->route('login')
                    ->with('error', 'Failed to save user data: ' . $e->getMessage());
            }
            
            // Log in the user
            Auth::login($user);
            Log::info('User logged in via Facebook', ['user_id' => $user->id]);
            
            // Delete the intended URL from the session
            session()->forget('url.intended');
            
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard', absolute: false));
            } else if ($user->role === 'tour_rider') {
                return redirect()->intended(route('tour_rider.dashboard', absolute: false));
            }
            
            return redirect()->intended(route('dashboard', absolute: false));
            
        } catch (Exception $e) {
            Log::error('Facebook authentication error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('login')
                ->with('error', 'Facebook authentication failed. Please try again later.');
        }
    }
} 
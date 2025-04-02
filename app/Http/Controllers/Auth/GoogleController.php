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

class GoogleController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle(): RedirectResponse
    {
        try {
            $clientId = config('services.google.client_id');
            $redirectUri = config('services.google.redirect');
            
            if (empty($clientId)) {
                Log::error('Google OAuth Client ID is not configured.');
                return redirect()->route('login')->with('error', 'Google login is not configured properly. Please contact the administrator.');
            }
            
            $url = 'https://accounts.google.com/o/oauth2/auth?' . http_build_query([
                'client_id' => $clientId,
                'redirect_uri' => $redirectUri,
                'scope' => 'openid profile email',
                'response_type' => 'code',
                'access_type' => 'offline',
                'prompt' => 'select_account'
            ]);
            
            return redirect()->away($url);
        } catch (Exception $e) {
            Log::error('Error redirecting to Google: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Could not connect to Google. Please try again later.');
        }
    }

    /**
     * Handle the callback from Google.
     */
    public function handleGoogleCallback()
    {
        if (request()->has('error')) {
            return redirect()->route('login')
                ->with('error', 'Google authentication failed: ' . request()->error);
        }
        
        try {
            $code = request()->code;
            if (empty($code)) {
                return redirect()->route('login')
                    ->with('error', 'Authorization code not received from Google');
            }
            
            // Create a Guzzle client with SSL verification disabled
            $client = new Client([
                'verify' => false // Disable SSL verification - NOTE: This should not be used in production
            ]);
            
            // Exchange code for access token using the custom client
            $tokenResponse = $client->post('https://oauth2.googleapis.com/token', [
                'form_params' => [
                    'code' => $code,
                    'client_id' => config('services.google.client_id'),
                    'client_secret' => config('services.google.client_secret'),
                    'redirect_uri' => config('services.google.redirect'),
                    'grant_type' => 'authorization_code',
                ]
            ]);
            
            $tokenData = json_decode($tokenResponse->getBody(), true);
            
            if (!isset($tokenData['access_token'])) {
                Log::error('Google token exchange failed: No access token received', ['response' => $tokenData]);
                return redirect()->route('login')
                    ->with('error', 'Failed to authenticate with Google: No access token received');
            }
            
            $accessToken = $tokenData['access_token'];
            Log::info('Successfully got access token from Google');
            
            // Get user info with access token
            $userResponse = $client->get('https://www.googleapis.com/oauth2/v3/userinfo', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken
                ]
            ]);
            
            $googleUser = json_decode($userResponse->getBody(), true);
            
            if (!isset($googleUser['email'])) {
                Log::error('Google user info missing email', ['user_info' => $googleUser]);
                return redirect()->route('login')
                    ->with('error', 'Failed to get email from Google account');
            }
            
            Log::info('Google user info retrieved', ['email' => $googleUser['email'] ?? 'not provided']);
            
            // Check if user exists
            $user = User::where('email', $googleUser['email'])->first();
            
            DB::beginTransaction();
            try {
                if (!$user) {
                    // Generate name parts from full name
                    $name = $googleUser['name'] ?? '';
                    $nameParts = explode(' ', $name);
                    $firstName = $nameParts[0] ?? 'Google';
                    $lastName = count($nameParts) > 1 
                        ? implode(' ', array_slice($nameParts, 1)) 
                        : 'User';
                    
                    Log::info('Creating new user from Google login', [
                        'email' => $googleUser['email'],
                        'first_name' => $firstName,
                        'last_name' => $lastName
                    ]);
                    
                    // Create new user with all required fields
                    $user = new User();
                    $user->email = $googleUser['email'];
                    $user->google_id = $googleUser['sub'] ?? Str::random(24); // Fallback if sub is missing
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
                    
                    Log::info('New user created from Google login', ['user_id' => $user->id]);
                } else {
                    // Update Google ID if user exists but no Google ID
                    if (empty($user->google_id) && isset($googleUser['sub'])) {
                        $user->google_id = $googleUser['sub'];
                        $user->save();
                        Log::info('Updated existing user with Google ID', ['user_id' => $user->id]);
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
            Log::info('User logged in via Google', ['user_id' => $user->id]);
            
            // Delete the intended URL from the session
            session()->forget('url.intended');
            
            if ($user->role === 'admin') {
                return redirect()->intended(route('admin.dashboard', absolute: false));
            } else if ($user->role === 'tour_rider') {
                return redirect()->intended(route('tour_rider.dashboard', absolute: false));
            }
            
            return redirect()->intended(route('dashboard', absolute: false));
            
        } catch (Exception $e) {
            Log::error('Google authentication error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->route('login')
                ->with('error', 'Google authentication failed. Please try again later.');
        }
    }
}

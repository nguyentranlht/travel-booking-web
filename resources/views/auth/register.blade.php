    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="{{ asset('build/assets/css/globals.css') }}" />
        <link rel="stylesheet" href="{{ asset('build/assets/css/styleguide.css') }}" />
        <link rel="stylesheet" href="{{ asset('build/assets/css/sigup.css') }}" />

        <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    </head>
<div class="register" data-aos="fade-up">
    <form method="POST" action="{{ route('register') }}">
        @csrf
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <div class="sign-up" data-aos="fade-up" data-aos-duration="1000">
            <div class="logo" data-aos="fade-down" data-aos-duration="1000"></div>
    
            <div class="frame" data-aos="fade-left" data-aos-duration="1000">
                <div class="div">
                    <div class="text-wrapper">Sign up</div>
                    <p class="p">Let’s get you all set up so you can access your personal account.</p>
                </div>
    
                <div class="frame-2" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="frame-3">
                        <div class="frame-4">
                            <!-- First Name -->
                            <div class="text-field" data-aos="fade-right" data-aos-duration="1000">
                                <input id="first_name" class="input-text" placeholder="First Name" type="text" name="first_name" value="{{ old('first_name') }}" required />
                                @error('first_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- Last Name -->
                            <div class="text-field" data-aos="fade-left" data-aos-duration="1000">
                                <input id="last_name" class="input-text" placeholder="Last Name" type="text" name="last_name" value="{{ old('last_name') }}" required />
                                @error('last_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
    
                        <div class="frame-4">
                            <!-- Email -->
                            <div class="text-field" data-aos="fade-up" data-aos-duration="1000">
                                <input id="email" class="input-text" placeholder="Email" type="email" name="email" value="{{ old('email') }}" required />
                                @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- Phone -->
                            <div class="text-field" data-aos="fade-down" data-aos-duration="1000">
                                <input id="phone" class="input-text" placeholder="Phone Number" type="text" name="phone" value="{{ old('phone') }}" required />
                                @error('phone')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                    <div class="frame-3">
                        <div class="frame-4">
                            <!-- Gender -->
                            <div class="text-field" data-aos="fade-right" data-aos-duration="1000">
                                <select id="gender" class="input-text" name="gender" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <!-- Date of Birth -->
                            <div class="text-field" data-aos="fade-left" data-aos-duration="1000">
                                <input id="date_of_birth" class="input-text" type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" required />
                                @error('date_of_birth')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
    
                    <div class="frame-4">
                        <!-- Password -->
                        <div class="text-field" data-aos="fade-right" data-aos-duration="1000">
                            <input id="password" class="input-text" placeholder="Password" type="password" name="password" required />
                            @error('password')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
    
                        <!-- Confirm Password -->
                        <div class="text-field" data-aos="fade-left" data-aos-duration="1000">
                            <input id="password_confirmation" class="input-text" placeholder="Confirm Password" type="password" name="password_confirmation" required />
                            @error('password_confirmation')
                                <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
    
                <div class="frame-6" data-aos="flip-up" data-aos-duration="1000">
                    <button type="submit" class="button">
                        {{ __('Create account') }}
                    </button>
                    <p class="already-have-an">
                        <span class="span">Already have an account? </span>
                        <a href="{{ route('login') }}" class="text-wrapper-2">Login</a>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>
    
    <!-- Thêm thư viện AOS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>

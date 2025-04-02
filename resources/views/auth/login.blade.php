<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/globals.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/login.css') }}" />
    
    <!-- Thêm thư viện AOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" />
</head>

<div class="login" data-aos="fade-up">
    <div class="group" data-aos="fade-up" data-aos-delay="100">
        <div class="overlap-group">
            <img class="rectangle" src="{{ asset('build/assets/img/Rectangle 20.png') }}" />
            <div class="div"></div>
            <div class="frame">
                <div class="rectangle-2"></div>
                <div class="ellipse"></div>
                <div class="ellipse"></div>
            </div>
        </div>
    </div>
    <div class="logo" data-aos="fade-down" data-aos-delay="200"></div>
    <div class="frame-2" data-aos="zoom-in" data-aos-delay="300">
        <div class="frame-3">
            <div class="text-wrapper">Login</div>
            <p class="p">Login to access your Golobe account</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="frame-4">
                <div class="frame-5">
                    <!-- Email Field -->
                    <div class="text-field" data-aos="fade-up" data-aos-delay="400">
                        <div class="state-layer-wrapper">
                            <div class="state-layer">
                                <div class="content">
                                    <input class="input-text" type="email" name="email" value="{{ old('email') }}"
                                        required autofocus placeholder="john.doe@gmail.com" />
                                    <label class="label-text">Email</label>
                                </div>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Password Field -->
                    <div class="text-field" data-aos="fade-up" data-aos-delay="500">
                        <div class="div-wrapper">
                            <div class="state-layer-2">
                                <div class="content">
                                    <input class="input-text" type="password" name="password" required
                                        placeholder="•••••••••••••••••••••••••" />
                                    <label class="label">Password</label>
                                </div>
                                </div>
                            </div>
                        </div>
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="frame-6" data-aos="fade-up" data-aos-delay="600">
                        <div class="frame-7">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <label for="remember_me" class="text-wrapper-2">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="text-wrapper-3">Forgot Password</a>
                    </div>
                </div>

                <!-- Login Button -->
                <div class="frame-8" data-aos="fade-up" data-aos-delay="700">
                    <button type="submit" class="button">
                        <div class="style-layer">
                            <div class="button-2">Login</div>
                        </div>
                    </button>
                    <p class="don-t-have-an">
                        <span class="span">Don't have an account? </span>
                        <a href="{{ route('register') }}" class="text-wrapper-4">Sign up</a>
                    </p>
                </div>

                <!-- Alternative Login Methods -->
                <div class="frame-9" data-aos="fade-up" data-aos-delay="800">
                    <div class="rectangle-3"></div>
                    <div class="text-wrapper-5">Or login with</div>
                    <div class="rectangle-3"></div>
                </div>
                <div class="frame-10" data-aos="fade-up" data-aos-delay="900">
                    <a href="{{ route('auth.google') }}" class="google-btn">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="Google" width="20" height="20">
                        <span>Google</span>
                    </a>
                    <a href="{{ route('auth.facebook') }}" class="facebook-btn" data-aos="fade-up" data-aos-delay="950">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook" width="20" height="20">
                        <span>Facebook</span>
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 800, // Thời gian cho hiệu ứng
        once: true, // Hiệu ứng chỉ chạy một lần
    });
</script>

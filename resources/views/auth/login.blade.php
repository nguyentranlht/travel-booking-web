<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/globals.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/styleguide.css') }}" />
    <link rel="stylesheet" href="{{ asset('build/assets/css/login.css') }}" />
</head>

<body>
    <div class="login">
        <div class="group">
            <div class="overlap-group">
                <img class="rectangle" src="{{ asset('img/rectangle-20.svg') }}" />
                <div class="div"></div>
                <div class="frame">
                    <div class="rectangle-2"></div>
                    <div class="ellipse"></div>
                    <div class="ellipse"></div>
                </div>
            </div>
        </div>
        <div class="logo"></div>
        <div class="frame-2">
            <div class="frame-3">
                <div class="text-wrapper">Login</div>
                <p class="p">Login to access your Golobe account</p>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="frame-4">
                    <div class="frame-5">
                        <!-- Email Field -->
                        <div class="text-field">
                            <div class="state-layer-wrapper">
                                <div class="state-layer">
                                    <div class="content">
                                        <input class="input-text" type="email" name="email"
                                            value="{{ old('email') }}" required autofocus
                                            placeholder="john.doe@gmail.com" />
                                        <label class="label-text">Email</label>
                                    </div>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500" />
                        </div>

                        <!-- Password Field -->
                        <div class="text-field">
                            <div class="div-wrapper">
                                <div class="state-layer-2">
                                    <div class="content">
                                        <input class="input-text" type="password" name="password" required
                                            placeholder="•••••••••••••••••••••••••" />
                                        <label class="label">Password</label>
                                    </div>
                                    <div class="trailing-icon"><img class="img"
                                            src="{{ asset('img/eye-off.svg') }}" /></div>
                                </div>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="frame-6">
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
                    <div class="frame-8">
                        <button type="submit" class="button">
                            <div class="style-layer">
                                <div class="button-2">Login</div>
                            </div>
                        </button>
                        <p class="don-t-have-an">
                            <span class="span">Don’t have an account? </span>
                            <a href="{{ route('register') }}" class="text-wrapper-4">Sign up</a>
                        </p>
                    </div>

                    <!-- Alternative Login Methods -->
                    <div class="frame-9">
                        <div class="rectangle-3"></div>
                        <div class="text-wrapper-5">Or login with</div>
                        <div class="rectangle-3"></div>
                    </div>
                    <img class="frame-10" src="{{ asset('img/frame-228.svg') }}" />
                </div>
            </form>
        </div>
    </div>
    </main>
</body>

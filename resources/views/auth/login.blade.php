<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/f6cf9a2499.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <section class="relative w-full px-8 text-gray-700 bg-white body-font">
        <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
            <a href="/" class="relative z-10 flex items-center w-auto text-2xl font-extrabold leading-none text-black select-none"><i class="fa-solid fa-cow pr-[0.5rem]"></i>farmis.</a>
        </div>
    </section>
    <section>
        <div class="w-full px-8 py-56 xl:px-8">
            <div class="max-w-5xl mx-auto">
                <div class="flex flex-col items-center md:flex-row">
                    <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                        <p class="font-medium text-blue-500 uppercase">Building Businesses</p>
                        <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                            Changing The Way People Do Business.
                        </h2>
                        <p class="text-xl text-gray-600 md:pr-16">Learn how to engage with your visitors and teach them about your mission. We're revolutionizing the way customers and businesses interact.</p>
                    </div>
                    <div class="w-full mt-16 md:mt-0 md:w-2/5">
                        <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                            <h3 class="mb-6 text-2xl font-medium text-center">Sign in to your Account</h3>
                            @if($message = Session::get('error'))
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                <span class="font-medium">{{ $message }}</span>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
        
                                <div class="">
                                    <div class="">
                                        <input id="email" type="email" class="block form-control w-full px-4 py-3 mb-4 border-2 border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email address" required autocomplete="email" autofocus>
        
                                        @error('email')
                                            <span class="invalid-feedback w-full px-4 py-3 mb-4" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="">
                                    <div class="">
                                        <input id="password" type="password" class="block form-control w-full px-4 py-3 mb-4 border-2 border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
        
                                        @error('password')
                                            <span class="invalid-feedback w-full px-4 py-3 mb-4" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="">
                                    <div class="">
                                        <div class="form-check w-full mb-4 text-sm text-gray-500">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="">
                                    <div class="block">
                                        <button type="submit" class="w-full px-3 py-4 font-medium text-white bg-blue-600 rounded-lg">
                                            {{ __('Login') }}
                                        </button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  </body>
</html>

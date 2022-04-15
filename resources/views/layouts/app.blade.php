<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <livewire:styles />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans bg-gray-200 text-gray-900 text-sm">
        <div class="min-h-screen">
            <header class="flex items-center justify-between px-8 py-4">
                <div class="flex items-center">
                    <img class="h-14" src="{{ asset('img/D-D-Logo.svg') }}" alt="developer svg"> <!-- LOGO -->
                </div>
                <!-- MENU -->
                <nav class="hidden md:flex items-center justify-between text-xs  text-gray-500">
                    <ul class="flex uppercase font-semibold space-x-10">
                        <li><a href="/"
                                class="transition duration-150 ease-in border-b-4 pb-3 text-base  hover:border-blue-500 @if(Route::is('index')) text-gray-900 border-blue-500 @endif">@lang('navbar.home')</a>
                        </li>
                        <li><a href="/ideas" class=" transition duration-150 ease-in border-b-4 pb-3 text-base hover:border-blue-500 @if(Str::contains(Route::currentRouteName(), 'ideas')) text-gray-900 border-blue-500 @endif">@lang('navbar.ideas')</a></li>
                        <li><a href="/gifs" class=" transition duration-150 ease-in border-b-4 pb-3 text-base hover:border-blue-500 @if(Str::contains(Route::currentRouteName(), 'gifs')) text-gray-900 border-blue-500 @endif">@lang('navbar.gifs')</a></li>
                        <li><a href="/albums" class=" transition duration-150 ease-in border-b-4 pb-3 text-base hover:border-blue-500 @if(Str::contains(Route::currentRouteName(), 'albums')) text-gray-900 border-blue-500 @endif">@lang('navbar.albums')</a></li>
                        <li><a href="#" class=" transition duration-150 ease-in border-b-4 pb-3 text-base hover:border-blue-500">@lang('navbar.contact')</a></li>
                    </ul>
                </nav>

                <!-- Auth -->
                <div class="flex items-center">
                    @if (Route::has('login'))
                    <div class="top-0 right-0 px-6 py-4">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                this.closest('form').submit();">
                                    @lang('buttons.logout')
                                </a>
                            </form>
                        @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">@lang('buttons.login')</a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">@lang('buttons.register')</a>
                        @endif
                        @endauth
                    </div>
                    @endif
                    <!-- Language Switch -->
                    @foreach (Config::get('languages') as $lang => $language)
                    @if ($lang != App::getLocale())
                    <a href="{{ route('lang.switch', $lang) }}">
                        <img class="h-8" src="{{ asset('img/' . $lang . '.svg') }}" alt="fr svg">
                    </a>
                    @endif
                    @endforeach
                    <!-- User Avatar -->
                    <div>
                        @auth
                        <img src="{{ Auth()->User()->getAvatar() }}" alt="avatar" class="h-14 ml-2 rounded-full">
                        @else
                        <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y"
                            alt="avatar" class="h-14 ml-2 rounded-full">
                        @endauth
                    </div>
                </div>
            </header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @if (session('success_message'))
                <x-notification-success
                    :redirect="true"
                    message-to-display="{{session('success_message')}}"
                />
            @endif
        </div>
        <livewire:scripts />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@ryangjchandler/spruce@1.1.0/dist/spruce.umd.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js"></script>
        <script>
            var clipboard = new ClipboardJS('.btn');
                clipboard.on('success', function (e) {
            console.log(e);
          });
          clipboard.on('error', function (e) {
            console.log(e);
          })
        </script>
    </body>
</html>

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

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans bg-gray-200 text-gray-900 text-sm">
        <div class="min-h-screen">
            <header class="flex items-center justify-between px-8 py-4">
                <img class="h-14" src="{{ asset('img/D-D-Logo.svg') }}" alt="developer svg"> <!-- LOGO -->
                <nav class="hidden md:flex items-center justify-between text-xs  text-gray-500">
                    <ul class="flex uppercase font-semibold space-x-10">
                        <li><a href="/"
                                class="transition duration-150 ease-in border-b-4 pb-3 text-base  hover:border-blue-500 @if(Route::is('index')) text-gray-900 border-blue-500 @endif">@lang('navbar.home')</a>
                        </li>
                        <li><a href="/ideas"
                                class=" transition duration-150 ease-in border-b-4 pb-3 text-base hover:border-blue-500 @if(Route::is('ideas.index')) text-gray-900 border-blue-500 @endif">@lang('navbar.ideas')</a>
                        </li>
                        <li><a href="#" class=" transition duration-150 ease-in border-b-4 pb-3 text-base hover:border-blue-500">@lang('navbar.gifs')</a></li>
                        <li><a href="#" class=" transition duration-150 ease-in border-b-4 pb-3 text-base hover:border-blue-500">@lang('navbar.albums')</a></li>
                        <li><a href="#" class=" transition duration-150 ease-in border-b-4 pb-3 text-base hover:border-blue-500">@lang('navbar.contact')</a></li>
                    </ul>
                </nav>
                <div class="flex items-center">
                    @foreach (Config::get('languages') as $lang => $language)
                        @if ($lang != App::getLocale())
                        <a href="{{ route('lang.switch', $lang) }}">
                            <img class="h-8" src="{{ asset('img/' . $lang . '.svg') }}" alt="fr svg">
                        </a>
                        @endif
                    @endforeach

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
                    <div>
                        <img src="https://www.gravatar.com/avatar/00000000000000000000000000000000?d=mp&f=y"
                            alt="avatar" class="w-10 h-10 rounded-full">
                    </div>
                </div>
            </header>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

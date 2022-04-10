<x-app-layout>
    <main class="container mx-auto flex mt-12">
        <div class="w-1/12">
        </div>
        <div class="w-3/12 mr-5">
            <div class="bg-white sticky top-8 border-2 border-blue-500 rounded-xl mt-16">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">@lang('ideas.add_idea')</h3>
                    <p class="text-xs mt-4">
                        @auth
                            @lang('ideas.add_idea_description')
                        @else
                            @lang('ideas.add_idea_login')
                        @endauth
                        
                    </p>
                </div>

                @auth
                    <livewire:create-idea />
                @else
                <div class="my-6 text-center">
                    <a
                        href="{{ route('login') }}"
                        class="inline-block justify-center w-1/2 h-11 text-xs bg-blue-500 text-white font-semibold rounded-xl border border-blue-500 hover:bg-blue-700 transition duration-150 ease-in px-6 py-3"
                    >
                    <span class="ml-1">@lang('buttons.login')</span>
                    </a>
                    <a
                        href="{{ route('register') }}"
                        class="inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-4"
                    >
                        @lang('buttons.register')
                    </a>
                </div>
                @endauth
            </div>     
        </div>
        <div class="w-7/12">
            <livewire:ideas-filters />
            <div class="mt-8">
                @yield('ideas.content') {{-- ideas.index.blade.php --}}
            </div>
        </div>
        <div class="w-1/12">
        </div>
    </main>
</x-app-layout>

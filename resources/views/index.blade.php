<x-app-layout>
    <div>Index of INF1022</div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <div class="flex items-center">
                    <div class="flex-1">
                        <p class="mt-8 text-3xl font-bold">@lang('messages.job')</p>
                        <p class="text-3xl font-bold text-blue-500">@lang('messages.welcome')</p>
                    </div>
                    <div class="flex-2">
                        <img src="{{ asset('img/hero.svg') }}" alt="developer svg">
                    </div>
                </div>
                <div class="mt-6 text-gray-500">
                    @lang('messages.greetings')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
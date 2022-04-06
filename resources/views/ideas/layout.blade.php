<x-app-layout>
    <main class="container mx-auto flex mt-12">
        <div class="w-1/12">
        </div>
        <div class="w-3/12 mr-5">
            <div class="bg-white sticky top-8 border-2 border-blue-500 rounded-xl mt-16">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">@lang('ideas.add_idea')</h3>
                    <p class="text-xs mt-4">@lang('ideas.add_idea_description')</p>
                </div>
                <form action="#" method="POST" class="space-y-4 px-4 py-6">
                    <div>
                        <input type="text"
                            class="w-full text-sm bg-gray-100 rounded-xl border-none placeholder-gray-900 px-4 py-2"
                            placeholder="@lang('ideas.title_placeholder')">
                    </div>
                    <div>
                        <select name="category_add" id="category_add"
                            class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2">
                            <option value="Category1">Category 1</option>
                            <option value="Category2">Category 2</option>
                            <option value="Category3">Category 3</option>
                            <option value="Category4">Category 4</option>
                        </select>
                    </div>
                    <div>
                        <textarea name="idea" id="idea" cols="30" rows="4"
                            class="w-full bg-gray-100 rounded-xl border-none placeholder-gray-900 text-sm px-4 py-2"
                            placeholder="@lang('ideas.description_placeholder')"></textarea>
                    </div>
                    <div class="flex items-center justify-between space-x-3">
                        <button type="button"
                            class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3">
                            <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                            </svg>
                            <span class="ml-1">@lang('buttons.attach')</span>
                        </button>
                        <button type="submit"
                            class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-500 text-white font-semibold rounded-xl border border-blue-500 hover:bg-blue-700 transition duration-150 ease-in px-6 py-3">
                            <span class="ml-1">@lang('buttons.submit')</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="w-7/12">
            <nav class="flex items-center justify-between text-xs">
                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10 border-gray-300">
                    <li><a href="#" class="border-b-4 pb-3 border-blue-500 border-gray-300">@lang('ideas.all_ideas') (87)</a></li>
                    <li><a href="#"
                            class="text-gray-500 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 border-gray-300">@lang('ideas.in_progress') (6)</a></li>
                    <li><a href="#"
                            class="text-gray-500 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 border-gray-300">@lang('ideas.considering') (1)</a></li>
                </ul>

                <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10 border-gray-300">
                    <li><a href="#"
                            class="text-gray-500 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 border-gray-300">@lang('ideas.implemented')(10)</a></li>
                    <li><a href="#"
                            class="text-gray-500 transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 border-gray-300">@lang('ideas.closed')(55)</a></li>
                </ul>
            </nav>
            <div class="mt-8">
                @yield('ideas.content') {{-- ideas.index.blade.php --}}
            </div>
        </div>
        <div class="w-1/12">
        </div>
    </main>
</x-app-layout>

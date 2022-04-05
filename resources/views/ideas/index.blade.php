@extends('ideas.layout')

@section('ideas.content')
<div class="filters flex space-x-6">
    <div class="w-1/3">
        <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
            <option value="Category1">Category 1</option>
            <option value="Category2">Category 2</option>
            <option value="Category3">Category 3</option>
            <option value="Category4">Category 4</option>
        </select>
    </div>
    <div class="w-1/3">
        <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
            <option value="filters1">Filter 1</option>
            <option value="filters2">Filter 2</option>
            <option value="filters3">Filter 3</option>
            <option value="filters4">Filter 4</option>
        </select>
    </div>
    <div class="w-2/3 relative">
        <input type="search" placeholder="@lang('ideas.search')"
            class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
        <div class="absolute top-0 flex itmes-center h-full ml-2">
            <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>
</div> {{-- End of Filters --}}
<div class="ideas-container space-y-6 my-6">
    <div class="idea-container hover:shadow-lg transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer">
        <div class="border-r border-gray-100 px-5 py-8">
            <div class="text-center">
                <div class="font-semibold text-2xl">12</div>
                <div class="text-gray-500">Votes</div>
            </div>

            <div class="mt-8">
                <button
                    class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase rounded-xl transition duration-150 ease-in px-4 py-3">@lang('buttons.vote')</button>
            </div>
        </div>
        <div class="flex px-2 py-6">
            <a href="#" class="flex-none">
                <img src="https://source.unsplash.com/200x200/?face&crop=face&v=1" alt="avatar"
                    class="w-14 h-14 rounded-xl">
            </a>
            <div class="mx-4">
                <h4 class="text-xl font-semibold">
                    <a href="/ideas/idea" class="hover:underline">A random title can go here</a>
                </h4>
                <div class="text-gray-600 mt-3 line-clamp-3">
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptatum minus saepe magni ullam aliquam
                    perferendis. Vel, autem illo. Autem, quidem beatae aliquam earum tempore omnis harum totam,
                    necessitatibus perspiciatis obcaecati officia ullam nulla temporibus maiores, magni dolore!
                    Repellendus aperiam soluta, id ipsam fugiat porro asperiores necessitatibus architecto iste totam,
                    illo dolor eaque explicabo et veritatis dolorum cumque, modi incidunt adipisci ipsa natus nemo
                    deleniti perspiciatis? Minus nihil facere optio. Amet tenetur aliquid eaque earum tempora obcaecati
                    accusantium suscipit architecto ut error, veniam ad, soluta sint voluptatem id excepturi delectus
                    laboriosam minus reiciendis doloremque consequatur dicta ipsam! Quos, aspernatur! Sequi, natus.
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div>10 hours ago</div>
                        <div>&bull;</div>
                        <div>Category 1</div>
                        <div>&bull;</div>
                        <div class="text-gray-900">3 @lang('buttons.comments')</div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div
                            class="bg-gray-200 text-xxs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">@lang('ideas.open')</div>
                        <button
                            class="relative bg-gray-100 hover:bg-gray-200 rounded-full border h-7 transition duration-150 focus:outline-none focus:ring focus:border-blue ease-in py-2 px-3">
                            <svg fill="currentColor" width="24" height="6">
                                <path
                                    d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z"
                                    style="color: rgba(163, 163, 163, .5)">
                            </svg>
                            <ul class="absolute w-44 text-left font-semibold bg-white shadow-md rounded-xl py-3 ml-8">
                                <li><a href="#"
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">@lang('buttons.spam')</a></li>
                                <li><a href="#"
                                        class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">@lang('buttons.delete')</a></li>
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end idea-container -->
</div> <!-- end ideas-container -->

@endsection

<div>
    <div>
        <div class="filters flex space-x-6">
            <div class="w-1/4">
                <select wire:model="category" name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                    <option value="all">@lang('buttons.all_categories')</option>
                </select>
            </div>
            <div class="w-1/4">
                <select  wire:model="order" name="order" id="order" class="w-full rounded-xl border-none px-4 py-2">
                    <option value="new">@lang('buttons.order')</option>
                    <option value="new">@lang('buttons.order.newest')</option>
                    <option value="old">@lang('buttons.order.oldest')</option>     
                    <option value="most">@lang('buttons.order.popular')</option>
                    <option value="less">@lang('buttons.order.unpopular')</option>
                    @role('admin')
                        <option value="spam">Spam Reports</option>
                    @endrole
                </select>
            </div>
            <div class="w-1/4">
                @auth
                <select  wire:model="user" name="user" id="user" class="w-full rounded-xl border-none px-4 py-2">
                        <option value="all">Any User</option>
                        <option value="user">@lang('gifs.my.ideas')</option>
                        <option value="voted">@lang('gifs.voted.for')</option>
                </select>
                @endauth
            </div>
            <div class="w-1/4 relative">
                <input wire:model="search" type="search" placeholder="Find a gif" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
                <div class="absolute top-0 flex itmes-center h-full ml-2">
                    <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>
    </div> {{-- End of Filters --}}
    <div class="container grid grid-cols-4 gap-2 mt-4">
        @foreach ($gifs as $gif)
            <div class="flex flex-col text-center bg-white rounded-lg shadow-lg">
                <div class="pt-2 pb-2 flex border-b-2 flex justify-center">
                    <h4 class="ml-2 font-semibold text-gray-600 dark:text-gray-300 ">{{ $gif->title }}</h4>
                </div>

                <ul class="flex flex-col">
                    <li class="bg-white my-2" x-data="display({{ $gif->id + 1 }})">
                    <h2
                        @click="handleClick()"
                        class="flex flex-row justify-center items-center font-semibold p-3 cursor-pointer"
                    >
                        <span class="text-xs mr-3">Toggle Display</span>
                        <svg
                        :class="handleRotate()"
                        class="fill-current text-blue-700 h-6 w-6 transform transition-transform duration-500"
                        viewBox="0 0 20 20"
                        >
                        <path d="M13.962,8.885l-3.736,3.739c-0.086,0.086-0.201,0.13-0.314,0.13S9.686,12.71,9.6,12.624l-3.562-3.56C5.863,8.892,5.863,8.611,6.036,8.438c0.175-0.173,0.454-0.173,0.626,0l3.25,3.247l3.426-3.424c0.173-0.172,0.451-0.172,0.624,0C14.137,8.434,14.137,8.712,13.962,8.885 M18.406,10c0,4.644-3.763,8.406-8.406,8.406S1.594,14.644,1.594,10S5.356,1.594,10,1.594S18.406,5.356,18.406,10 M17.521,10c0-4.148-3.373-7.521-7.521-7.521c-4.148,0-7.521,3.374-7.521,7.521c0,4.147,3.374,7.521,7.521,7.521C14.148,17.521,17.521,14.147,17.521,10"></path>
                        </svg>
                    </h2>
                    <div
                        x-ref="tab"
                        :style="handleToggle()"
                        class="border-l-2 border-blue-600 overflow-hidden max-h-0 duration-500 transition-all"
                    >
                        <p class="p-3 text-gray-900">
                        <img
                            class="object-contain w-full"
                            src="{{ $gif->path }}"
                        >
                        </p>
                    </div>
                    </li>
                </ul>

                <div class='my-3 flex flex-wrap justify-center -m-1'>
                    <span class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">winter</span>
                    <span class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">stark</span>
                    <span class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">battle</span>
                    <span class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">gameofthrones</span>
                    <span class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">jhonsnow</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-8">
                {{ $gifs->appends(request()->query())->links() }}
    </div>
</div>
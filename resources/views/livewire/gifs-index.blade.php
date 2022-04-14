<div>
    <div>
        <div class="filters flex space-x-6">
            <div class="w-1/4">
                <select wire:model="tag_id" name="tag_id" id="tag_id" class="w-full rounded-xl border-none px-4 py-2">
                    <option value="all">@lang('buttons.all_categories')</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
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
                <input wire:model="search" type="search" placeholder="@lang('gifs.search')" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
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
                <div class="flex justify-between pt-2 pb-2 flex border-b-2 ">
                    <h4 class="ml-4 font-semibold text-gray-600 dark:text-gray-300 ">{{ $gif->title }}</h4>
                    <div class="mr-4 cursor-pointer">
                        <span
                            class="flex h-min w-min space-x-1 items-center rounded-full text-gray-700 hover:text-blue-700 bg-gray-300  py-1 px-2 text-xs font-medium"
                        >
                            <svg
                            class="h-5 w-5 fill-current "
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                            />
                            </svg>
                            <p class="font-bold text-sm">
                            3
                            </p>
                        </span>
                    </div>

                </div>
                <div class="flex justify-center">
                    <img
                        class="object-contain w-48 text-center rounded-xl"
                        src="{{ $gif->path }}"
                    >
                </div>
                <span class="flex justify-between bg-gray-100">
                    <input type="text" id="path{{ $gif->id }}" class="btn w-full text-xs bg-gray-100 focus:outline-none border-none placeholder-gray-900 px-4 py-2" data-clipboard-target="#path{{ $gif->id }}" value="{{ $gif->path }}" readonly="readonly">
                    <button class="btn" data-clipboard-target="#path{{ $gif->id }}">
                        <svg class="h-7 w-7 bg-gray-100 border-none focus:outline-none" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3" />
                        </svg>
                    </button>
                    </span>

                <div class='my-3 flex flex-wrap justify-center m-1'>
                    @foreach ($gif->tags as $tag)
                    <span wire:click="tagChange({{$tag->id}})" class="m-1 bg-gray-200 hover:bg-gray-300 rounded-full px-2 font-bold text-sm leading-loose cursor-pointer">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <div class="flex justify-center mt-2 mb-2">
                    <div class="flex text-xs text-gray-400 font-semibold space-x-2 ml-2">
                        <div class="font-bold text-gray-900">Saved by: {{$gif->user->name}}</div>
                        <div>{{$gif->created_at->diffForHumans()}}</div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-8">
                {{ $gifs->appends(request()->query())->links() }}
    </div>
</div>
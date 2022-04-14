<div>
    <div>
        <div class="filters flex space-x-6">
            <div class="w-1/3">
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
            <div class="w-1/3">
                <select  wire:model="filter" name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                    <option value="all">@lang('buttons.filter')</option>    
                    <option value="all">@lang('buttons.filter.all.time')</option>              
                    <option value="24h">@lang('buttons.filter.past.day')</option>
                    <option value="7d">@lang('buttons.filter.past.week')</option>
                    <option value="30d">@lang('buttons.filter.past.month')</option>
                </select>
            </div>
            <div class="w-1/3">
                @auth
                <select  wire:model="user" name="user" id="user" class="w-full rounded-xl border-none px-4 py-2">
                        <option value="all">Any User</option>                        
                        <option value="user">@lang('ideas.my.ideas')</option>
                        <option value="voted">@lang('ideas.voted.for')</option>                        
                </select>
                @endauth
            </div>
        </div>
        <div class="filters flex space-x-6 mt-6">
            <div class="w-1/3">
                <select wire:model="category" name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">
                    <option value="all">@lang('buttons.all_categories')</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->slug}}">{{$category->getCategoryName()}}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-1/3">
                <select  wire:model="other_filter" name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
                    <option value="all">Other Filters</option>
                </select>
            </div>
            <div class="w-1/3 relative">
                <input wire:model="search" type="search" placeholder="@lang('ideas.search')" class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
                <div class="absolute top-0 flex itmes-center h-full ml-2">
                    <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

    </div> {{-- End of Filters --}}

    <div class="ideas-container space-y-6 my-6">
        @forelse ($ideas as $idea)
            <livewire:idea-card :key="$idea->id" :idea="$idea" :votesCount="$idea->idea_votes_count" :isIndex=True />
        @empty
            <div class="mx-auto w-70 mt-12">
                <img src="{{ asset('img/no-results.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity">
                <div class="text-gray-400 text-center font-bold mt-6">No ideas were found...</div>
            </div>
        @endforelse
    </div> {{-- end ideas-container --}}

    <div class="my-8">
                {{ $ideas->appends(request()->query())->links() }}
    </div>
</div>
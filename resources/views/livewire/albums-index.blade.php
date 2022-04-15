<div>
    <div>
        <div class="filters flex space-x-6">
            <div class="w-1/4">
                <select wire:model="tag_id" name="tag_id" id="tag_id" class="w-full rounded-xl border-none px-4 py-2">
                    <option value="all">All Genres</option>
                </select>
            </div>
            <div class="w-1/4">
                <select  wire:model="order" name="order" id="order" class="w-full rounded-xl border-none px-4 py-2">
                    <option value="new">Order by: Newest</option>
                    <option value="old">Order by: Oldest</option>
                    <option value="most">Order by: Most Voted</option>
                    <option value="less">Order by: Least Voted</option>
                    @role('admin')
                        <option value="spam">Spam Reports</option>
                    @endrole
                </select>
            </div>
            <div class="w-1/4">
                <select  wire:model="user" name="user" id="user" class="w-full rounded-xl border-none px-4 py-2">
                        <option value="all">Any User</option>
                        @auth
                        <option value="user">My Albums</option>
                        <option value="voted">Albums I voted for</option>
                        @endauth
                </select>
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
    <div class="my-8">
        {{ $albums->appends(request()->query())->links() }}
    </div>
    <div class="albums-container grid grid-cols-2 gap-4">
        @forelse ($albums as $album)
            <livewire:album-card :key="$album->id" :album="$album"/>
        @empty
            <div class="mx-auto w-70 mt-12">
                <img src="{{ asset('img/no-results.svg') }}" alt="No Albums" class="mx-auto mix-blend-luminosity">
                <div class="text-gray-400 text-center font-bold mt-6">No albums were found...</div>
            </div>
        @endforelse
    </div> <!-- end ideas-container -->
    <div class="my-8">
        {{ $albums->appends(request()->query())->links() }}
    </div>
</div>
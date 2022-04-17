<div
    x-data
    @click="
        const clicked = $event.target
        const target = clicked.tagName.toLowerCase()
        const ignores = ['button', 'svg', 'path', 'a']
        if (! ignores.includes(target)) {
            clicked.closest('.album-container').querySelector('.album-link').click()
        }
    "
    class="album-container hover:shadow-xl transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer pt-2"
>
    <div class="border-r border-gray-100 px-5 py-4">
        <div class="text-center">
            <a href="#">
                <img src="{{$album->cover}}" alt="avatar" class="h-40 rounded-md">
            </a>
        </div>
    </div>
    <div class="flex flex-1 px-2 py-2">
        <div class="w-full flex flex-col justify-between mx-3">
            <div class="flex justify-between">
                            <h2 class="text-base font-semibold">
                                <a href="/albums/{{$album->slug}}" class="album-link hover:underline">{{$album->title}}</a>
                            </h2>
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
            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                <div>Released {{ $album->release_date->toFormattedDateString() }}</div>
            </div>
            <div class="mt-1">
                <div class="flex items-center text-xs space-x-2 mb-1">
                    <div><span class="font-semibold text-gray-400">Number of Tracks</span> {{ $album->tracks_count }}</div>
                </div>
                <div class="flex items-center text-xs space-x-2 mb-1 line-clamp-2">
                    <div><span class="font-semibold text-gray-400">Main Performers</span>
                        @foreach ($album->main_performers() as $artist)
                            <span>{{$artist->name}}</span>
                            @if( $album->main_performers()->last() !== $artist)
                                <span class="text-gray-400">&bull;</span>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="flex  items-center text-xs space-x-2 mb-1 line-clamp-2">
                    <div><span class="font-semibold text-gray-400">Featuring</span>
                        @foreach ($album->feat_performers() as $artist)
                            <span>{{$artist->name}}</span>
                            @if( $album->feat_performers()->last() !== $artist)
                                <span class="text-gray-400">&bull;</span>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="flex items-center text-xs space-x-2 mb-1">
                    <span class="font-semibold text-gray-400">Styles</span>
                    @foreach ($album->genres as $genre)
                        <span>{{$genre->name}}</span>
                        @if( $album->genres->last() !== $genre)
                            <span class="text-gray-400">&bull;</span>
                        @endif
                    @endforeach
                </div>
                <div class="text-gray-600 mt-1 line-clamp-2 mb-1">
                    {{$album->description}}
                </div>
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2 mb-1">
                    <div>Shared {{$album->created_at->diffForHumans()}} by {{ $album->user->name }}</div>
                    <div>&bull;</div>
                    <div>3 Comments</div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end album-container -->
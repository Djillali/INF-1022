<div>
<div   class="album-container bg-white rounded-xl flex cursor-pointer pt-2 mt-4">
    <div class="border-r border-gray-100 px-5 py-4">
        <div class="text-center">
            <a href="#">
                <img src="{{$album->cover}}" alt="avatar" class="h-80 rounded-md">
            </a>
        </div>
    </div>
    <div class="flex flex-1 px-2 py-2">
            <div class="mt-1 space-y-3 min-w-full">
                <div class="flex justify-between text-sm  font-semibold space-x-2 mb-3">
                    <div class="text-gray-400">Released {{ $album->release_date->toFormattedDateString() }}</div>
                    <h4 class="text-xl font-semibold mb-2 pr-24">
                        <a href="/albums/{{$album->slug}}" class="album-link hover:underline">{{$album->title}}</a>
                    </h4>
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
                <div class="flex flex-wrap justify-center text-sm space-x-2 mb-3">
                    <p class="font-semibold text-gray-400">Main Performer</p>
                    @foreach ($album->main_performers() as $performer)
                        <p>{{$performer}}</p>
                        @if( $album->main_performers()->last() !== $performer)
                           <p class="text-gray-400">&bull;</p>
                        @endif
                    @endforeach
                </div>
                <div class="flex flex-wrap justify-center text-sm space-x-2 mb-3">
                    <p class="font-semibold text-gray-400">Featuring</p>
                    @foreach ($album->feat_performers() as $performer)
                        <p>{{$performer}}</p>
                        @if( $album->feat_performers()->last() !== $performer)
                           <p class="text-gray-400">&bull;</p>
                        @endif
                    @endforeach
                </div>
                <div class="flex justify-center text-sm space-x-2 mb-3">
                    <p class="font-semibold text-gray-400">Styles</p>
                    @foreach ($album->genres as $genre)
                        <p>{{$genre->name}}</p>
                        @if( $album->genres->last() !== $genre)
                           <p class="text-gray-400">&bull;</p>
                        @endif
                    @endforeach
                </div>
                <div class="flex justify-center text-sm space-x-2 mb-3 min-w-full">
                    <div>
                        <span class="font-semibold text-gray-400">Album Length</span> 72 minutes
                        <span class="font-semibold text-gray-400">&bull; Number of Tracks</span> {{ $album->tracks()->count() }}
                    </div>
                </div>
                <div class="text-gray-600 mb-3" style="min-height: 115px;">
                    <p class="font-semibold text-gray-400 ">Description</p>
                    {{ $album->description }}
                </div>
                <div class="flex justify-between text-sm  font-semibold space-x-2 mb-2">
                    <div class="text-gray-400">Shared {{$album->created_at->diffForHumans()}} by {{ $album->user->name }}</div>
                    <div
                        class="flex items-center space-x-2"
                        x-data="{ isOpen: false }"
                    >
                        <button
                            class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                            @click="isOpen = !isOpen"
                        >
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul
                                class="absolute w-44 text-left font-semibold bg-white shadow-xl rounded-xl z-10 py-3 ml-8"
                                x-cloak
                                x-show.transition.origin.top.left="isOpen"
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                            >
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Add a track</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Edit album</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete album</a></li>
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
    </div>
</div> <!-- end album-container -->
<div class="album-details-container flex space-x-4">
    <div class="tracklist-container flex flex-col w-7/12 bg-white rounded-xl cursor-pointer pt-2 mt-4 px-4">
        <div class="font-semibold text-gray-400">
            <p >Tracklist</p>
        </div>
        <div>
            <div class="flex flex-col justify-center text-center">
                @foreach ($album->tracks as $track)
                    <div class="border-b-2">
                        @if ($track->feat_performers()->count() > 0)
                            @if ($track->feat_performers()->count() == 1)
                                {{ $track->position }}. {{ $track->title }} (Feat. {{ $track->feat_performers()->first() }}) ({{ $track->duration }})
                            @else
                                {{ $track->position }}. {{ $track->title }} (Feat.
                                @foreach ($track->feat_performers() as $performer )
                                    @if ($loop->last)
                                        {{ $performer }})
                                    @else
                                        {{ $performer }} &
                                    @endif
                                @endforeach
                                 ({{ $track->duration }})
                            @endif
                        @else
                            {{ $track->position }}.  {{ $track->title }} ({{ $track->duration }})
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="flex text-sm space-x-2 mb-3">
                    <div class="font-semibold text-gray-400">Duration</div><p>&nbsp;72 minutes</p>
            </div>
        </div>
    </div>
    <div class="album-comments-container flex flex-col w-8/12 relative space-y-6 ml-20 pt-2 mt-3 px-4">
      <div class="album-comment-container relative bg-white rounded-xl flex border-2 border-blue-600 ">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $album->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                {{-- <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">A random title can go here</a>
                </h4> --}}
                <div class="text-gray-600">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-gray-900">{{ $album->user->name }}</div>
                        <div>&bull;</div>
                        <div>{{ $album->created_at->diffForHumans() }}</div>
                    </div>
                    <div
                        class="flex items-center space-x-2"
                        x-data="{ isOpen: false }"
                    >
                        <button
                            class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                            @click="isOpen = !isOpen"
                        >
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul
                                class="absolute w-44 text-left font-semibold bg-white shadow-xl rounded-xl z-10 py-3 ml-8"
                                x-cloak
                                x-show.transition.origin.top.left="isOpen"
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                            >
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Edit the comment</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Comment</a></li>
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <div class="album-comment-container relative bg-white rounded-xl flex mt-4">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $album->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                {{-- <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">A random title can go here</a>
                </h4> --}}
                <div class="text-gray-600">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate rerum soluta laborum aut reprehenderit. Corporis distinctio obcaecati provident mollitia quis quibusdam quia molestiae earum eaque impedit pariatur, repellendus vero ut corrupti. Fugiat itaque assumenda quis voluptatum blanditiis nisi
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-gray-900">{{ $album->user->name }}</div>
                        <div>&bull;</div>
                        <div>{{ $album->created_at->diffForHumans() }}</div>
                    </div>
                    <div
                        class="flex items-center space-x-2"
                        x-data="{ isOpen: false }"
                    >
                        <button
                            class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                            @click="isOpen = !isOpen"
                        >
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul
                                class="absolute w-44 text-left font-semibold bg-white shadow-xl rounded-xl z-10 py-3 ml-8"
                                x-cloak
                                x-show.transition.origin.top.left="isOpen"
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                            >
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Edit the comment</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Comment</a></li>
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <div class="album-comment-container relative bg-white rounded-xl flex mt-4">
        <div class="flex flex-1 px-4 py-6">
            <div class="flex-none">
                <a href="#">
                    <img src="{{ $album->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
                </a>
            </div>
            <div class="w-full mx-4">
                {{-- <h4 class="text-xl font-semibold">
                    <a href="#" class="hover:underline">A random title can go here</a>
                </h4> --}}
                <div class="text-gray-600">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptate rerum soluta laborum aut reprehenderit. Corporis distinctio obcaecati provident mollitia quis quibusdam quia molestiae earum eaque impedit pariatur, repellendus vero ut corrupti. Fugiat itaque assumenda quis voluptatum blanditiis nisi odio veritatis amet quo adipisci. Reiciendis, quidem veniam nemo expedita asperiores vero voluptatem recusandae commodi exercitationem! Eos, laborum temporibus minima adipisci voluptate dolor exercitationem necessitatibus doloribus, placeat corrupti, reiciendis voluptates eaque expedita ex asperiores pariatur aliquid cum deserunt sequi sunt quo. Sapiente et vel quia dolore sunt dolores, hic tempora perferendis. Alias perferendis odio hic cupiditate optio accusamus, labore voluptatem laborum culpa.
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                        <div class="font-bold text-gray-900">{{ $album->user->name }}</div>
                        <div>&bull;</div>
                        <div>{{ $album->created_at->diffForHumans() }}</div>
                    </div>
                    <div
                        class="flex items-center space-x-2"
                        x-data="{ isOpen: false }"
                    >
                        <button
                            class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                            @click="isOpen = !isOpen"
                        >
                            <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></svg>
                            <ul
                                class="absolute w-44 text-left font-semibold bg-white shadow-xl rounded-xl z-10 py-3 ml-8"
                                x-cloak
                                x-show.transition.origin.top.left="isOpen"
                                @click.away="isOpen = false"
                                @keydown.escape.window="isOpen = false"
                            >
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Edit the comment</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Comment</a></li>
                            </ul>
                        </button>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div> 
</div>
</div>
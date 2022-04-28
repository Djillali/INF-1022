<x-app-layout>
    <main class="container mx-auto flex mt-2">
        <div class="w-1/12">
        </div>
        <div class="w-44 mr-5">
            <div class="bg-white sticky top-8 border-2 border-blue-500 rounded-xl mt-8">
                <div class="text-center px-6 py-2 pt-6">
                    <h3 class="font-semibold text-base">Add an album</h3>
                    <p class="text-xs mt-4">
                    @auth
                       Add an album to the collection
                    @else
                        Please login to add an album.
                    @endauth
                    </p>
                </div>

                @auth
                    <div    class="my-6 text-center" 
                            x-data>
                        <a
                            href="#"
                            @click="$dispatch('custom-show-add-modal')"
                            class="inline-block justify-center w-1/2 h-11 text-xs bg-blue-500 text-white font-semibold rounded-xl border border-blue-500 hover:bg-blue-700 transition duration-150 ease-in px-6 py-3"
                        >
                        <span class="ml-1">Add an album</span>
                        </a>
                    </div>
                @else
                    <div class="my-6 text-center">
                        <a
                            href="{{ route('login') }}"
                            class="inline-block justify-center w-1/2 h-11 text-xs bg-blue-500 text-white font-semibold rounded-xl border border-blue-500 hover:bg-blue-700 transition duration-150 ease-in px-6 py-3"
                        >
                        <span class="ml-1">Login</span>
                        </a>
                        <a
                            href="{{ route('register') }}"
                            class="inline-block justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3 mt-4"
                        >
                            Sign Up
                        </a>
                    </div>
                @endauth
            </div>
            <div class="bg-white sticky top-8 border-2 border-blue-500 rounded-xl mt-8">
                <div class="text-center px-6 py-2 pt-2">
                    <h3 class="font-semibold text-base">Artists:</h3>
                    @foreach ($artists as $artist)
                    <div class="hover:border-blue-500 border-b-2 border-gray-500 hover:bg-indigo-50 hover:text-blue-900 hover:font-bold text-xs">
                        <a href="{{ url('/') }}/albums?artist={{ $artist->slug }}&order=new&genre=all&user=all">{{ $artist->name }}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="w-9/12">
            <div class="mt-8">
                @yield('albums.content') {{-- ideas.index.blade.php --}}
            </div>
        </div>
        <div class="w-1/12">
        </div>
    </main>
</x-app-layout>
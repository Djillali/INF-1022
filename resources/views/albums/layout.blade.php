<x-app-layout>
    <main class="container mx-auto flex mt-2">
        <div class="w-1/12">
        </div>
        <div class="w-44 mr-5">
            <div class="bg-white sticky top-8 border-2 border-blue-500 rounded-xl mt-8">
                <div class="text-center px-6 py-2 pt-2">
                    <h3 class="font-semibold text-base">Artists:</h3>
                    @foreach ($artists as $artist)
                    <div class="hover:border-blue-500 border-b-2 border-gray-500 hover:bg-indigo-50 hover:text-blue-900 hover:font-bold text-xs">
                        <a href="{{ $artist->slug }}">{{ $artist->name }}</a>
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
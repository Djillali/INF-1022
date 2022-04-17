@extends('albums.layout')

@section('albums.content')

    <div>
        <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            <span class="ml-2">Back to search</span>
        </a>
    </div>

    <x-notification-success />
    <livewire:album-show :album='$album'/>
    <livewire:album-edit :key="'album-edit-'.$album->id" :album='$album'/>

@endsection
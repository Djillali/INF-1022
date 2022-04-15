@extends('ideas.layout')

@section('ideas.content')
<div>
    <a href="{{ $backUrl }}" class="flex items-center font-semibold hover:underline">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span class="ml-2">@lang('ideas.back')</span>
    </a>
</div>

<livewire:idea-card :idea='$idea' :votesCount='$votesCount' :isIndex=False />

<livewire:idea-comments :idea="$idea" />

<x-notification-success />

@can('update', $idea)
    <livewire:idea-edit :idea='$idea' />
@endcan

@can('delete', $idea)
    <livewire:idea-delete :idea='$idea' />
@endcan

<livewire:idea-spam :idea='$idea' />

@endsection

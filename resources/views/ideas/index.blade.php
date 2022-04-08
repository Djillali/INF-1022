@extends('ideas.layout')

@section('ideas.content')
<div class="filters flex space-x-6">
    <div class="w-1/3">
        <select name="category" id="category" class="w-full rounded-xl border-none px-4 py-2">

            @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->getCategoryName()}}</option>
            @endforeach
        </select>
    </div>
    <div class="w-1/3">
        <select name="other_filters" id="other_filters" class="w-full rounded-xl border-none px-4 py-2">
            <option value="filters1">Filter 1</option>
            <option value="filters2">Filter 2</option>
            <option value="filters3">Filter 3</option>
            <option value="filters4">Filter 4</option>
        </select>
    </div>
    <div class="w-2/3 relative">
        <input type="search" placeholder="@lang('ideas.search')"
            class="w-full rounded-xl bg-white border-none placeholder-gray-900 px-4 py-2 pl-8">
        <div class="absolute top-0 flex itmes-center h-full ml-2">
            <svg class="w-4 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>
    </div>
</div> {{-- End of Filters --}}
<div class="ideas-container space-y-6 my-6">
    @foreach ($ideas as $idea)
        <livewire:idea-card :idea='$idea' :votesCount='$idea->idea_votes_count' :isIndex=True />
    @endforeach
</div> <!-- end ideas-container -->
<div class="my-8">
    {{$ideas->links()}}
</div>
@endsection

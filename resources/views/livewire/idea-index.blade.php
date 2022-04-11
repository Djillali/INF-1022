<div
    x-data
    @click="
        const clicked = $event.target
        const target = clicked.tagName.toLowerCase()
        const ignores = ['button', 'svg', 'path', 'a']
        if (! ignores.includes(target)) {
            clicked.closest('.idea-container').querySelector('.idea-link').click()
        }
    "
    class="idea-container hover:shadow-xl transition duration-150 ease-in bg-white rounded-xl flex cursor-pointer"
>
    <div class="border-r border-gray-100 px-5 py-8">
        <div class="text-center">
            <div class="font-semibold text-2x @if ($hasVoted) text-blue-600 @endif"">{{$votesCount}}</div>
            <div class="text-gray-500">Votes</div>
        </div>
        @if ($hasVoted)
            <div class="mt-8">
                <button
                    wire:click.prevent='vote'
                    class="w-20 bg-blue-500 border border-blue-500 hover:border-blue-800 text-white font-bold text-xxs uppercase focus:outline-none focus:ring rounded-xl transition duration-150 ease-in px-4 py-3">@lang('buttons.voted')</button>
            </div>
        @else
            <div class="mt-8">
                <button
                    wire:click.prevent='vote'
                    class="w-20 bg-gray-200 border border-gray-200 hover:border-gray-400 font-bold text-xxs uppercase focus:outline-none focus:ring rounded-xl transition duration-150 ease-in px-4 py-3">@lang('buttons.vote')</button>
            </div>
        @endif
    </div>
    <div class="flex flex-1 px-2 py-6">
        <div class="flex-none">
            <a href="#">
                <img src="{{ $idea->user->getAvatar() }}" alt="avatar" class="w-14 h-14 rounded-xl">
            </a>
        </div>
        <div class="w-full flex flex-col justify-between mx-4">
            <h4 class="text-xl font-semibold">
                <a href="/ideas/{{$idea->slug}}" class="idea-link hover:underline">{{$idea->title}}</a>
            </h4>
            <div class="text-gray-600 mt-3 line-clamp-3">
                {{$idea->description}}
            </div>
            <div class="flex items-center justify-between mt-6">
                <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                    <div>{{$idea->created_at->diffForHumans()}}</div>
                    <div>&bull;</div>
                    <div>{{$idea->idea_category->name}}</div>
                    <div>&bull;</div>
                    <div class="text-gray-900">3 @lang('buttons.comments')</div>
                    @role('admin')
                        @if($idea->spam_reports > 0)
                            <div class="text-red-600">Spam Reports: {{ $idea->spam_reports }}</div>
                        @endif
                    @endrole
                </div>
                <div
                    x-data="{ isOpen: false}"
                    class="flex items-center space-x-2"
                >
                    <div class="{{$idea->idea_status->getStatusClasses()}} text-xs font-bold uppercase leading-none rounded-full text-center w-28 h-7 py-2 px-4">{{$idea->idea_status->getStatusName()}}</div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- end idea-container -->
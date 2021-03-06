 <div>
     @if($comments->isNotEmpty())
        <div class="comments-container relative space-y-6 ml-20 pt-4 my-8 mt-1">
            @foreach ($comments as $comment)
                <livewire:idea-comment
                    :key="$comment->id"
                    :comment="$comment"
                />
            @endforeach
        </div> <!-- end comments-container -->
    @else
        <div class="mx-auto w-70 mt-12">
            <img src="{{ asset('img/no-results.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity">
            <div class="text-gray-400 text-center font-bold mt-6">No ideas were found...</div>
        </div>
    @endif

 </div>
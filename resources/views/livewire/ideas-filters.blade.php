<div>
    <nav class="flex items-center justify-between text-xs text-gray-400">
        <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
            <li><a wire:click.prevent="setStatus('all')" href="#" class="border-b-4 pb-3 hover:border-blue-500 @if($status === 'all') border-blue-600 text-gray-900 @endif">All Ideas ({{ $statusCount['all_statuses'] }})</a></li>
             <li><a wire:click.prevent="setStatus('open')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if($status === 'open') border-blue-600 text-gray-900 @endif">@lang('ideas.open') ({{ $statusCount['open'] }})</a></li>
            <li><a wire:click.prevent="setStatus('considering')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if($status === 'considering') border-blue-600 text-gray-900 @endif">@lang('ideas.considering') ({{ $statusCount['considering'] }})</a></li>
            <li><a wire:click.prevent="setStatus('pending')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if($status === 'pending') border-blue-600 text-gray-900 @endif">@lang('ideas.pending') ({{ $statusCount['pending'] }})</a></li>
        </ul>

        <ul class="flex uppercase font-semibold border-b-4 pb-3 space-x-10">
            <li><a wire:click.prevent="setStatus('implemented')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if($status === 'implemented') border-blue-600 text-gray-900 @endif">@lang('ideas.implemented') ({{ $statusCount['implemented'] }})</a></li>
            <li><a wire:click.prevent="setStatus('closed')" href="#" class="transition duration-150 ease-in border-b-4 pb-3 hover:border-blue-500 @if($status === 'closed') border-blue-600 text-gray-900 @endif">@lang('ideas.closed') ({{ $statusCount['closed'] }})</a></li>
        </ul>
    </nav>
</div>
<div
    class="relative"
    x-data="{ isOpen: false }"
    x-init="
    window.livewire.on('statusWasUpdated', () => {
        isOpen = false
    })
"
>
    <button
        type="button"
        @click="isOpen = !isOpen"
        class="flex items-center justify-center w-36 h-11 text-sm bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
    >
        <span>@lang('buttons.setStatus')</span>
        <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div
        x-cloak
        x-show.transition.origin.top.left="isOpen"
        @click.away="isOpen = false"
        @keydown.escape.window="isOpen = false"
        class="absolute z-20 w-76 text-left font-semibold text-sm bg-white shadow-xl rounded-xl mt-2"
    >
        <form wire:submit.prevent="setStatus" action="#" class="space-y-4 px-4 py-6">
            <div class="space-y-2">
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 text-gray-600 border-none" name="status" value="1" checked>
                        <span class="ml-2">@lang('ideas.open')</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 text-purple-600 border-none" name="status" value="2">
                        <span class="ml-2">@lang('ideas.considering')</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 text-yellow-600 border-none" name="status" value="3">
                        <span class="ml-2">@lang('ideas.pending')</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 text-green-600 border-none" name="status" value="4">
                        <span class="ml-2">@lang('ideas.implemented')</span>
                    </label>
                </div>
                <div>
                    <label class="inline-flex items-center">
                        <input wire:model="status" type="radio" class="bg-gray-200 text-red-600 border-none" name="status" value="5">
                        <span class="ml-2">@lang('ideas.closed')</span>
                    </label>
                </div>
            </div>

            <div>
                <textarea name="update_comment" id="update_comments" cols="30" rows="3" class="w-full text-sm bg-gray-100 rounded-xl placeholder-gray-900 border-none px-4 py-2" placeholder="Add an update comment (optional)"></textarea>
            </div>

            <div class="flex items-center justify-between space-x-3">
                <button
                    type="button"
                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-gray-200 font-semibold rounded-xl border border-gray-200 hover:border-gray-400 transition duration-150 ease-in px-6 py-3"
                >
                    <svg class="text-gray-600 w-4 transform -rotate-45" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                    </svg>
                    <span class="ml-1">@lang('buttons.attach')</span>
                </button>
                <button
                    type="submit"
                    class="flex items-center justify-center w-1/2 h-11 text-xs bg-blue-500 text-white font-semibold rounded-xl border border-blue-500 hover:bg-blue-800 transition duration-150 ease-in px-6 py-3"
                >
                    <span class="ml-1">@lang('buttons.update')</span>
                </button>
            </div>
        </form>
    </div>
</div>
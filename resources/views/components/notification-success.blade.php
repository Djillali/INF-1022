@props([
    'redirect' => false,
    'messageToDisplay' => '',
])

<div
    x-cloak
    x-data="{
        isOpen: false,
        messageToDisplay: '{{ $messageToDisplay }}',
        showNotification(message){
            this.isOpen = true
            this.messageToDisplay = message
            setTimeout(() => {
                this.isOpen = false
            }, 5000)
        }
    }"
    x-init="
        @if($redirect)
            $nextTick(() => showNotification(messageToDisplay))
        @else
            Livewire.on('successNotificationOpen', message => {
                showNotification(message)
                })
        @endif
    "
    x-show="isOpen"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-x-16"
    x-transition:enter-end="opacity-100 transform translate-x-0"
    x-transition:leave="transition ease-in duration-1000"
    x-transition:leave-start="opacity-100 transform translate-x-0"
    x-transition:leave-end="opacity-0 transform translate-x-16"
    @keydown.escape.window="isOpen = false"

    class="flex flex-col sm:flex-row sm:items-center z-20 fixed bottom-0 right-0 bg-white rounded-xl shadow-xl border px-6 py-5 mx-6 my-8"
>
    <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
        <div class="text-green-500">
            <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        <div class="text-base font-medium ml-3">Success</div>
    </div>
    <div class="text-base tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4 mr-4" x-text='messageToDisplay'></div>
    <div class="absolute sm:relative sm:top-auto sm:right-auto ml-auto right-4 top-4 text-gray-400 hover:text-gray-800 cursor-pointer">
        <svg @click="isOpen = false" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </div>
</div>
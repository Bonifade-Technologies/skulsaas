<div class="w-full max-w-[500px] flex items-center space-x-2">
    <button class="inline-block p-2 shadow-sm rounded-lg" wire:click="decrement">-</button>
    <span class="text-lg">{{ $count }}</span>
    <button class="inline-block p-2 shadow-sm rounded-lg" wire:click="increment">+</button>
</div>
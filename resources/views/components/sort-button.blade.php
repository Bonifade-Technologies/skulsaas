<button class="cursor-pointer {{ $sortField == $field ? 'font-bold text-gray-700': '' }}"
    wire:click="sortBy({{ $field }})">
    {{ $slot }}
    <span class="">
        <i
            class="fa-solid transition duration-300 fa-angle-up {{ $sortField == $field && $sortAsc == 'desc' ? 'rotate-180' : '' }}"></i>
    </span>
</button>
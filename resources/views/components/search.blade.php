<div class="sm:pr-3">
    <label for="products-search" class="sr-only">Search</label>
    <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
        <input wire:model.debounce.500ms="search" type="text" id="products-search"
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5"
            placeholder="Search here">
    </div>
</div>
<div class="w-full">
    <x-form.label name="{{ $name }}" label="{{ $label }}" />
    <input wire:model.defer="{{ $name }}"
        {{ $attributes->merge(['class' => 'shadow-sm bg-gray-50 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'type' => $type, 'name' => $name, 'id' => $name]) }}>
    @error($name)
    <span class="mb-2 text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>
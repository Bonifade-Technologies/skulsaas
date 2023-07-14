<div class="w-full">
    <x-form.label name="{{ $name }}" label="{{ $label }}" />
    <select wire:model.defer="{{ $name }}"
        {{ $attributes->merge(['class' => 'shadow-sm bg-gray-50 capitalize text-gray-900 sm:text-sm rounded focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'name' => $name, 'id' => $name]) }}>
        <option value={{ null }} class="capitalize" selected>-- Select --</option>
        @foreach ($list as $item)
        <option value="{{ $item }}" class="capitalize">{{ $item }}</option>
        @endforeach
    </select>
    @error($name)
    <span class="mb-2 text-red-600 text-sm">{{ $message }}</span>
    @enderror
</div>
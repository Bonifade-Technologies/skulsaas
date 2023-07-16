<div class="w-full flex space-x-2 flex-wrap">
    <x-form.label :name="$name" :label="$label" class="lowercase" />
    <input
        {{ $attributes->merge(['class' => 'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded focus:text-primary text-primary focus:ring-primary-500 focus:border-primary-500 p-2 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500', 'type' => 'checkbox', 'name' => $name, 'id' => $name]) }}>
</div>

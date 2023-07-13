@php
$allSessions = \App\Models\Year::get();
@endphp
<div class="w-full">
    <div class="grid grid-cols-1 space-y-4">
        <div class="space-y-4">
            <x-bread-crumb :inp="array('name'=> 'Terms', 'url'=> 'academics/terms')" />
            <div class="flex items-center space-x-4">
                <x-title title="Session & Term" />
                <x-add title="Session" />
            </div>
        </div>

        <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                {{-- <x-search /> --}}
                <div wire:submit.prevent="addSession" class="flex gap-2 items-end flex-col md:flex-row">
                    {{-- <x-input.text label="name" name="name" />
                    <x-input.text label="Start Date" name="start" type="date" />
                    <x-input.text label="End Date" name="end" type="date" /> --}}
                    {{-- <button
                        class="text-white bg-primary hover:bg-primary-800 focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 min-w-max dark:hover:bg-primary focus:outline-none">
                        Add Session
                    </button> --}}

                </div>
                @if(count($checked))
                <div class="flex items-center w-full sm:justify-end">
                    <div class="flex pl-2 space-x-1">
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </a>
                        <a href="#"
                            class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    {{-- form --}}
    {{-- <x-form.center title="Term" :update="$update" class="gap-6" /> --}}
    <x-form.right title="Session" :update="$update" class="gap-6">
        <form wire:submit.prevent="addSession">
            <div class="space-y-4">
                <x-input.text label="name" name="name" />
                <x-input.text label="Start Date" name="start" type="date" />
                <x-input.text label="End Date" name="end" type="date" />

                <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
                    <button
                        class="text-white w-full justify-center bg-primary hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary dark:focus:ring-primary-800">
                        Add Session
                    </button>
                    <button type="button" @click="form = false"
                        class="inline-flex w-full border-primary justify-center items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border text-red-600 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                        <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                        Cancel
                    </button>
                </div>
            </div>
        </form>
    </x-form.right>

    <div class="w-full border flex divide-x divide-gray-300">
        <div class="w-full md:w-1/3 max-w-[250px] max-h-[500px]">
            <div class="p-2 border-b">
                <x-search />
            </div>
            <ul class="flex flex-col p-2 space-y-2 divide-gray-300 text-sm overflow-y-auto">
                @if ($allSessions->count())
                @forelse ($years as $year)
                <li class="px-3 py-2 border rounded tt hover:bg-primary hover:text-white">
                    <span>{{ $year->name }}</span>
                    <span>{{ $year->is_current }}</span>
                </li>
                @empty
                <li>No result found for search term</li>
                @endforelse
                @else
                <li>No session yet kindly add one</li>
                @endif
            </ul>
            @if ($allSessions->count() > $perPage)
            <div class="p-2 border-t">
                {{ $years->links() }}
            </div>
            @endif
        </div>
        <div class="flex-1">

        </div>
    </div>

</div>
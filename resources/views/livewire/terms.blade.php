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
                <x-input.text label="name" name="session_name" />
                <x-input.text label="Start Date" name="session_start" type="date" />
                <x-input.text label="End Date" name="session_end" type="date" />

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

    <div class="w-full border flex divide-x flex-col md:flex-row divide-gray-300 overflow-x-auto">
        <div class="w-full md:w-1/3 md:max-w-[250px] max-h-[500px]">
            <div class="p-2 border-b">
                <x-search />
            </div>
            <ul class="flex flex-col p-2 space-y-2 divide-gray-300 text-sm overflow-y-auto max-h-[400px]">
                @if ($allSessions->count())
                @forelse ($years as $year)
                <li wire:click="setYear({{ $year->id }})"
                    @class([ 'px-3 relative py-2 tt border border-gray-300 bg-white cursor-pointer flex justify-between items-center rounded tt hover:bg-slate-200'
                    ,'bg-background-200 black shadow border-0 font-medium'=> $year_id == $year->id])
                    >
                    <span>{{ $year->session_name }}</span>
                    @if ($year->is_current)
                    <x-badge color="green" name="current" />
                    {{-- <span x-cloak x-show="del"
                        class="absolute rounded -top-1 -left-1 cursor-pointer text-xl text-red-600 "
                        wire:click="deleteSession({{ $year->id }})">
                    <i class="fa-solid fa-circle-minus"></i>
                    </span> --}}
                    @endif


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
        <div class="flex-1 overflow-x-auto">
            @if ($allSessions->count())
            <form wire:submit.prevent=@if ($update) 'updateTerm' @else 'addTerm' @endif class="w-full p-2 border-b">
                <table class="w-full oveflow-x-auto">
                    <tr class="flex flex-col md:flex-row lg:flex-none">
                        <td class="border p-2 min-w-[120px]">
                            <x-input.single-select :list="['first', 'second', 'third']" label="name" name="name"
                                class="py-1 rounded" />
                        </td>
                        <td class="border p-2">
                            <x-input.text label="Start Date" name="start" type="date" class="py-1 rounded" />
                        </td>
                        <td class="border p-2">
                            <x-input.text label="End Date" name="end" type="date" class="py-1 rounded" />
                        </td>
                        <td class="border p-2">
                            <x-input.text label="Days" name="dso" class="py-1 rounded" />
                        </td>
                        <td class="border p-2 align-middle">
                            <button wire:loading.attr="disabled"
                                class="text-white bg-primary disabled:bg-gray-700 whitespace-nowrap capitalize disabled:text-gray-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="submit">{{ $update ? 'Update' : 'Add' }} Term</button>
                        </td>
                    </tr>
                </table>
            </form>

            <div class="w-full overflow-x-auto p-2">
                <table
                    class="w-full divide-y border min-w-[550px] divide-gray-200 table-fixed dark:divide-gray-600 overflow-x-auto">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="p-4 pl-10 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Term
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Start Date
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Date End
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Days
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @forelse ($currentSessionTerms as $term)
                        <tr class="even:bg-gray-50 dark:hover:bg-gray-700">
                            <td
                                class="px-4 py-2 space-x-2 capitalize text-base text-gray-900 whitespace-nowrap dark:text-white">
                                <span>{{ $loop->iteration."." }}</span>
                                <span> {{ $term->name }}</span>
                            </td>
                            <td class="px-4 text-sm py-2 text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $term->start->format('d M, Y') }}
                            </td>
                            <td class="px-4 text-sm py-2 text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $term->end->format('d M, Y') }}
                            </td>
                            <td class="px-4 py-2 text-base text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $term->dso }}
                            </td>

                            <td class="p-2 space-x-2 flex items-center whitespace-nowrap">
                                <button wire:click="editTerm({{ $term->id }})" data-tooltip-target="edit"
                                    data-tooltip-placement="left"
                                    class="h-7 w-7 border-blue-600 border rounded-md text-blue-600">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button wire:click="confirmDelete({{ $term->id }})" data-tooltip-target="delete"
                                    data-tooltip-placement="left"
                                    class="h-7 w-7 border-red-600 border rounded-md text-red-600">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                                {{-- <button type="button" id="updateProductButton"
                                    data-drawer-target="drawer-update-product-default"
                                    data-drawer-show="drawer-update-product-default"
                                    aria-controls="drawer-update-product-default" data-drawer-placement="right"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                        </path>
                                        <path fill-rule="evenodd"
                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    Update
                                </button> --}}
                            </td>
                            {{-- edit tooltip --}}
                            <x-tooltip pers="edit" content="Edit Term" />

                            {{-- edit tooltip --}}
                            <x-tooltip pers="delete" content="Delete Term" />

                        </tr>
                        @empty

                        @endforelse

                    </tbody>
                </table>
            </div>
            @else
            <div class="align-middle flex justify-center items-center py-auto h-full text-center">No term
                yet, first create a session, then
                you
                can be able to
                create term as
                well</div>
            @endif
        </div>
    </div>
    <x-confirm-delete text="Are you sure you want to delete this,
    this action is irreversible" />
</div>
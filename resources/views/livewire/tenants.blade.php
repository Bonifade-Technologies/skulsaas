<div class="w-full">
    <div class="grid grid-cols-1 space-y-4">
        <div class="space-y-4">
            <x-bread-crumb :inp="array('name'=> 'Tenants', 'url'=> 'superadmin/tenants')" />
            <div class="flex items-center space-x-4">
                <x-title title="School List" />
            </div>
        </div>
        <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                <x-search />
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
            <x-add title="School" />
        </div>
        <div class="w-full overflow-x-auto rounded-lg">
            {{-- <table
                class="w-full divide-y rounded-lg min-w-[550px] divide-gray-200 table-fixed dark:divide-gray-600 overflow-x-auto">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr class="">
                        <th class="text-xs px-4 font-medium text-left text-gray-500 uppercase dark:text-gray-400"
                            style="max-width: 50px!important">
                            <span class="flex items-center space-x-2">
                                <input type="checkbox" class="select-input">
                                <button class="cursor-pointer {{ $sortField == 'id' ? 'font-bold text-gray-700': '' }}"
            wire:click="sortBy('id')">
            <span> S/N</span>
            </button>
            </span>
            </th>
            <th scope="col" class="p-4 w-1/4  text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                <button class="cursor-pointer uppercase {{ $sortField == 'name' ? 'font-bold text-gray-700': '' }}"
                    wire:click="sortBy('name')">
                    <span> School name</span>
                    <span class="transition ">
                        <i
                            class="fa-solid fa-angle-up {{ $sortField == 'name' && $sortAsc == 'desc' ? 'rotate-180' : '' }}"></i>
                    </span>
                </button>
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                Domain
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                Renewal date
            </th>

            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                Status
            </th>
            <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                Actions
            </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @forelse ($tenants as $tenant)
                <tr class="even:bg-gray-100 dark:even:bg-gray-700">
                    <td class="px-4 py-2 capitalize text-base text-gray-900 dark:text-white"
                        style="mix-width: 500px!important">
                        <span class="flex items-center space-x-3">
                            <input type="checkbox" wire:model="checked" value="{{ $tenant->id }}" class="select-input">
                            <span>{{ $loop->iteration}}</span>
                        </span>

                    </td>
                    <td class="px-4 capitalize text-sm py-2 text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $tenant->name }}
                    </td>
                    <td class="px-4 text-sm py-2 text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="{{ $tenant->domain }}" class="cursor-pointer">{{ $tenant->domain }}</a>
                    </td>
                    <td class="px-4 text-sm py-2 text-gray-900 whitespace-nowrap dark:text-white">
                        <span>
                            {{ $tenant->created_at->addDays(300)->format('d M, Y') }}</span>
                    </td>
                    <td class="px-4 py-2 text-base text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="{{ statusColor($tenant->status) }} status">{{ $tenant->status }}</span>
                    </td>
                    <td class="p-2 space-x-2 flex items-center whitespace-nowrap">
                        <button wire:click="editTenant({{ $tenant->id }})" data-tooltip-target="edit"
                            data-tooltip-placement="left"
                            class="h-7 w-7 border-blue-600 border rounded-md text-blue-600">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                        <button wire:click="confirmDelete({{ $tenant->id }})" data-tooltip-target="delete"
                            data-tooltip-placement="left" class="h-7 w-7 border-red-600 border rounded-md text-red-600">
                            <i class="fa-regular fa-trash-can"></i>
                        </button>
                    </td>
                    {{-- edit tooltip 
                        <x-tooltip pers="edit" content="Edit School" />

                        {{-- edit tooltip 
                        <x-tooltip pers="delete" content="Delete School" />

                    </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>--}}
                    <div class="w-full border overflow-x-auto shadow-sm rounded-lg">
                        <table class="w-full overflow-x-auto rounded divide-y">
                            <thead class="text-xs p-2">
                                <tr class="font-medium text-left bg-gray-100 uppercase text-gray-500">
                                    <th class="p-2 text-center">
                                        <input type="checkbox" class="select-input">
                                    </th>
                                    <th class="">
                                        <button
                                            class="cursor-pointer {{ $sortField == 'id' ? 'font-bold text-gray-700': 'text-gray-500' }}"
                                            wire:click="sortBy('id')">
                                            <span> S/N</span>
                                            <span class="transition">
                                                <i
                                                    class="fa-solid fa-angle-up {{ $sortField == 'id' && $sortAsc == 'desc' ? 'rotate-180' : '' }}"></i>
                                            </span>
                                        </button>
                                    </th>
                                    <th class="p-4">
                                        <button
                                            class="cursor-pointer uppercase {{ $sortField == 'name' ? 'font-bold text-gray-700': '' }}"
                                            wire:click="sortBy('name')">
                                            <span> School name</span>
                                            <span class="transition ">
                                                <i
                                                    class="fa-solid fa-angle-up {{ $sortField == 'name' && $sortAsc == 'desc' ? 'rotate-180' : '' }}"></i>
                                            </span>
                                        </button>
                                    </th>
                                    <th class="p-4">
                                        <button
                                            class="cursor-pointer uppercase {{ $sortField == 'domain' ? 'font-bold text-gray-700': '' }}"
                                            wire:click="sortBy('domain')">
                                            <span>domain</span>
                                            <span class="transition ">
                                                <i
                                                    class="fa-solid fa-angle-up {{ $sortField == 'domain' && $sortAsc == 'desc' ? 'rotate-180' : '' }}"></i>
                                            </span>
                                        </button>
                                    </th>
                                    <th class="p-4">
                                        <button
                                            class="cursor-pointer uppercase {{ $sortField == 'created_at' ? 'font-bold text-gray-700': '' }}"
                                            wire:click="sortBy('created_at')">
                                            <span>Renewal date</span>
                                            <span class="transition ">
                                                <i
                                                    class="fa-solid fa-angle-up {{ $sortField == 'created_at' && $sortAsc == 'desc' ? 'rotate-180' : '' }}"></i>
                                            </span>
                                        </button>
                                    </th>
                                    <th class="p-4">
                                        <button
                                            class="cursor-pointer uppercase {{ $sortField == 'status' ? 'font-bold text-gray-700': '' }}"
                                            wire:click="sortBy('status')">
                                            <span>status</span>
                                            <span class="transition ">
                                                <i
                                                    class="fa-solid fa-angle-up {{ $sortField == 'status' && $sortAsc == 'desc' ? 'rotate-180' : '' }}"></i>
                                            </span>
                                        </button>
                                    </th>
                                    <th class="p-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tenants as $tenant)
                                <tr class="text-base border-b even:bg-gray-100 dark:even:bg-gray-700">
                                    <td class="py-2 px-4 text-center">
                                        <input type="checkbox" value="{{ $tenant->id }}" wire:model="checked"
                                            class="select-input">
                                    </td>
                                    <td class="p-2">{{ $loop->iteration }}</td>
                                    <td class="py-2 text-sm px-4 capitalize">{{ $tenant->name }}</td>
                                    <td class="py-2 px-4">
                                        <a href="{{ 'http://'.$tenant->domain }}" target="_blank"
                                            class="text-sm hover:underline hover:text-blue-600">{{'www.'. $tenant->domain }}</a>
                                    </td>
                                    <td class="py-2 px-4">
                                        <span class="text-sm">
                                            {{ $tenant->created_at->addDays(300)->format('d M, Y') }}</span>
                                    </td>
                                    <td class="py-2 px-4"> <span
                                            class="{{ statusColor($tenant->status) }} status">{{ $tenant->status }}</span>
                                    </td>
                                    <td class="p-2 space-x-2 flex items-center whitespace-nowrap">
                                        <button wire:click="editTenant({{ $tenant->id }})" data-tooltip-target="edit"
                                            data-tooltip-placement="left"
                                            class="h-7 w-7 border-blue-600 border rounded-md text-blue-600">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button wire:click="confirmDelete({{ $tenant->id }})"
                                            data-tooltip-target="delete" data-tooltip-placement="left"
                                            class="h-7 w-7 border-red-600 border rounded-md text-red-600">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </button>
                                    </td>
                                </tr>
                                @empty

                                @endforelse
                                {{-- edit tooltip --}}
                                <x-tooltip pers="edit" content="Edit School" />

                                {{-- edit tooltip --}}
                                <x-tooltip pers="delete" content="Delete School" />
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4">
                        {{ $tenants->links() }}
                    </div>
        </div>
    </div>
</div>
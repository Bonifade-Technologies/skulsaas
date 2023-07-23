<div class="grid w-full grid-cols-1 space-y-4">
    <div class="space-y-4">
        <x-bread-crumb :inp="array('name'=> 'Settings', 'url'=> 'admin/settings')" />
        <div class="flex items-center space-x-4">
            <x-title title="School Settings" />
        </div>
    </div>

    <div class="col-span-2">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                <input type="file" wire:model.defer="school_logo" id="school_logo" class="hidden">
                @if ($con?->school_logo && !$school_logo)
                <img src="{{ asset('/storage/' . $con->school_logo) }}" alt="{{ config('app.name') }}" class="mt-2 h-20 w-20 rounded-lg border border-gray-200 object-cover shadow lg:h-24 lg:w-24 xl:h-28
        xl:w-28">
                @elseif($school_logo)
                <img src="{{ $school_logo->temporaryUrl() }}" alt="{{ config('app.name') }}"
                    class="mt-2 h-20 w-20 rounded-lg border-2 border-gray-200 object-cover shadow lg:h-24 lg:w-24 xl:h-28 xl:w-28">
                @else
                <img src="/img/avatar.png" alt="{{ config('app.name') }}"
                    class="mt-2 h-20 w-20 rounded-full border border-gray-200 object-cover shadow-sm lg:h-24 lg:w-24 xl:h-28 xl:w-28">
                @endif
                <div>
                    <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">School Logo</h3>
                    <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                        @if ($errors->any())
                        @error('changeProfileImage')
                        <span class="mb-2 text-red-600">{{ $message }}</span>
                        @enderror
                        @else
                        <span> JPG, GIF or PNG. Max size of 500K</span>
                        @endif
                    </div>
                    <div class="flex items-center space-x-4">
                        @if ($school_logo)
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                            <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                </path>
                                <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                            </svg>
                            Upload logo
                        </button>
                        @else
                        <label for="school_logo"
                            class="px-4 py-2 text-sm rounded-full shadow bg-gray-200 text-black cursor-pointer">Choose
                            Logo</label>
                        @endif

                        <button wire:click="removeProfilePicture()"
                            class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-red-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-900 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-4 text-xl font-semibold dark:text-white">School information</h3>
            <div class="w-full overflow-x-auto">
                <form wire:submit.prevent="updateSchoolDetails" class="w-full">
                    <table class="w-full oveflow-x-auto border-collapse">
                        <tr class="flex border divide-x flex-col md:flex-row lg:flex-none w-full min-w-full">
                            {{-- <td class="border p-2">
                                    <x-input.single-select :list="['first', 'second', 'third']" label="name" name="name"
                                        class=" rounded" />
                                </td> --}}
                            <td class=" p-2">
                                <x-input.text label="Country" name="school_country" class=" rounded" />
                            </td>
                            <td class=" p-2">
                                <x-input.text label="School Name" name="school_name" class=" rounded" />
                            </td>
                            <td class=" p-2">
                                <x-input.text label="School Email" name="school_email" class=" rounded" />
                            </td>
                            <td class=" p-2">
                                <x-input.text label="Telephone" name="school_phone" class=" rounded" />
                            </td>
                            <td class=" p-2 align-middle">
                                <button wire:loading.attr="disabled"
                                    class="text-white bg-primary mt-6 disabled:bg-gray-700 whitespace-nowrap capitalize disabled:text-gray-500 hover:bg-primary-600 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                    type="submit">update</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <div class="col-span-full xl:col-auto">
        <div
            class="p-4 mb-4 space-y-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class=" text-xl font-semibold dark:text-white">School Categories</h3>
            <form wire:submit.prevent="@if(!$update)  saveSchoolName @else updateSchoolType @endif">
                <div class="flex items-end justify-start gap-4">
                    <div class="max-w-[300px]">
                        <x-input.text label="Category name" name="name" />
                    </div>
                    <x-save type="submit" />
                </div>
            </form>
            <x-tooltip pers="to" content="Click to edit" />
            <div class="flex flex-wrap gap-4">
                @forelse (\App\Models\SchoolType::select('id', 'name')->get() as $key => $item)
                <p id="{{ $key }}" wire:click="editType({{ $item->id }})" data-tooltip-target="to"
                    data-tooltip-placement="top"
                    class="min-w-[150px] text-center justify-center max-w-[200px] capitalize cursor-pointer tt bg-gray-100 px-3 py-1 rounded shadow">
                    <span>{{ $item->name }}</span>
                </p>
                @empty
                <p>No school categories yet add one</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
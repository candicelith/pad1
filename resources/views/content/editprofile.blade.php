@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">

        @if (Session::has('info'))
            <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-lightblue-100 p-4 text-center text-sm text-cyan opacity-100 transition-opacity duration-500 sm:w-1/2"
                role="alert">
                {!! Session::get('info') !!}
            </div>
        @endif

        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="w-full max-w-none rounded-3xl border border-gray-400 bg-lightblue shadow-md">
                <div class="mx-10 flex flex-col space-y-2 py-5 sm:mx-14 sm:py-10">

                    <div class="flex flex-col sm:flex-row-reverse">
                        <div class="mb-2 flex justify-end sm:mb-0">
                            {{-- Add Button --}}
                            <button data-modal-target="crud-modal2" data-modal-toggle="crud-modal2"
                                data-tooltip-target="tooltip-add-experience"
                                class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                            </button>

                            {{-- Tooltip --}}
                            <div id="tooltip-add-experience" role="tooltip"
                                class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-cyan px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                                Add Experience
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                            <!-- Main modal -->
                            <div id="crud-modal2" tabindex="-1" aria-hidden="true"
                                class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                <div class="relative max-h-full w-full max-w-5xl p-4">
                                    <div class="relative rounded-lg border-4 border-cyan-100 bg-white p-2 shadow">
                                        <div
                                            class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 text-center md:p-5">
                                            <h3 class="text-2xl text-cyan sm:text-start">
                                                Add Your New Experience!
                                            </h3>
                                            <button type="button" class="inline-flex items-center"
                                                data-modal-hide="crud-modal2">
                                                <svg class="h-6 w-6 text-cyan" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="3"
                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                </svg>
                                            </button>
                                        </div>

                                        {{-- Main Experience Form --}}
                                        <form class="scrollbar-modal max-h-[calc(100vh-12rem)] overflow-y-auto p-4 md:p-5"
                                            action="{{ route('alumni.create-experiences') }}" method="POST">
                                            @csrf
                                            <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">

                                                {{-- COMPANY SELECTION & NEW COMPANY FORM AREA --}}
                                                <div class="col-span-2" x-data="experienceCompanyHandler(
                                                    @js($companies->map(fn($c) => ['value' => $c->id_company, 'label' => $c->company_name])),
                                                    '{{ old('company') }}'
                                                )">
                                                    <label for="company_dropdown_input"
                                                        class="mb-2 block text-sm text-cyan sm:text-xl">
                                                        Company <span
                                                            class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                    </label>

                                                    <div class="relative w-full">
                                                        <input x-model="search" id="company_dropdown_input"
                                                            @focus="open = true; showCompanyForm = false"
                                                            @input.debounce.300ms="filterOptions"
                                                            @keydown.escape="open = false" @click.away="open = false"
                                                            class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-6 py-2 text-sm text-gray-900 focus:outline-none"
                                                            placeholder="Search or select a company" autocomplete="off" />

                                                        <ul x-show="open" x-transition
                                                            class="absolute z-20 mt-1 max-h-60 w-full overflow-y-auto rounded-md border border-gray-200 bg-white shadow-lg">
                                                            <template x-for="item in filteredOptions"
                                                                :key="item.value">
                                                                <li @click="selectOption(item)"
                                                                    class="cursor-pointer px-4 py-2 text-sm hover:bg-gray-100"
                                                                    x-text="item.label">
                                                                </li>
                                                            </template>
                                                            <li @click="toggleNewCompanyForm()"
                                                                class="text-cyan-600 cursor-pointer border-t px-4 py-2 text-sm font-semibold hover:bg-gray-100">
                                                                + Add a new company
                                                            </li>
                                                        </ul>
                                                        {{-- This hidden input is CRUCIAL. It holds the selected company_id for the main experience form --}}
                                                        <input type="hidden" name="company" :value="selectedOption?.value"
                                                            required>
                                                    </div>
                                                    @error('company')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror

                                                    {{-- Inline New Company Form (Initially Hidden) --}}
                                                    <div x-show="showCompanyForm" x-transition
                                                        class="col-span-2 mt-4 space-y-4 rounded-xl border border-gray-400 bg-gray-100 p-4">
                                                        <h4 class="text-lg text-cyan font-semibold mb-3">Create New Company
                                                        </h4>
                                                        <div id="new_company_ajax_errors_modal_editprofile"
                                                            class="text-red-500 text-sm mb-3"></div> {{-- Unique ID --}}

                                                        <div class="relative h-24 w-24 sm:h-32 sm:w-32">
                                                            <div
                                                                class="h-full w-full overflow-hidden rounded-full border-4 border-cyan bg-gray-50">
                                                                <img id="new_company_logo_preview_modal_editprofile"
                                                                    class="h-full w-full object-cover" src=""
                                                                    alt="Logo Preview">
                                                            </div>
                                                            <label for="new_company_logo_modal_editprofile"
                                                                class="hover:bg-cyan-600 absolute bottom-0 right-0 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-cyan text-white shadow-md">
                                                                <svg class="h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M3 9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M12 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M9 5h6l-1 4" />
                                                                </svg>
                                                            </label>
                                                            <input type="file" id="new_company_logo_modal_editprofile"
                                                                class="hidden"
                                                                @change="previewLogo($event, 'new_company_logo_preview_modal_editprofile')">
                                                        </div>
                                                        <div>
                                                            <label for="new_company_name_modal_editprofile"
                                                                class="mb-1 block text-sm text-gray-700">Name <span
                                                                    class="text-red-500">*</span></label>
                                                            <input type="text" id="new_company_name_modal_editprofile"
                                                                class="w-full rounded-full border-gray-300 bg-gray-50 py-2 px-4 shadow-sm">
                                                        </div>
                                                        <div>
                                                            <label for="new_company_field_modal_editprofile"
                                                                class="mb-1 block text-sm text-gray-700">Industry Type
                                                                <span class="text-red-500">*</span></label>
                                                            <input type="text" id="new_company_field_modal_editprofile"
                                                                class="w-full rounded-full border-gray-300 bg-gray-50 py-2 px-4 shadow-sm">
                                                        </div>
                                                        <div>
                                                            <label for="new_company_address_modal_editprofile"
                                                                class="mb-1 block text-sm text-gray-700">Location</label>
                                                            <input type="text"
                                                                id="new_company_address_modal_editprofile"
                                                                class="w-full rounded-full border-gray-300 bg-gray-50 py-2 px-4 shadow-sm">
                                                        </div>
                                                        <div>
                                                            <label for="new_company_description_modal_editprofile"
                                                                class="mb-1 block text-sm text-gray-700">Description <span
                                                                    class="text-red-500">*</span></label>
                                                            <textarea id="new_company_description_modal_editprofile" rows="3"
                                                                class="w-full rounded-md border-gray-300 bg-gray-50 py-2 px-3 shadow-sm"></textarea>
                                                        </div>
                                                        <div class="flex space-x-2">
                                                            <button type="button" @click="saveNewCompanyViaAjax()"
                                                                class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 text-sm">
                                                                Save & Select Company
                                                            </button>
                                                            <button type="button" @click="toggleNewCompanyForm()"
                                                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400 text-sm">
                                                                Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- END COMPANY SELECTION --}}


                                                <div class="col-span-2" x-data="positionDropdown({
                                                    options: [
                                                        { value: '', label: 'Search or select a position' },
                                                        { value: 'Software Engineer', label: 'Software Engineer' },
                                                        { value: 'Product Manager', label: 'Product Manager' },
                                                        { value: 'Data Analyst', label: 'Data Analyst' },
                                                        { value: 'UX Designer', label: 'UX Designer' },
                                                        { value: 'Marketing Specialist', label: 'Marketing Specialist' },
                                                        { value: 'Project Manager', label: 'Project Manager' },
                                                        { value: 'Business Analyst', label: 'Business Analyst' },
                                                        { value: 'Full Stack Developer', label: 'Full Stack Developer' },
                                                        { value: 'Frontend Developer', label: 'Frontend Developer' },
                                                        { value: 'Backend Developer', label: 'Backend Developer' }
                                                    ],
                                                    initialSelectedValue: '{{ old('position') }}'
                                                })">
                                                    <label for="position_dropdown_input"
                                                        class="mb-2 block text-sm text-cyan sm:text-xl">Position <span
                                                            class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                    <div class="relative w-full">
                                                        <input x-model="search" id="position_dropdown_input"
                                                            @focus="open = true" @input="filterOptions"
                                                            @click.away="open = false"
                                                            class="block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 px-6 text-sm text-gray-900 shadow focus:outline-none"
                                                            placeholder="Search or select a position"
                                                            autocomplete="off" />
                                                        <ul x-show="open"
                                                            class="absolute z-10 mt-1 max-h-60 w-full overflow-y-auto rounded-md border border-gray-200 bg-white shadow">
                                                            <template x-for="item in filteredOptions"
                                                                :key="item.value">
                                                                <li @click="selectOption(item)"
                                                                    class="cursor-pointer px-4 py-2 text-sm hover:bg-gray-200"
                                                                    x-text="item.label"></li>
                                                            </template>
                                                        </ul>
                                                        <input type="hidden" name="position"
                                                            :value="selectedOption?.value" required>
                                                    </div>
                                                    @error('position')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div date-rangepicker datepicker datepicker-buttons
                                                    datepicker-autoselect-today
                                                    class="col-span-2 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                    <div class="col-span-1">
                                                        <label for="datepicker-range-start"
                                                            class="mb-2 block text-sm text-cyan sm:text-xl">Start Date
                                                            <span
                                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                        <div class="relative">
                                                            <div
                                                                class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                                                <svg class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    fill="currentColor" viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                </svg>
                                                            </div>
                                                            <input id="datepicker-range-start" name="date_start"
                                                                type="text" value="{{ old('date_start') }}"
                                                                class="block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                placeholder="Select start date" required>
                                                        </div>
                                                        @error('date_start')
                                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="datepicker-range-end"
                                                            class="mb-2 block text-sm text-cyan sm:text-xl">End Date <span
                                                                x-show="!isCurrentPosition"
                                                                class="text-red-500 align-baseline text-4xl leading-none relative top-1 -ms-2">*</span></label>
                                                        <div class="space-y-2" x-data="{ isCurrentPosition: {{ old('is_current_position') ? 'true' : 'false' }} }">
                                                            <div class="relative">
                                                                <div
                                                                    class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                                                    <svg class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                                                        aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        fill="currentColor" viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                    </svg>
                                                                </div>
                                                                <input id="datepicker-range-end" name="date_end"
                                                                    type="text" value="{{ old('date_end') }}"
                                                                    :disabled="isCurrentPosition"
                                                                    :required="!isCurrentPosition"
                                                                    class="date-end-input block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                    placeholder="Select end date">
                                                            </div>
                                                            <div class="flex items-center">
                                                                <input id="current_position_checkbox"
                                                                    name="is_current_position" type="checkbox"
                                                                    value="1" x-model="isCurrentPosition"
                                                                    @change="if(isCurrentPosition) { document.getElementById('datepicker-range-end').value = ''; }"
                                                                    class="current-job-checkbox h-4 w-4 rounded border-gray-300 bg-gray-100 text-cyan focus:ring-2 focus:ring-cyan">
                                                                <label for="current_position_checkbox"
                                                                    class="ms-2 text-sm font-medium text-gray-700">This is
                                                                    my current position</label>
                                                            </div>
                                                        </div>
                                                        @error('date_end')
                                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-span-2">
                                                    <label class="mb-2 block text-sm text-cyan sm:text-xl">Responsibility
                                                        <span
                                                            class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                    <div id="responsibility-container-create">
                                                        @forelse (old('job_responsibility', ['']) as $index => $responsibility)
                                                            <div class="responsibility-item mb-2 flex items-center">
                                                                <input type="text" name="job_responsibility[]"
                                                                    value="{{ $responsibility }}"
                                                                    class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 py-2 text-sm text-gray-900"
                                                                    placeholder="Enter responsibility" />
                                                                <button type="button"
                                                                    class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                    style="{{ $loop->first && !old('job_responsibility') ? 'display: none;' : 'display: inline-flex;' }}">Remove</button>
                                                            </div>
                                                            @error('job_responsibility.' . $index)
                                                                <p class="text-sm text-red-500 -mt-2 mb-2">{{ $message }}
                                                                </p>
                                                            @enderror
                                                        @empty
                                                            <div class="responsibility-item mb-2 flex items-center">
                                                                <input type="text" name="job_responsibility[]"
                                                                    class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 py-2 text-sm text-gray-900"
                                                                    placeholder="Enter responsibility" />
                                                                <button type="button"
                                                                    class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                    style="display: none;">Remove</button>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                    <button type="button" id="add-responsibility-create"
                                                        class="bg-btn-cyan-100 mt-2 rounded-lg px-4 py-2 text-sm text-white hover:bg-cyan-400 hover:text-cyan sm:text-base">
                                                        Add Responsibility
                                                    </button>
                                                    @error('job_responsibility')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="flex justify-end">
                                                <button type="submit"
                                                    class="bg-btn-cyan m-4 rounded-lg bg-cyan px-6 py-2 text-white shadow-lg hover:bg-cyan-400 hover:text-cyan sm:py-2.5">
                                                    Submit Experience
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="-mt-8 mb-4 flex justify-start text-center sm:-mt-10 sm:text-start">
                            <h4 class="text-lg text-cyan sm:text-xl">Experience</h4>
                        </div>
                    </div>

                    @if ($jobDetails && count($jobDetails) > 0)
                        @foreach ($jobDetails as $job)
                            <div class="flex flex-col sm:flex-row-reverse">
                                <div class="mb-2 flex justify-end sm:mb-0">
                                    {{-- Edit Button --}}
                                    <button data-modal-target="crud-modal-{{ $job->id_tracking }}"
                                        data-tooltip-target="tooltip-edit-experience"
                                        data-modal-toggle="crud-modal-{{ $job->id_tracking }}"
                                        class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                        <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                        </svg>
                                    </button>

                                    {{-- Tooltip --}}
                                    <div id="tooltip-edit-experience" role="tooltip"
                                        class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-cyan px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                                        Edit Experience
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>

                                    <!-- Main modal -->
                                    <div id="crud-modal-{{ $job->id_tracking }}" tabindex="-1" aria-hidden="true"
                                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                        <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                                            <!-- Modal content -->
                                            <div class="relative rounded-lg border-4 border-cyan-100 bg-white p-2 shadow">
                                                <!-- Modal header -->
                                                <div
                                                    class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 text-center md:p-5">
                                                    <h3 class="text-2xl text-cyan sm:text-start">
                                                        Edit Experience
                                                    </h3>
                                                    <button data-modal-hide="crud-modal-{{ $job->id_tracking }}"
                                                        class="inline-flex items-center">
                                                        <svg class="h-6 w-6 text-cyan" aria-hidden="true"
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <form class="scrollbar-modal max-h-96 overflow-y-auto p-4 md:p-5"
                                                    action="{{ route('alumni.update-experiences', ['id' => $job->id_tracking]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                        <div class="col-span-2">
                                                            <label for="company"
                                                                class="mb-2 block text-sm text-cyan sm:text-xl">
                                                                Company <span
                                                                    class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                            </label>

                                                            <div class="col-span-2" x-data="dropdown({
                                                                options: @js($companies->map(fn($c) => ['value' => $c->id_company, 'label' => $c->company_name])),
                                                                selected: { value: '{{ $job->id_company }}', label: '{{ $job->company_name }}' }
                                                            })"
                                                                class="flex w-full items-center">

                                                                <div class="relative w-full">
                                                                    <input x-model="search" @click="open = true"
                                                                        @input="filterOptions" @click.away="open = false"
                                                                        class="block w-full rounded-full border border-gray-900 bg-gray-50 px-6 py-2 text-sm text-gray-900 focus:outline-none"
                                                                        placeholder="Search or select a company" />

                                                                    <ul x-show="open"
                                                                        class="absolute z-10 mt-1 max-h-60 w-full overflow-y-auto rounded-md border border-gray-200 bg-white shadow">
                                                                        <template x-for="item in filteredOptions"
                                                                            :key="item.value">
                                                                            <li @click="selectOption(item)"
                                                                                class="cursor-pointer px-4 py-2 text-sm hover:bg-gray-200"
                                                                                x-text="item.label"></li>
                                                                        </template>
                                                                        <li @click="open = false; window.location.href='{{ route('companies.create') }}'"
                                                                            class="text-cyan-600 cursor-pointer border-t px-4 py-2 text-sm hover:bg-gray-100">
                                                                            + Add a new company
                                                                        </li>
                                                                    </ul>

                                                                    <input type="hidden" name="company"
                                                                        :value="selected?.value" required>
                                                                </div>
                                                            </div>

                                                            {{-- Company Input --}}
                                                            <div
                                                                class="mt-4 space-y-4 rounded-xl border border-gray-900 bg-gray-50 p-4">
                                                                <form action="{{ route('companies.store') }}"
                                                                    method="POST" class="space-y-8 px-10">
                                                                    @csrf
                                                                    <div class="relative h-24 w-24 sm:h-32 sm:w-32">
                                                                        <!-- Profile Picture -->
                                                                        <div
                                                                            class="h-full w-full overflow-hidden rounded-full border-4 border-cyan bg-gray-100">
                                                                            <img id="preview-image"
                                                                                class="h-full w-full object-cover"
                                                                                src="" alt="Profile Picture">
                                                                        </div>

                                                                        <!-- Camera Icon -->
                                                                        <label for="profile_picture"
                                                                            class="hover:bg-cyan-600 absolute bottom-0 right-0 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-cyan text-white shadow-md transition-all sm:h-10 sm:w-10">
                                                                            <svg class="h-4 w-4 sm:h-5 sm:w-5"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="none" viewBox="0 0 24 24">
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M3 9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2"
                                                                                    d="M12 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                                                <path stroke="currentColor"
                                                                                    stroke-linecap="round"
                                                                                    stroke-linejoin="round"
                                                                                    stroke-width="2" d="M9 5h6l-1 4" />
                                                                            </svg>
                                                                        </label>
                                                                    </div>
                                                                    <div>
                                                                        <label for="company_name"
                                                                            class="mb-2 block text-sm text-cyan sm:text-xl">
                                                                            Name<span
                                                                                class="text-4xl text-red-500">*</span>
                                                                        </label>
                                                                        <input type="text" name="company_name"
                                                                            id="company_name"
                                                                            class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                                            value="{{ old('company_name') }}"
                                                                            placeholder="Enter the company name (e.g., ABC Tech Solutions)"
                                                                            required>
                                                                    </div>

                                                                    <div>
                                                                        <label for="company_field"
                                                                            class="mb-2 block text-sm text-cyan sm:text-xl">
                                                                            Industry Type<span
                                                                                class="text-4xl text-red-500">*</span>
                                                                        </label>
                                                                        <input type="text" name="company_field"
                                                                            id="company_field"
                                                                            class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                                            value="{{ old('company_field') }}"
                                                                            placeholder="Enter the industry type (e.g., IT, Finance, Healthcare)"
                                                                            required>
                                                                    </div>

                                                                    <div>
                                                                        <label for="company_address"
                                                                            class="mb-2 block text-sm text-cyan sm:text-xl">
                                                                            Location<span
                                                                                class="text-4xl text-red-500">*</span>
                                                                        </label>
                                                                        <input type="text" name="company_address"
                                                                            id="company_address"
                                                                            class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                                            value="{{ old('company_address') }}"
                                                                            placeholder="Enter city and country (e.g., Jakarta, Indonesia)"
                                                                            required>
                                                                    </div>

                                                                    <div>
                                                                        <label for="company_description"
                                                                            class="mb-2 block text-sm text-cyan sm:text-xl">
                                                                            Description<span
                                                                                class="text-4xl text-red-500">*</span>
                                                                        </label>
                                                                        <textarea name="company_description" id="company_description" rows="4"
                                                                            class="w-full rounded-md border border-gray-300 bg-gray-200 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                                            placeholder="Briefly describe the company and its mission" required>{{ old('company_description') }}</textarea>
                                                                    </div>

                                                                    <div class="space-y-3">
                                                                        <label for="company_phone"
                                                                            class="mb-2 block text-sm text-cyan sm:text-xl">
                                                                            File Upload<span
                                                                                class="text-4xl text-red-500">*</span>
                                                                        </label>
                                                                        <p>You can add one or more photos of your new
                                                                            company</p>
                                                                        <input type="file" name=""
                                                                            id="" class="rounded-full border"
                                                                            required>
                                                                    </div>

                                                                    <div class="flex justify-end space-x-3 pt-2">
                                                                        {{-- <a href="{{ url()->previous() }}"
                                                                class="rounded-md bg-gray-200 px-4 py-2 text-gray-700 transition hover:bg-gray-300">
                                                                Cancel
                                                            </a> --}}
                                                                        <button type="submit"
                                                                            class="bg-btn-cyan m-4 rounded-lg bg-cyan px-6 py-2 text-white shadow-lg hover:bg-cyan-400 hover:text-cyan sm:py-2.5">
                                                                            Create
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                            @error('company')
                                                                <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                </p>
                                                            @enderror
                                                        </div>

                                                        <div class="col-span-2" x-data="dropdown({
                                                            options: [
                                                                { value: 'Software Engineer', label: 'Software Engineer' },
                                                                { value: 'Product Manager', label: 'Product Manager' },
                                                                { value: 'Data Analyst', label: 'Data Analyst' },
                                                                { value: 'UX Designer', label: 'UX Designer' },
                                                                { value: 'Marketing Specialist', label: 'Marketing Specialist' },
                                                                { value: 'Project Manager', label: 'Project Manager' },
                                                                { value: 'Business Analyst', label: 'Business Analyst' },
                                                                { value: 'Full Stack Developer', label: 'Full Stack Developer' },
                                                                { value: 'Frontend Developer', label: 'Frontend Developer' },
                                                                { value: 'Backend Developer', label: 'Backend Developer' }
                                                            ],
                                                            selected: { value: '{{ $job->job_name }}', label: '{{ $job->job_name }}' }
                                                        })">
                                                            <label for="position"
                                                                class="mb-2 block text-sm text-cyan sm:text-xl">Position
                                                                <span
                                                                    class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>

                                                            <div class="relative w-full">
                                                                <input x-model="search" @click="open = true"
                                                                    @input="filterOptions" @click.away="open = false"
                                                                    class="block w-full rounded-full border border-gray-900 bg-gray-50 px-6 py-2 text-sm text-gray-900 focus:outline-none"
                                                                    placeholder="Search or select a position" />

                                                                <ul x-show="open"
                                                                    class="absolute z-10 mt-1 max-h-60 w-full overflow-y-auto rounded-md border border-gray-200 bg-white shadow">
                                                                    <template x-for="item in filteredOptions"
                                                                        :key="item.value">
                                                                        <li @click="selectOption(item)"
                                                                            class="cursor-pointer px-4 py-2 text-sm hover:bg-gray-200"
                                                                            x-text="item.label"></li>
                                                                    </template>
                                                                </ul>

                                                                <input type="hidden" name="position"
                                                                    :value="selected?.value" required>
                                                            </div>

                                                            @error('position')
                                                                <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                </p>
                                                            @enderror
                                                        </div>

                                                        <div class="col-span-2 grid grid-cols-1 gap-4 sm:grid-cols-2"
                                                            date-rangepicker datepicker datepicker-buttons
                                                            datepicker-autoselect-today>
                                                            <div class="col-span-1">
                                                                <label for="date_start"
                                                                    class="mb-2 block text-sm text-cyan sm:text-xl">Start
                                                                    Date <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                                <div class="relative">
                                                                    <div
                                                                        class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                                                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                                                            aria-hidden="true"
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            fill="currentColor" viewBox="0 0 20 20">
                                                                            <path
                                                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                        </svg>
                                                                    </div>
                                                                    <input
                                                                        id="datepicker-range-start-{{ $job->id_tracking }}"
                                                                        name="date_start" type="text"
                                                                        value="{{ $job->date_start }}"
                                                                        class="block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                        placeholder="Select start date" required>
                                                                </div>
                                                                @error('date_start')
                                                                    <p class="mt-1 text-sm text-red-500">
                                                                        {{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-span-1">
                                                                <label for="date_end"
                                                                    class="mb-2 block text-sm text-cyan sm:text-xl">End
                                                                    Date <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                                <div class="space-y-2">
                                                                    <div class="relative">
                                                                        <div
                                                                            class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                                                                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400"
                                                                                aria-hidden="true"
                                                                                xmlns="http://www.w3.org/2000/svg"
                                                                                fill="currentColor" viewBox="0 0 20 20">
                                                                                <path
                                                                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                                                            </svg>
                                                                        </div>
                                                                        <input
                                                                            id="datepicker-range-end-{{ $job->id_tracking }}"
                                                                            name="date_end" type="text"
                                                                            value="{{ $job->date_end }}"
                                                                            class="date-end-input block w-full rounded-xl border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                            placeholder="Select end date">
                                                                    </div>
                                                                    <div class="flex items-center">
                                                                        <input
                                                                            id="current_position_{{ $job->id_tracking }}"
                                                                            type="checkbox"
                                                                            class="current-job-checkbox h-4 w-4 rounded border-gray-300 bg-gray-100 text-cyan focus:ring-2 focus:ring-cyan"
                                                                            {{ $job->date_end == 'Present' || $job->date_end == null ? 'checked' : '' }}>
                                                                        <label
                                                                            for="current_position_{{ $job->id_tracking }}"
                                                                            class="ms-2 text-sm font-medium text-gray-700">This
                                                                            is my current position</label>
                                                                    </div>
                                                                </div>
                                                                @error('date_end')
                                                                    <p class="mt-1 text-sm text-red-500">
                                                                        {{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        @if (is_array($job->job_description) && !empty($job->job_description))
                                                            <div class="col-span-2">
                                                                <label for="responsibility"
                                                                    class="mb-2 block text-sm text-cyan sm:text-xl">Responsibility
                                                                    <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                                <div
                                                                    id="responsibility-container-update-{{ $job->id_tracking }}">
                                                                    @foreach ($job->job_description as $responsibility)
                                                                        <div
                                                                            class="responsibility-item mb-2 flex items-center">
                                                                            <input type="text"
                                                                                name="job_responsibility[]"
                                                                                class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                                                                                value="{{ $responsibility }}"
                                                                                placeholder="Enter responsibility"
                                                                                required />
                                                                            <button type="button"
                                                                                class="remove-responsibility ml-2 flex rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2">
                                                                                Remove
                                                                            </button>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                <button type="button"
                                                                    id="add-responsibility-update-{{ $job->id_tracking }}"
                                                                    class="bg-btn-cyan-100 mt-2 rounded-lg px-4 py-2 text-sm text-white hover:bg-cyan-400 hover:text-cyan sm:text-base">
                                                                    Add Responsibility
                                                                </button>

                                                                @error('job_responsibility')
                                                                    <p class="mt-1 text-sm text-red-500">
                                                                        {{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        @else
                                                            <div class="col-span-2">
                                                                <label for="responsibility"
                                                                    class="mb-2 block text-sm text-cyan sm:text-xl">Responsibility
                                                                    <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                                <div
                                                                    id="responsibility-container-update-{{ $job->id_tracking }}">
                                                                    <div
                                                                        class="responsibility-item mb-2 flex items-center">
                                                                        <input type="text" name="job_responsibility[]"
                                                                            class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                                                                            placeholder="Enter responsibility" required />
                                                                        <button type="button"
                                                                            class="remove-responsibility ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                            style="display: none;">
                                                                            Remove
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <button type="button"
                                                                    id="add-responsibility-update-{{ $job->id_tracking }}"
                                                                    class="bg-btn-cyan-100 mt-2 rounded-lg px-4 py-2 text-sm text-white hover:bg-cyan-400 hover:text-cyan sm:text-base">
                                                                    Add Responsibility
                                                                </button>

                                                                @error('job_responsibility')
                                                                    <p class="mt-1 text-sm text-red-500">
                                                                        {{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="flex justify-end">
                                                        <button data-modal-hide="crud-modal-{{ $job->id_tracking }}"
                                                            type="submit"
                                                            class="bg-btn-cyan m-4 rounded-lg bg-cyan px-6 py-2 text-white shadow-lg hover:bg-cyan-400 hover:text-cyan sm:py-2.5">
                                                            Save Changes
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ol class="relative -mt-12 list-none sm:-mt-12">
                                    <li class="mb-10">
                                        <h3 class="text-lg text-cyan sm:text-xl">
                                            {{ $job->job_name }}
                                        </h3>
                                        <h3 class="text-base text-cyan sm:text-xl">
                                            {{ $job->company_name }}
                                        </h3>
                                        <p class="text-xs text-gray-400 sm:text-sm">
                                            {{ $job->date_start }}
                                            -
                                            {{ $job->date_end }}
                                        </p>
                                        <ol class="ms-4 list-outside list-disc text-sm text-cyan sm:text-base">
                                            @if (is_array($job->job_description))
                                                @foreach ($job->job_description as $description)
                                                    <li>{{ $description }}</li>
                                                @endforeach
                                            @endif
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- Logout Button Script --}}
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
        @csrf
    </form>

    <script>
        document.getElementById('logout-button').addEventListener('click', function() {
            document.getElementById('logout-form').submit();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize modals dynamically when they open
            document.querySelectorAll('[data-modal-toggle]').forEach(button => {
                button.addEventListener('click', () => {
                    const modalId = button.getAttribute('data-modal-toggle');
                    const modal = document.getElementById(modalId);

                    // Reinitialize Select2 inside the modal
                    setTimeout(() => {
                        $(modal).find('.company-select, .position-select').select2({
                            placeholder: "Search or select",
                            allowClear: true,
                            width: '100%',
                            dropdownCssClass: 'rounded-xl',
                            tags: true
                        });
                    }, 100);
                });
            });
            // Current job checkbox functionality
            const currentJobCheckboxes = document.querySelectorAll('.current-job-checkbox');

            currentJobCheckboxes.forEach(checkbox => {
                const endDateInput = checkbox.closest('.space-y-2').querySelector('.date-end-input');

                // Set initial state
                if (checkbox.checked) {
                    endDateInput.value = 'Present';
                    endDateInput.disabled = true;
                    endDateInput.classList.add('bg-gray-100');
                }

                // Handle checkbox change
                checkbox.addEventListener('change', function() {
                    if (this.checked) {
                        // If checked, disable end date input and set value to "Present"
                        endDateInput.value = 'Present';
                        endDateInput.disabled = true;
                        endDateInput.classList.add('bg-gray-100');
                    } else {
                        // If unchecked, enable end date input and clear value
                        endDateInput.value = '';
                        endDateInput.disabled = false;
                        endDateInput.classList.remove('bg-gray-100');
                    }
                });
            });

            // Variables for create modal
            const responsibilityContainerCreate = document.getElementById('responsibility-container-create');
            const addButtonCreate = document.getElementById('add-responsibility-create');
            const maxResponsibilities = 3; // Set maximum number of responsibilities

            // Function to handle "Remove" button clicks
            const handleRemoveClick = (e) => {
                if (e.target.classList.contains('remove-responsibility')) {
                    // Remove the parent responsibility item when "Remove" is clicked
                    e.target.closest('.responsibility-item').remove();

                    // Re-add the "Add Responsibility" button if it was removed
                    if (!addButtonCreate.parentNode && responsibilityContainerCreate.children.length <
                        maxResponsibilities) {
                        responsibilityContainerCreate.parentNode.appendChild(addButtonCreate);
                    }
                }
            };

            // Add event delegation for pre-populated and dynamically added "Remove" buttons
            responsibilityContainerCreate.addEventListener('click', handleRemoveClick);

            // Add new responsibility input field when "Add Responsibility" button is clicked
            addButtonCreate.addEventListener('click', () => {
                // Check if the limit has been reached
                if (responsibilityContainerCreate.children.length >= maxResponsibilities) {
                    return; // Do not add more fields
                }

                // Create a new responsibility field with a "Remove" button
                const newItem = document.createElement('div');
                newItem.classList.add('responsibility-item', 'mb-2', 'flex', 'items-center');
                newItem.innerHTML = `
                <input type="text" name="job_responsibility[]"
                    class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                    placeholder="Enter Responsibility" required />
                <button type="button" class="remove-responsibility ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2">
                    Remove
                </button>
            `;

                // Append the new responsibility field to the container
                responsibilityContainerCreate.appendChild(newItem);

                // Hide the "Add Responsibility" button if the limit is reached
                if (responsibilityContainerCreate.children.length >= maxResponsibilities) {
                    addButtonCreate.remove();
                }
            });
        });

        // Update Forms
        document.addEventListener('DOMContentLoaded', () => {
            const modals = document.querySelectorAll('[id^="crud-modal-"]');

            modals.forEach((modal) => {
                const trackingId = modal.id.split('-').pop(); // Extract the unique ID
                const responsibilityContainerUpdate = document.getElementById(
                    `responsibility-container-update-${trackingId}`
                );
                const addButtonUpdate = document.getElementById(`add-responsibility-update-${trackingId}`);
                const maxResponsibilities = 3; // Set maximum number of responsibilities

                if (!responsibilityContainerUpdate || !addButtonUpdate) return;

                // Hide "Add Responsibility" button initially if the limit is already reached
                if (responsibilityContainerUpdate.children.length >= maxResponsibilities) {
                    addButtonUpdate.style.display = 'none';
                }

                // Function to handle "Remove" button clicks
                const handleRemoveClick = (e) => {
                    if (e.target.classList.contains('remove-responsibility')) {
                        // Remove the parent responsibility item when "Remove" is clicked
                        e.target.closest('.responsibility-item').remove();

                        // Show the "Add Responsibility" button if it was hidden
                        if (responsibilityContainerUpdate.children.length < maxResponsibilities) {
                            addButtonUpdate.style.display = 'inline-block';
                        }
                    }
                };

                // Add event delegation for pre-populated and dynamically added "Remove" buttons
                responsibilityContainerUpdate.addEventListener('click', handleRemoveClick);

                // Add new responsibility input field when "Add Responsibility" button is clicked
                addButtonUpdate.addEventListener('click', () => {
                    // Check if the limit has been reached
                    if (responsibilityContainerUpdate.children.length >= maxResponsibilities) {
                        return; // Do not add more fields
                    }

                    // Create a new responsibility field with a "Remove" button
                    const newItem = document.createElement('div');
                    newItem.classList.add('responsibility-item', 'mb-2', 'flex', 'items-center');
                    newItem.innerHTML = `
                    <input type="text" name="job_responsibility[]"
                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                        placeholder="Enter Responsibility" required />
                    <button type="button" class="remove-responsibility ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2">
                        Remove
                    </button>
                `;

                    // Append the new responsibility field to the container
                    responsibilityContainerUpdate.appendChild(newItem);

                    // Hide the "Add Responsibility" button if the limit is reached
                    if (responsibilityContainerUpdate.children.length >= maxResponsibilities) {
                        addButtonUpdate.style.display = 'none';
                    }
                });
            });
        });

        function dropdown({
            options
        }) {
            return {
                open: false,
                search: '',
                options,
                filteredOptions: options,
                selected: null,

                filterOptions() {
                    const term = this.search.toLowerCase();
                    this.filteredOptions = this.options.filter(o => o.label.toLowerCase().includes(term));
                },

                selectOption(option) {
                    this.selected = option;
                    this.search = option.label;
                    this.open = false;
                }
            }
        }
        // Ensure this is placed after Alpine.js is loaded

        function experienceCompanyHandler(initialCompanies, oldCompanyId) {
            return {
                open: false,
                search: '',
                options: initialCompanies || [], // Initial companies from PHP
                filteredOptions: [],
                selectedOption: null, // Holds { value: id, label: name }
                showCompanyForm: false,

                init() {
                    this.filteredOptions = [...this.options]; // Use spread to make a new array
                    if (oldCompanyId) {
                        const found = this.options.find(opt => String(opt.value) === String(oldCompanyId));
                        if (found) {
                            this.selectOption(found, false);
                        } else {
                            // If oldCompanyId isn't in options, it might be a new one from a previous attempt.
                            // For simplicity now, it won't be pre-selected. A robust fix involves ensuring
                            // the controller re-passes the newly added company in $companies on validation failure.
                            console.warn(`Old company ID ${oldCompanyId} not found in initial options.`);
                        }
                    }
                    // Initialize search text based on selected option, or empty if none
                    this.search = this.selectedOption ? this.selectedOption.label : '';
                },

                filterOptions() {
                    if (!this.search) {
                        this.filteredOptions = [...this.options];
                        this.selectedOption = null; // Clear selection if search is cleared by typing
                        return;
                    }
                    // Only filter if the search term doesn't exactly match the selected option's label
                    if (!this.selectedOption || this.search !== this.selectedOption.label) {
                        this.selectedOption = null; // Deselect if user is typing a new search
                    }
                    this.filteredOptions = this.options.filter(item =>
                        item.label.toLowerCase().includes(this.search.toLowerCase())
                    );
                },

                selectOption(item, closeDropdown = true) {
                    this.selectedOption = item; // { value: id, label: name }
                    this.search = item.label; // Update search input to reflect selection
                    if (closeDropdown) {
                        this.open = false;
                    }
                    this.showCompanyForm = false; // Always hide new company form when an existing one is selected
                    console.log('Selected company in Alpine:', this.selectedOption);
                },

                toggleNewCompanyForm() {
                    this.showCompanyForm = !this.showCompanyForm;
                    this.open = false; // Close dropdown
                    if (this.showCompanyForm) {
                        // When opening the new company form, clear any existing selection from the dropdown
                        this.selectedOption = null;
                        this.search = ''; // Clear search, so placeholder shows
                        this.clearNewCompanyFormFields();
                    }
                },

                clearNewCompanyFormFields() {
                    document.getElementById('new_company_name_modal_editprofile').value = '';
                    document.getElementById('new_company_field_modal_editprofile').value = '';
                    document.getElementById('new_company_address_modal_editprofile').value = '';
                    document.getElementById('new_company_description_modal_editprofile').value = '';
                    const logoInput = document.getElementById('new_company_logo_modal_editprofile');
                    if (logoInput) logoInput.value = null;
                    const logoPreview = document.getElementById('new_company_logo_preview_modal_editprofile');
                    if (logoPreview) logoPreview.src = '';
                    document.getElementById('new_company_ajax_errors_modal_editprofile').innerHTML = '';
                },

                previewLogo(event, previewElementId) {
                    const reader = new FileReader();
                    const previewEl = document.getElementById(previewElementId);
                    reader.onload = (e) => {
                        if (previewEl) previewEl.src = e.target.result;
                    };
                    if (event.target.files && event.target.files[0]) {
                        reader.readAsDataURL(event.target.files[0]);
                    } else {
                        if (previewEl) previewEl.src = '';
                    }
                },

                async saveNewCompanyViaAjax() {
                    const errorDisplay = document.getElementById('new_company_ajax_errors_modal_editprofile');
                    errorDisplay.innerHTML = '';

                    const formData = new FormData();
                    formData.append('_token',
                    '{{ csrf_token() }}'); // Make sure CSRF is available in your Blade layout

                    const companyName = document.getElementById('new_company_name_modal_editprofile')?.value;
                    const companyField = document.getElementById('new_company_field_modal_editprofile')?.value;
                    const companyAddress = document.getElementById('new_company_address_modal_editprofile')?.value;
                    const companyDescription = document.getElementById('new_company_description_modal_editprofile')
                        ?.value;

                    // Basic client-side validation (add more as needed)
                    if (!companyName) {
                        errorDisplay.innerHTML = '<p>Company name is required.</p>';
                        return;
                    }
                    if (!companyField) {
                        errorDisplay.innerHTML = '<p>Industry type is required.</p>';
                        return;
                    }
                    if (!companyDescription) {
                        errorDisplay.innerHTML = '<p>Description is required.</p>';
                        return;
                    }

                    formData.append('company_name', companyName);
                    formData.append('company_field', companyField);
                    formData.append('company_address', companyAddress || '');
                    formData.append('company_description', companyDescription);
                    // Add other fields from your company form if they exist
                    // formData.append('company_phone', document.getElementById('new_company_phone_modal_editprofile')?.value || '');


                    const logoInput = document.getElementById('new_company_logo_modal_editprofile');
                    if (logoInput && logoInput.files[0]) {
                        formData.append('company_picture', logoInput.files[0]);
                    }

                    try {
                        const response = await fetch(
                        '{{ route('companies.store.ajax') }}', { // Ensure this route is defined
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            }
                        });
                        const data = await response.json();

                        if (!response.ok) {
                            if (data.errors) {
                                let errorHtml = '<ul>';
                                for (const key in data.errors) {
                                    errorHtml += `<li>${data.errors[key][0]}</li>`;
                                }
                                errorHtml += '</ul>';
                                errorDisplay.innerHTML = errorHtml;
                            } else {
                                errorDisplay.innerHTML =
                                    `<p>${data.message || 'An error occurred saving the company.'}</p>`;
                            }
                            return;
                        }

                        // SUCCESS
                        const newCompanyForAlpine = {
                            value: data.company.id_company,
                            label: data.company.company_name
                        };

                        const existingOption = this.options.find(opt => String(opt.value) === String(newCompanyForAlpine
                            .value));
                        if (!existingOption) {
                            this.options.unshift(newCompanyForAlpine); // Add to the main options list
                        }
                        this.filterOptions(); // Re-filter (important if search was active)
                        this.selectOption(
                        newCompanyForAlpine); // This will set this.selectedOption and update this.search
                        this.showCompanyForm = false; // Hide the new company form
                        this.clearNewCompanyFormFields();

                        // User feedback (e.g., using a simple alert or a more sophisticated notification system)
                        alert(data.message || 'Company saved successfully and has been selected!');

                    } catch (error) {
                        console.error('AJAX save company error:', error);
                        errorDisplay.innerHTML = '<p>A network error occurred. Please try again.</p>';
                    }
                }
            }
        }

        // Position Dropdown (similar to the one from previous response, ensure IDs are unique if needed)
        function positionDropdown(config) {
            return {
                open: false,
                search: '',
                options: config.options || [],
                filteredOptions: [],
                selectedOption: null,
                initialSelectedValue: config.initialSelectedValue || '',

                init() {
                    this.filteredOptions = [...this.options];
                    if (this.initialSelectedValue) {
                        const found = this.options.find(opt => String(opt.value) === String(this.initialSelectedValue));
                        if (found) {
                            this.selectOption(found, false);
                        } else if (this.initialSelectedValue) {
                            const newOpt = {
                                value: this.initialSelectedValue,
                                label: this.initialSelectedValue
                            };
                            this.options.unshift(newOpt);
                            this.filteredOptions.unshift(newOpt); // Also add to filteredOptions
                            this.selectOption(newOpt, false);
                        }
                    }
                    this.search = this.selectedOption ? this.selectedOption.label : '';
                },
                filterOptions() {
                    if (!this.search) {
                        this.filteredOptions = [...this.options];
                        this.selectedOption = null;
                        return;
                    }
                    if (!this.selectedOption || this.search !== this.selectedOption.label) {
                        this.selectedOption = null;
                    }
                    this.filteredOptions = this.options.filter(item =>
                        item.label.toLowerCase().includes(this.search.toLowerCase())
                    );
                },
                selectOption(item, closeDropdown = true) {
                    this.selectedOption = item;
                    this.search = item.label;
                    if (closeDropdown) {
                        this.open = false;
                    }
                }
            }
        }

        // Initialize responsibility add/remove logic
        document.addEventListener('DOMContentLoaded', () => {
            const respContainerCreate = document.getElementById('responsibility-container-create');
            const addBtnCreate = document.getElementById('add-responsibility-create');
            if (respContainerCreate && addBtnCreate) {
                const maxResponsibilities = 3;

                const updateRemoveButtons = (container) => {
                    const items = container.querySelectorAll('.responsibility-item');
                    items.forEach((item, index) => {
                        const removeButton = item.querySelector('.remove-responsibility');
                        if (removeButton) {
                            removeButton.style.display = items.length === 1 ? 'none' : 'inline-flex';
                        }
                    });
                };

                const addField = (container, inputName) => {
                    if (container.children.length >= maxResponsibilities) {
                        alert(
                            `Maximum ${maxResponsibilities} ${inputName.replace('job_', '').replace('[]', '')} items allowed.`);
                        return;
                    }
                    const newItemDiv = document.createElement('div');
                    newItemDiv.classList.add('responsibility-item', 'mb-2', 'flex',
                    'items-center'); // Use a generic class if needed or keep as 'responsibility-item'
                    newItemDiv.innerHTML = `
                <input type="text" name="${inputName}"
                    class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 py-2 text-sm text-gray-900"
                    placeholder="Enter detail" />
                <button type="button"
                    class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2">Remove</button>
            `;
                    container.appendChild(newItemDiv);
                    updateRemoveButtons(container);
                };

                addBtnCreate.addEventListener('click', () => addField(respContainerCreate, 'job_responsibility[]'));
                respContainerCreate.addEventListener('click', function(e) {
                    if (e.target && e.target.classList.contains('remove-responsibility')) {
                        e.target.closest('.responsibility-item').remove();
                        updateRemoveButtons(respContainerCreate);
                    }
                });
                updateRemoveButtons(respContainerCreate); // Initial call
            }

            // Datepicker end date logic
            const currentPositionCheckboxModal = document.getElementById('current_position_checkbox');
            const dateEndInputModal = document.getElementById('datepicker-range-end');
            if (currentPositionCheckboxModal && dateEndInputModal) {
                const updateEndDateStateModal = () => {
                    if (currentPositionCheckboxModal.checked) {
                        dateEndInputModal.value = '';
                        dateEndInputModal.disabled = true;
                        dateEndInputModal.removeAttribute('required');
                    } else {
                        dateEndInputModal.disabled = false;
                        dateEndInputModal.setAttribute('required', 'required');
                    }
                };
                currentPositionCheckboxModal.addEventListener('change', updateEndDateStateModal);
                updateEndDateStateModal(); // Initial state
            }
        });
    </script>
    </script>

@endsection

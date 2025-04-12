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
                                class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 12h14m-7 7V5" />
                                </svg>
                            </button>

                            <!-- Main modal -->
                            <div id="crud-modal2" tabindex="-1" aria-hidden="true"
                                class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                                    <!-- Modal content -->
                                    <div
                                        class="scrollbar-modal relative my-14 max-h-96 overflow-y-auto rounded-lg border border-gray-900 bg-lightblue p-4 shadow dark:bg-gray-700 sm:mx-10 md:p-5">
                                        <!-- Modal header -->
                                        <div class="flex items-center justify-between border-b pb-4 mb-4">
                                            <h3 class="text-lg font-semibold text-cyan">
                                                Add New Experience
                                            </h3>
                                            <button data-modal-hide="crud-modal2" class="z-10 p-2 pe-0">
                                                <svg class="h-6 w-6 text-gray-900 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                </svg>
                                            </button>
                                        </div>

                                        <form action="{{ route('alumni.create-experiences') }}" method="POST">
                                            @csrf
                                            <div class="mb-4 grid grid-cols-2 gap-4 rounded-lg bg-gray-300 px-4 py-5">
                                                <div class="col-span-2">
                                                    <label for="company"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">
                                                        Company
                                                    </label>

                                                    <div class="flex items-center">
                                                        <select type="text" name="company" id="company_select"
                                                            class="company-select block w-full cursor-pointer rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                                                            required>
                                                            <option value="">Search or select a company</option>
                                                            @foreach ($companies as $company)
                                                                <option value="{{ $company->id_company }}">
                                                                    {{ $company->company_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <a href="{{ route('companies.create') }}"
                                                            class="ml-2 bg-cyan text-white rounded-full p-2 hover:bg-cyan-600">
                                                            <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                                            </svg>
                                                        </a>
                                                    </div>

                                                    @error('company')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>

                                                <div class="col-span-2">
                                                    <label for="position"
                                                        class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Position</label>
                                                    <div class="flex items-center">
                                                        <select name="position" id="position_select"
                                                            class="position-select block w-full cursor-pointer rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow">
                                                            <option value="">Search or select a position</option>
                                                            <option value="Software Engineer">Software Engineer</option>
                                                            <option value="Product Manager">Product Manager</option>
                                                            <option value="Data Analyst">Data Analyst</option>
                                                            <option value="UX Designer">UX Designer</option>
                                                            <option value="Marketing Specialist">Marketing Specialist
                                                            </option>
                                                            <option value="Project Manager">Project Manager</option>
                                                            <option value="Business Analyst">Business Analyst</option>
                                                            <option value="Full Stack Developer">Full Stack Developer
                                                            </option>
                                                            <option value="Frontend Developer">Frontend Developer</option>
                                                            <option value="Backend Developer">Backend Developer</option>
                                                        </select>
                                                    </div>
                                                    @error('position')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div date-rangepicker datepicker datepicker-buttons
                                                    datepicker-autoselect-today
                                                    class="col-span-2 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                    <div class="col-span-1">
                                                        <label for="date_start"
                                                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-white">Start
                                                            Date <span class="text-red-500">*</span></label>
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
                                                                type="text"
                                                                class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                placeholder="Select start date" required>
                                                        </div>
                                                        @error('date_start')
                                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                    <div class="col-span-1">
                                                        <label for="date_end"
                                                            class="mb-2 block text-sm font-medium text-gray-700 dark:text-white">End
                                                            Date</label>
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
                                                                <input id="datepicker-range-end" name="date_end"
                                                                    type="text"
                                                                    class="date-end-input block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                    placeholder="Select end date">
                                                            </div>
                                                            <div class="flex items-center">
                                                                <input id="current_position" type="checkbox"
                                                                    class="current-job-checkbox h-4 w-4 rounded border-gray-300 bg-gray-100 text-cyan focus:ring-2 focus:ring-cyan">
                                                                <label for="current_position"
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
                                                    <label for="responsibility"
                                                        class="mb-2 block text-sm text-gray-400">Responsibility</label>
                                                    <div id="responsibility-container-create">
                                                        <div class="responsibility-item mb-2 flex items-center">
                                                            <input type="text" name="job_responsibility[]"
                                                                class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                                                                placeholder="Enter responsibility" required />
                                                            <button type="button"
                                                                class="remove-responsibility ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                                style="display: none;">Remove</button>
                                                        </div>
                                                    </div>
                                                    <button type="button" id="add-responsibility-create"
                                                        class="bg-btn-cyan mt-2 rounded-full px-4 py-2 text-sm text-white hover:bg-cyan-300 sm:text-base">
                                                        Add Responsibility
                                                    </button>
                                                    @error('job_responsibility')
                                                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <button data-modal-hide="crud-modal" type="submit"
                                                class="bg-btn-cyan m-4 rounded-full bg-cyan px-5 py-2.5 text-white shadow-lg hover:bg-white hover:text-cyan">
                                                Save Changes
                                            </button>
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
                                    <!-- Main modal -->
                                    <div id="crud-modal-{{ $job->id_tracking }}" tabindex="-1" aria-hidden="true"
                                        class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                        <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                                            <!-- Modal content -->
                                            <div
                                                class="scrollbar-modal relative my-14 max-h-96 overflow-y-auto rounded-lg border border-gray-900 bg-lightblue p-4 shadow dark:bg-gray-700 sm:mx-10 md:p-5">
                                                <!-- Modal header -->
                                                <div class="flex items-center justify-between border-b pb-4 mb-4">
                                                    <h3 class="text-lg font-semibold text-cyan">
                                                        Edit Experience
                                                    </h3>
                                                    <button data-modal-hide="crud-modal-{{ $job->id_tracking }}"
                                                        class="z-10 p-2 pe-0">
                                                        <svg class="h-6 w-6 text-gray-900 dark:text-white"
                                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                            width="24" height="24" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round"
                                                                stroke-linejoin="round" stroke-width="2"
                                                                d="M6 18 17.94 6M18 18 6.06 6" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{ route('alumni.update-experiences', ['id' => $job->id_tracking]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div
                                                        class="mb-4 grid grid-cols-2 gap-4 rounded-lg bg-gray-300 px-4 py-5">
                                                        <div class="col-span-2">
                                                            <label for="company"
                                                                class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Company</label>
                                                            <div class="flex items-center">
                                                                <select type="text" name="company" id="company"
                                                                    class="company-select block w-full cursor-pointer rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                                                                    placeholder="{{ $job->company_name }}"
                                                                    required="">
                                                                    <option value="">Search or select a company
                                                                    </option>
                                                                    @foreach ($companies as $company)
                                                                        <option value="{{ $company->id_company }}"
                                                                            {{ $company->company_name == $job->company_name ? 'selected' : '' }}>
                                                                            {{ $company->company_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <a href="{{ route('companies.create') }}"
                                                                    class="ml-2 bg-cyan text-white rounded-full p-2 hover:bg-cyan-600">
                                                                    <svg class="h-5 w-5" fill="none"
                                                                        stroke="currentColor" viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="2"
                                                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                                                                        </path>
                                                                    </svg>
                                                                </a>
                                                                @error('company')
                                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-span-2">
                                                            <label for="position"
                                                                class="mb-2 block text-sm font-medium text-gray-400 dark:text-white">Position</label>
                                                            <div class="flex items-center">
                                                                <select name="position"
                                                                    id="position_select_{{ $job->id_tracking }}"
                                                                    class="position-select block w-full cursor-pointer rounded-full border border-gray-500 bg-gray-50 p-2.5 text-sm text-gray-900 shadow">
                                                                    <option value="">Search or select a position
                                                                    </option>
                                                                    <option value="Software Engineer"
                                                                        {{ $job->job_name == 'Software Engineer' ? 'selected' : '' }}>
                                                                        Software Engineer</option>
                                                                    <option value="Product Manager"
                                                                        {{ $job->job_name == 'Product Manager' ? 'selected' : '' }}>
                                                                        Product Manager</option>
                                                                    <option value="Data Analyst"
                                                                        {{ $job->job_name == 'Data Analyst' ? 'selected' : '' }}>
                                                                        Data Analyst</option>
                                                                    <option value="UX Designer"
                                                                        {{ $job->job_name == 'UX Designer' ? 'selected' : '' }}>
                                                                        UX Designer</option>
                                                                    <option value="Marketing Specialist"
                                                                        {{ $job->job_name == 'Marketing Specialist' ? 'selected' : '' }}>
                                                                        Marketing Specialist</option>
                                                                    <option value="Project Manager"
                                                                        {{ $job->job_name == 'Project Manager' ? 'selected' : '' }}>
                                                                        Project Manager</option>
                                                                    <option value="Business Analyst"
                                                                        {{ $job->job_name == 'Business Analyst' ? 'selected' : '' }}>
                                                                        Business Analyst</option>
                                                                    <option value="Full Stack Developer"
                                                                        {{ $job->job_name == 'Full Stack Developer' ? 'selected' : '' }}>
                                                                        Full Stack Developer</option>
                                                                    <option value="Frontend Developer"
                                                                        {{ $job->job_name == 'Frontend Developer' ? 'selected' : '' }}>
                                                                        Frontend Developer</option>
                                                                    <option value="Backend Developer"
                                                                        {{ $job->job_name == 'Backend Developer' ? 'selected' : '' }}>
                                                                        Backend Developer</option>
                                                                </select>
                                                            </div>
                                                            @error('position')
                                                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                        <div class="col-span-2 grid grid-cols-1 gap-4 sm:grid-cols-2"
                                                            date-rangepicker datepicker datepicker-buttons
                                                            datepicker-autoselect-today>
                                                            <div class="col-span-1">
                                                                <label for="date_start"
                                                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-white">Start
                                                                    Date <span class="text-red-500">*</span></label>
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
                                                                        class="block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
                                                                        placeholder="Select start date" required>
                                                                </div>
                                                                @error('date_start')
                                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                            <div class="col-span-1">
                                                                <label for="date_end"
                                                                    class="mb-2 block text-sm font-medium text-gray-700 dark:text-white">End
                                                                    Date</label>
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
                                                                            class="date-end-input block w-full rounded-full border border-gray-500 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900 shadow focus:border-cyan focus:ring-cyan"
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
                                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        @if (is_array($job->job_description) && !empty($job->job_description))
                                                            <div class="col-span-2">
                                                                <label for="responsibility"
                                                                    class="mb-2 block text-sm text-gray-400">Responsibility</label>
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
                                                                    class="bg-btn-cyan mt-2 rounded-full px-4 py-2 text-sm text-white hover:bg-cyan-300 sm:text-base">
                                                                    Add Responsibility
                                                                </button>

                                                                @error('job_responsibility')
                                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        @else
                                                            <div class="col-span-2">
                                                                <label for="responsibility"
                                                                    class="mb-2 block text-sm text-gray-400">Responsibility</label>
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
                                                                    class="bg-btn-cyan mt-2 rounded-full px-4 py-2 text-sm text-white hover:bg-cyan-300 sm:text-base">
                                                                    Add Responsibility
                                                                </button>

                                                                @error('job_responsibility')
                                                                    <p class="mt-1 text-sm text-red-500">{{ $message }}
                                                                    </p>
                                                                @enderror
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <button data-modal-hide="crud-modal-{{ $job->id_tracking }}"
                                                        type="submit"
                                                        class="bg-btn-cyan m-4 rounded-full bg-cyan px-5 py-2.5 text-white shadow-lg hover:bg-white hover:text-cyan">
                                                        Save Changes
                                                    </button>
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
                                        <h3 class="text-base text-cyan sm:text-lg">
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <script>
        document.getElementById('logout-button').addEventListener('click', function() {
            document.getElementById('logout-form').submit();
        });
    </script>

    <script>
        $(document).ready(function() {
            // Initialize Select2 for all company dropdowns
            $('.company-select').select2({
                placeholder: "Search or select a company",
                allowClear: false, // This prevents the "X" clear button from appearing
                width: '100%',
                dropdownCssClass: 'rounded-xl'
            });

            // Initialize Select2 for all position dropdowns
            $('.position-select').select2({
                placeholder: "Search or select a position",
                allowClear: false,
                width: '100%',
                dropdownCssClass: 'rounded-xl'
            });

            $.fn.select2.defaults.set('allowClear', false);

            document.getElementById('closePositionBtn').addEventListener('click', closePositionModal);
            document.getElementById('cancelPositionBtn').addEventListener('click', closePositionModal);

            // Save new position
            document.getElementById('savePositionBtn').addEventListener('click', function() {
                const newPositionName = document.getElementById('new_position_name').value.trim();

                if (!newPositionName) {
                    alert('Please enter a position name');
                    return;
                }

                // Get the target select element ID
                const targetSelectId = this.getAttribute('data-target');
                const targetSelect = document.getElementById(targetSelectId);

                // Create a new option and append it to the select
                const newOption = new Option(newPositionName, newPositionName, true, true);
                $(targetSelect).append(newOption).trigger('change');

                // Close the modal
                closePositionModal();
            });

            // Fix Select2 inside modal issue
            $(document).on('select2:open', () => {
                document.querySelector('.select2-search__field').focus();
            });
        });
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
    </script>
@endsection

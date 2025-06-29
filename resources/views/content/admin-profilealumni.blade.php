@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-16 sm:ms-60">
            <div
                class="mx-4 mt-14 flex max-w-screen-xl flex-col items-start justify-center px-2 py-8 sm:mx-auto sm:ms-4 sm:flex-row sm:px-4">

                <!-- Back Button -->
                <button class="mb-4" onclick="window.location.href='{{ route('admin.alumni') }}'">
                    <svg class="h-8 w-8 text-gray-800 sm:h-16 sm:w-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14 8-4 4 4 4" />
                    </svg>
                </button>

                <div class="w-full max-w-none space-y-14">
                    @if (Session::has('approved'))
                        <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-lightgreen p-4 text-center text-sm text-green-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                            role="alert">
                            {!! Session::get('approved') !!}
                        </div>
                    @elseif (Session::has('rejected'))
                        <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-red-300 p-4 text-center text-sm text-red-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                            role="alert">
                            {!! Session::get('rejected') !!}
                        </div>
                    @endif
                    <!-- Content Section -->
                    <div class="w-full rounded-3xl bg-lightblue shadow-lg">
                        {{-- Alumni Details --}}
                        <div class="p-6 sm:p-8 lg:p-10">
                            <div class="lg:mx-14">
                                <div class="flex flex-col lg:flex-row lg:space-x-8">
                                    <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28"
                                        src="{{ asset('storage/profile/' . $userDetails->profile_photo) }}"
                                        alt="" />
                                    <div class="mt-4">
                                        <h2 class="text-xl text-cyan sm:text-2xl">{{ $userDetails->name }}</h2>
                                        <h3 class="text-md text-cyan sm:text-lg">{{ $userDetails->current_job }},
                                            {{ $userDetails->current_company }}
                                        </h3>
                                    </div>
                                </div>
                                <div class="flex flex-col sm:flex-row-reverse">
                                    <div class="mb-2 flex justify-end sm:mb-0">

                                        {{-- Edit Button --}}
                                        <button data-modal-target="crud-modal1" data-modal-toggle="crud-modal1"
                                            class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                            <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                            </svg>
                                        </button>

                                        <!-- Main modal -->
                                        <div id="crud-modal1" tabindex="-1" aria-hidden="true"
                                            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                            <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                                                <!-- Modal content -->
                                                <div class="relative overflow-y-auto rounded-lg bg-white pb-5 shadow">
                                                    <!-- Modal header -->
                                                    <div
                                                        class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 p-2 text-center md:p-5">
                                                        <h3 class="text-2xl text-cyan sm:text-start">
                                                            Edit Profile
                                                        </h3>
                                                        <button type="button" class="inline-flex items-center"
                                                            data-modal-hide="crud-modal1">
                                                            <svg class="h-6 w-6 text-cyan" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="3"
                                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <form
                                                        class="scrollbar-modal max-h-96 space-y-8 overflow-y-auto p-4 md:p-5"
                                                        action="{{ route('admin.edit-alumni', ['id' => $userDetails->id_userDetails]) }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="relative h-24 w-24 sm:h-32 sm:w-32">
                                                            <div
                                                                class="h-full w-full overflow-hidden rounded-full border-4 border-cyan bg-gray-100">
                                                                <img id="preview-image" class="h-full w-full object-cover"
                                                                    src="{{ asset('storage/profile/' . $userDetails->profile_photo) }}"
                                                                    alt="{{ $userDetails->name }}'s Profile Picture">
                                                            </div>
                                                            <label for="profile_picture"
                                                                class="hover:bg-cyan-600 absolute bottom-0 right-0 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-cyan text-white shadow-md transition-all sm:h-10 sm:w-10">
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
                                                        </div>
                                                        <!-- Hidden Input -->
                                                        <input id="profile_picture" name="profile_picture" type="file"
                                                            accept="image/*" class="hidden"
                                                            onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])">
                                                        <div>
                                                            <label for="full_name"
                                                                class="mb-1 block text-2xl text-cyan">Full
                                                                Name <span
                                                                    class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                            <input type="text" id="full_name" name="full_name"
                                                                class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                                disabled value="{{ $userDetails->name }}" />
                                                        </div>
                                                        <div>
                                                            <label for="current_company"
                                                                class="mb-1 block text-2xl text-cyan">Current
                                                                Company </label>
                                                            <select name="current_company" id="current_company"
                                                                class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">
                                                                <option value="" disabled
                                                                    {{ $userDetails->current_job ? '' : 'selected' }}>
                                                                    Select a company</option>
                                                                <option value="">No Company</option>
                                                                @foreach ($companies as $company)
                                                                    <option value="{{ $company->company_name }}"
                                                                        {{ $company->company_name == $userDetails->current_company ? 'selected' : '' }}>
                                                                        {{ $company->company_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label for="current_job"
                                                                class="mb-1 block text-2xl text-cyan">
                                                                Current Position
                                                            </label>
                                                            <select id="current_job" name="current_job"
                                                                class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">

                                                                <option value="" disabled
                                                                    {{ old('current_job', $userDetails->current_job) ? '' : 'selected' }}>
                                                                    Select a job position
                                                                </option>

                                                                <option value=""
                                                                    {{ old('current_job', $userDetails->current_job) == '' ? 'selected' : '' }}>
                                                                    Jobless
                                                                </option>

                                                                @foreach ($allJob as $job)
                                                                    <option value="{{ $job->job_name }}"
                                                                        {{ old('current_job', $userDetails->current_job) == $job->job_name ? 'selected' : '' }}>
                                                                        {{ $job->job_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div>
                                                            <label for="user_description"
                                                                class="mb-1 block text-2xl text-cyan">Description</label>
                                                            <textarea type="text" id="user_description" name="user_description"
                                                                class="w-full rounded-md border border-gray-300 bg-gray-200 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">{{ $userDetails->user_description }}</textarea>
                                                        </div>
                                                        <div class="flex justify-end space-x-3 pt-4">
                                                            <button data-modal-hide="crud-modal" type="submit"
                                                                class="bg-btn-cyan m-4 rounded-lg bg-cyan px-6 py-2 text-white shadow-lg hover:bg-cyan-400 hover:text-cyan sm:py-2.5">
                                                                Save Changes
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="-mt-8 space-y-4">
                                        <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                                        <p class="sm:text-md text-justify text-sm text-cyan">
                                            {{ $userDetails->user_description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full rounded-3xl bg-lightblue shadow-lg">
                        <div class="p-6 sm:p-8 lg:p-10">
                            <div class="lg:mx-14">
                                <div class="flex flex-col space-y-4 sm:pt-5">
                                    <div class="flex flex-col sm:flex-row-reverse">
                                        <div class="mb-2 flex justify-end sm:mb-0">

                                            {{-- Edit Button --}}
                                            <a href="{{ route('admin.edit-alumni.experiences', ['id' => $userDetails->id_userDetails]) }}"
                                                class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                                <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                </svg>
                                            </a>

                                        </div>
                                        <div class="-mt-8 mb-4 flex justify-start text-center sm:-mt-10 sm:text-start">
                                            <h4 class="text-lg text-cyan sm:text-xl">Experience</h4>
                                        </div>
                                    </div>
                                    <ol class="relative border-s border-gray-900">
                                        @foreach ($jobDetails as $job)
                                            <li class="mb-10 ms-4">
                                                <div
                                                    class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900">
                                                </div>
                                                <h3 class="text-lg text-cyan sm:text-xl">{{ $job->job_name }}</h3>
                                                <h3 class="text-md text-cyan sm:text-lg">{{ $job->company_name }}</h3>
                                                <p class="text-xs text-gray-400 sm:text-sm">{{ $job->date_start }} -
                                                    {{ $job->date_end }}</p>
                                                <ol class="ms-2 list-outside list-disc">
                                                    @if (is_array($job->job_description))
                                                        @foreach ($job->job_description as $description)
                                                            <li>{{ $description }}</li>
                                                        @endforeach
                                                    @endif
                                                </ol>
                                            </li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

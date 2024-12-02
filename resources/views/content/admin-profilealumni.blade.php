@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-16 sm:ms-60">
            <div
                class="mx-4 mt-14 flex max-w-screen-xl flex-col items-start justify-center px-2 py-8 sm:mx-auto sm:ms-4 sm:flex-row sm:px-4">
                <!-- Back Button -->
                <button class="mb-4" onclick="history.back()">
                    <svg class="h-8 w-8 text-gray-800 sm:h-16 sm:w-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14 8-4 4 4 4" />
                    </svg>
                </button>

                <div class="space-y-14">
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
                                                <div
                                                    class="scrollbar-modal relative max-h-96 overflow-y-auto rounded-lg bg-white pb-5 shadow">
                                                    <!-- Modal header -->
                                                    <div class="relative">
                                                        <!-- Back Button -->
                                                        <div class="flex h-24 items-start justify-end bg-cyan-100">
                                                            <button data-modal-hide="crud-modal1" class="z-10 p-2">
                                                                <svg class="h-6 w-6 text-white dark:text-white"
                                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                                    width="24" height="24" fill="none"
                                                                    viewBox="0 0 24 24">
                                                                    <path stroke="currentColor" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="2"
                                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="absolute top-1/2 mx-12">
                                                            <div class="relative">
                                                                <img class="h-24 w-24 rounded-full object-cover"
                                                                    src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                                                    alt="Profile Picture" />
                                                                {{-- Camera Icon --}}
                                                                <label for="profile_picture"
                                                                    class="absolute bottom-0 ms-24 flex h-10 w-10 items-center justify-center rounded-full bg-cyan p-1 hover:bg-cyan-100 sm:h-16 sm:w-16">
                                                                    <svg class="h-8 w-8 text-white" aria-hidden="true"
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" fill="none" viewBox="0 0 24 24">
                                                                        <path stroke="currentColor" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M4 18V8a1 1 0 0 1 1-1h1.5l1.707-1.707A1 1 0 0 1 8.914 5h6.172a1 1 0 0 1 .707.293L17.5 7H19a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1Z" />
                                                                        <path stroke="currentColor" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                    </svg>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <form action="{{ route('admin.edit-alumni', ['id' => $userDetails->id_userDetails]) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <!-- Hidden Input -->
                                                        <input id="profile_picture" name="profile_picture" type="file"
                                                            class="hidden" accept="image/*" />
                                                        <div class="mx-10 my-14">
                                                            <div class="mb-5 mt-5">
                                                                <label for="full_name"
                                                                    class="mb-2 block text-xl text-cyan">Full
                                                                    Name</label>
                                                                <input type="text" id="full_name" name="full_name"
                                                                    class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                                                                    required
                                                                    value="{{ $userDetails->name }}" />
                                                            </div>
                                                            <div class="mb-5 mt-5">
                                                                <label for="current_company"
                                                                    class="mb-2 block text-xl text-cyan">Current
                                                                    Company</label>
                                                                <select name="current_company" id="current_company"
                                                                    class="block w-full cursor-pointer rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900">
                                                                    <option value="" disabled
                                                                        {{ $userDetails->current_job ? '' : 'selected' }}>
                                                                        Select a company</option>
                                                                    @foreach ($companies as $company)
                                                                        <option value="{{ $company->company_name }}"
                                                                            {{ $company->company_name == $userDetails->current_company ? 'selected' : '' }}>
                                                                            {{ $company->company_name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="mb-5 mt-5">
                                                                <label for="current_job"
                                                                    class="mb-2 block text-xl text-cyan">Current
                                                                    Position</label>
                                                                <input type="text" id="current_job" name="current_job"
                                                                    class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                                                                    required
                                                                    value="{{ $userDetails->current_job }}" />
                                                            </div>
                                                            <div class="mb-5 mt-5">
                                                                <label for="user_description"
                                                                    class="mb-2 block text-xl text-cyan">About</label>
                                                                <textarea type="text" id="user_description" name="user_description"
                                                                    class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 pt-2 text-sm text-gray-900">{{ $userDetails->user_description }}</textarea>
                                                            </div>
                                                        </div>
                                                        <button data-modal-hide="crud-modal" type="submit"
                                                        class="bg-btn-cyan mx-10 rounded-full bg-cyan px-5 py-2.5 text-white shadow-lg hover:bg-white hover:text-cyan">
                                                        Save Changes
                                                        </button>
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
                                            <a href="{{ route('admin.edit-alumni.experiences',['id'=>$userDetails->id_userDetails]) }}"
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

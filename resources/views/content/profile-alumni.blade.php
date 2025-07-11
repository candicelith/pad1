@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">

        @if ($latestNotification && !$latestNotification->is_read)
            @php
                // Determine classes based on notification type
                $notificationClasses = match ($latestNotification->type) {
                    'approved'
                        => 'mx-auto mb-4 w-3/4 transform rounded-lg p-4 text-center text-sm opacity-100 transition-opacity duration-500 sm:w-1/2 bg-lightgreen text-green-800',
                    'rejected'
                        => 'mx-auto mb-4 w-3/4 transform rounded-lg p-4 text-center text-sm opacity-100 transition-opacity duration-500 sm:w-1/2 bg-red-300 text-red-800',
                    'pending'
                        => 'mx-auto mb-4 w-3/4 transform rounded-lg p-4 text-center text-sm opacity-100 transition-opacity duration-500 sm:w-1/2 bg-yellow-100 text-yellow-800',
                    default
                        => 'mx-auto mb-4 w-3/4 transform rounded-lg bg-lightblue-100 p-4 text-center text-sm text-cyan opacity-100 transition-opacity duration-500 sm:w-1/2',
                };
            @endphp

            <div id="notification-bar"
                class="{{ $notificationClasses }} mx-auto mb-4 w-3/4 transform rounded-lg p-4 text-center text-sm opacity-100 transition-opacity duration-500 sm:w-1/2"
                role="alert">
                <div class="alert">
                    {{ $latestNotification->message }}
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var notificationBar = document.getElementById('notification-bar');
                    if (notificationBar) {
                        // Fade out after 3 seconds
                        setTimeout(function() {
                            notificationBar.style.opacity = '0';
                            setTimeout(function() {
                                notificationBar.style.display = 'none';
                            }, 500); // Complete hide after transition
                        }, 3000);
                    }
                });
            </script>

            {{-- Mark only "approved" and "rejected" notifications as read --}}
            @if (in_array($latestNotification->type, ['approved', 'rejected']))
                @php
                    $latestNotification->update(['is_read' => true]);
                @endphp
            @endif
        @endif

        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            {{-- Profile Start --}}
            <div class="w-full max-w-none rounded-3xl border border-gray-400 bg-lightblue shadow-md">
                {{-- Profile Image & Banner --}}
                <div class="relative">
                    <div class="h-48 rounded-t-3xl bg-cyan-100"></div>
                    <div class="absolute top-1/2 mx-12 sm:ms-14">
                        <img class="h-48 w-48 rounded-full object-cover"
                            src="{{ asset('storage/profile/' . $userDetails->profile_photo) }}" alt="Profile Picture" />
                    </div>
                </div>

                {{-- Profile Details --}}
                <div class="mx-10 mb-5 flex flex-col space-y-2 sm:mx-14">
                    <div class="flex flex-col pt-24 sm:flex-row-reverse sm:pt-36">
                        <div class="mb-2 flex justify-end sm:mb-0">

                            {{-- Edit Button --}}
                            <button data-modal-target="crud-modal1" data-modal-toggle="crud-modal1"
                                data-tooltip-target="tooltip-edit"
                                class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                </svg>
                            </button>

                            <!-- Modal Edit Profile -->
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
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="3"
                                                        d="M6 18 17.94 6M18 18 6.06 6" />
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- Modal body -->
                                        <form class="scrollbar-modal max-h-96 space-y-8 overflow-y-auto p-4 md:p-5"
                                            action="{{ route('alumni.update', ['id' => $userDetails->id_userDetails]) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="relative h-24 w-24 sm:h-32 sm:w-32">
                                                <div
                                                    class="h-full w-full overflow-hidden rounded-full border-4 border-cyan bg-gray-100">
                                                    <img id="preview-image" class="h-full w-full object-cover"
                                                        src="{{ $userDetails->profile_photo ? asset('storage/profile/' . $userDetails->profile_photo) : asset('assets/placeholder.png') }}"
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
                                                            stroke-linejoin="round" stroke-width="2" d="M9 5h6l-1 4" />
                                                    </svg>
                                                </label>
                                            </div>
                                            <!-- Hidden Input -->
                                            <input id="profile_picture" name="profile_picture" type="file"
                                                accept="image/*" class="hidden"
                                                onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])">
                                            <div>
                                                <label for="full_name" class="mb-1 block text-2xl text-cyan">Full
                                                    Name <span
                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                <input type="text" id="full_name" name="full_name"
                                                    class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                    required value="{{ $userDetails->name }}"
                                                    placeholder="Enter your full name (e.g., Budi Santoso)" />
                                            </div>
                                            <div>
                                                <label for="current_company" class="mb-1 block text-2xl text-cyan">Current
                                                    Company</label>
                                                <select name="current_company" id="current_company"
                                                    class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">
                                                    <option value="" disabled
                                                        {{ $userDetails->current_company ? '' : 'selected' }}>
                                                        Select a company name
                                                    </option>
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
                                                <label for="current_job" class="mb-1 block text-2xl text-cyan">
                                                    Current Position
                                                </label>
                                                <select id="current_job" name="current_job"
                                                    class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                    >
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
                                                <label for="user_description" class="mb-1 block text-2xl text-cyan">About
                                                </label>
                                                <textarea type="text" id="user_description" name="user_description"
                                                    class="w-full rounded-md border border-gray-300 bg-gray-200 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                    placeholder="Tell us about yourself and your professional journey...">{{ $userDetails->user_description }}</textarea>
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

                            {{-- Tooltip --}}
                            <div id="tooltip-edit" role="tooltip"
                                class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-cyan px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                                Edit Profile
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                        </div>
                        <div class="text-center sm:-mt-8 sm:text-start">
                            <h2 class="text-xl text-cyan sm:text-start sm:text-2xl">{{ $userDetails->name }}</h2>
                            <p class="text-lg text-gray-400 sm:text-left sm:text-xl">{{ $userDetails->nim }}</p>
                            <h3 class="text-base text-cyan sm:text-start sm:text-lg">{{ $userDetails->job_name }}</h3>
                            <p class="text-base text-cyan sm:text-start sm:text-lg">{{ $userDetails->company_name }}</p>
                        </div>
                    </div>
                    @if (!empty($userDetails->user_description))
                        <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                        <p class="text-justify text-sm text-cyan sm:text-base">
                            {{ $userDetails->user_description }}
                        </p>
                    @endif
                    <div class="flex justify-end">
                        {{-- Logout Button --}}
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            data-tooltip-target="tooltip-logout"
                            class="mt-4 rounded-full bg-red-600 p-2 text-white shadow-lg hover:bg-red-400 sm:p-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h5a3 3 0 0 1 3 3v1" />
                            </svg>
                        </button>

                        {{-- Tooltip --}}
                        <div id="tooltip-logout" role="tooltip"
                            class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-red-600 px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                            Log Out
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>

                        {{-- Modal --}}
                        <div id="popup-modal" tabindex="-1"
                            class="fixed left-0 right-0 top-0 z-50 hidden h-full max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                            <div class="relative max-h-full w-full max-w-md p-4">
                                <div class="relative rounded-lg bg-cyan-400 shadow">
                                    <div class="p-4 text-center md:p-5">
                                        <h3 class="mb-5 text-lg font-normal text-cyan">Are you leaving?</h3>
                                        <p class="mb-5 text-sm font-normal text-cyan">Are you sure you want to Log Out?
                                        </p>
                                        <button data-modal-hide="popup-modal" type="button"
                                            class="bg-btn-cyan ms-3 rounded-full border border-gray-900 px-5 py-2.5 text-sm font-medium text-white hover:bg-white hover:text-cyan focus:z-10 focus:outline-none focus:ring-4 focus:ring-cyan">
                                            Cancel
                                        </button>
                                        <button data-modal-hide="popup-modal" type="button" id="logout-button"
                                            class="ms-3 rounded-full border border-gray-900 bg-white px-5 py-2.5 text-sm font-medium text-cyan hover:bg-cyan hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-cyan">
                                            Log Out
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Profile End --}}

            {{-- Experience Start --}}
            <div class="mt-8 w-full max-w-none rounded-3xl border border-gray-400 bg-lightblue shadow-md">
                <div class="mx-10 flex flex-col space-y-2 py-5 sm:mx-14 sm:py-10">
                    <div class="flex flex-col sm:flex-row-reverse">
                        <div class="mb-2 flex justify-end sm:mb-0">

                            {{-- Edit Button --}}
                            <a href="{{ route('alumni.show-profile') }}" data-tooltip-target="tooltip-edit-experience"
                                class="z-10 rounded-full bg-gray-300 p-2 hover:bg-gray-400 sm:p-4">
                                <svg class="h-6 w-6 text-gray-800 dark:text-white" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                    viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                </svg>
                            </a>

                            {{-- Tooltip --}}
                            <div id="tooltip-edit-experience" role="tooltip"
                                class="shadow-xs tooltip invisible absolute z-10 inline-block rounded-lg bg-cyan px-3 py-2 text-sm font-medium text-white opacity-0 transition-opacity duration-300 dark:bg-gray-700">
                                Edit Experience
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>

                        </div>
                        <div class="-mt-8 mb-4 flex justify-start text-center sm:-mt-10 sm:text-start">
                            <h4 class="text-lg text-cyan sm:text-xl">Experience</h4>
                        </div>
                    </div>
                    @if ($jobDetails && count($jobDetails) > 0)
                        <ol class="relative border-s border-gray-900">
                            @foreach ($jobDetails as $job)
                                <li class="mb-10 ms-4">
                                    <div
                                        class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900">
                                    </div>
                                    <h3 class="text-lg text-cyan sm:text-xl">{{ $job->job_name }}</h3>
                                    <h3 class="text-base text-cyan sm:text-lg">{{ $job->company_name }}</h3>
                                    <p class="text-xs text-gray-400 sm:text-sm">{{ $job->date_start }} -
                                        {{ $job->date_end }}</p>
                                    <ol class="ms-4 list-outside list-disc text-sm text-cyan sm:text-base">
                                        @if (is_array($job->job_description))
                                            @foreach ($job->job_description as $description)
                                                <li>{{ $description }}</li>
                                            @endforeach
                                        @endif
                                    </ol>
                                </li>
                            @endforeach
                        </ol>
                    @endif
                </div>
            </div>
            {{-- Experience End --}}

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                @csrf
            </form>

            <script>
                document.getElementById('logout-button').addEventListener('click', function() {
                    document.getElementById('logout-form').submit();
                });
            </script>
        </div>
    </section>

    <script>
        function markNotificationAsRead() {
            fetch('{{ route('notifications.markAsRead') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('notification-bar').style.display = 'none';
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endsection

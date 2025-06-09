@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:flex sm:items-start lg:px-6 lg:py-16">
            <!-- Back Button -->
            <button class="sm:mb-4 sm:me-16" onclick="history.back()">
                <svg class="h-8 w-8 text-gray-800 sm:h-16 sm:w-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m14 8-4 4 4 4" />
                </svg>
            </button>

            <!-- Content Section -->
            <div class="w-full rounded-3xl bg-lightblue shadow-lg">
                {{-- Alumni Details --}}
                <div class="p-6 sm:p-8 lg:p-10">
                    <div id="detail-container" class="lg:mx-14">
                        {{-- <div class="flex flex-col lg:flex-row lg:space-x-8">
                            <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28"
                                src="{{ asset('storage/profile/' . $userDetails->profile_photo) }}" alt="" />
                            <div class="mt-4">
                                <h2 class="text-xl text-cyan sm:text-2xl">{{ $userDetails->name }}</h2>
                                <h3 class="text-md text-cyan sm:text-lg">
                                    {{ $userDetails->current_job }},
                                    {{ $userDetails->current_company }}
                                </h3>
                            </div>
                        </div>

                        <div class="mt-8 space-y-4">
                            <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                            <p class="sm:text-md text-sm text-cyan sm:text-justify">
                                {{ $userDetails->user_description }}
                            </p>
                        </div>

                        <div class="flex flex-col space-y-4 pt-5">
                            <h4 class="text-lg text-cyan sm:text-xl">Experience</h4>
                            <ol class="relative ms-4 border-s border-gray-900">
                                @foreach ($jobDetails as $job)
                                    <li class="mb-10 ms-4">
                                        <div
                                            class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900">
                                        </div> --}}

                        {{-- Job Drawer Toggle --}}
                        {{-- <button onclick="toggleDrawer('job-drawer-{{ $job->id_tracking }}')"
                                            class="text-start text-lg text-cyan hover:underline sm:text-xl lg:text-center">
                                            {{ $job->job_name }}
                                        </button> --}}

                        {{-- Drawer Content --}}
                        {{-- <div id="job-drawer-{{ $job->id_tracking }}"
                                            class="fixed right-0 top-28 z-20 translate-x-full rounded-lg bg-cyan-400 p-4 transition-transform duration-300 lg:w-2/5"
                                            tabindex="-1" aria-labelledby="drawer-right-label">
                                            <div
                                                class="flex items-center justify-between rounded-t border-b border-white md:py-4">
                                                <h3 class="text-2xl text-cyan">
                                                    {{ $job->job_name }}
                                                </h3>
                                                <button type="button"
                                                    class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white"
                                                    onclick="closeDrawer('job-drawer-{{ $job->id_tracking }}')">
                                                    <svg class="h-6 w-6" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close</span>
                                                </button>
                                            </div>
                                            <div class="scrollbar-modal max-h-96 space-y-4 overflow-y-auto">
                                                <h4 class="mt-4 text-lg text-white">Alumni with the same experience:</h4>

                                                @if (isset($jobsWithAlumni[$job->id_tracking]) && count($jobsWithAlumni[$job->id_tracking]) > 0)
                                                    <div
                                                        class="grid justify-items-center gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:gap-2">
                                                        @foreach ($jobsWithAlumni[$job->id_tracking] as $alumni)
                                                            <a class="alumni-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md transition-shadow duration-300 hover:shadow-lg"
                                                                href="{{ route('alumni.detail', $alumni->id_userDetails) }}">
                                                                <div>
                                                                    <div class="flex flex-col items-center p-4 text-center">
                                                                        <div
                                                                            class="mb-3 flex w-full justify-end px-2 text-gray-400">
                                                                            <span class="text-sm">
                                                                                {{ $alumni->entry_year }}
                                                                            </span>
                                                                        </div>
                                                                        <img class="mb-3 h-20 w-20 rounded-full object-cover shadow-lg"
                                                                            src="{{ asset('storage/profile/' . $alumni->profile_photo) }}"
                                                                            alt="{{ $alumni->name }}" />
                                                                        <h2 class="mb-1 text-xl text-cyan">
                                                                            {{ $alumni->name }}
                                                                        </h2>
                                                                        <h3 class="text-sm text-cyan">
                                                                            {{ $alumni->current_job }}
                                                                        </h3>
                                                                        <h4 class="text-xs text-gray-500">
                                                                            {{ $alumni->current_company }}
                                                                        </h4>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                @else
                                                    <div class="py-6 text-center">
                                                        <p class="text-white">No other alumni found with this job
                                                            experience.</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <h3 class="text-base text-cyan sm:text-lg">{{ $job->company_name }}</h3>
                                        <p class="text-xs text-gray-400 sm:text-sm">{{ $job->date_start }} -
                                            {{ $job->date_end }}</p>
                                        <ol class="ms-4 list-outside list-disc text-sm sm:text-base">
                                            @if (is_array($job->job_description))
                                                @foreach ($job->job_description as $description)
                                                    <li>{{ $description }}</li>
                                                @endforeach
                                            @endif
                                        </ol>
                                    </li>
                                @endforeach
                            </ol>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Alumni Detail API --}}
    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            const alumniId = window.location.pathname.split('/').pop();

            try {
                const response = await axios.get(`http://127.0.0.1:8000/api/users/${alumniId}/experiences`, {
                    withCredentials: true
                });

                const data = response.data.data;
                const user = data.user_details;
                const jobs = data.job_details;

                const container = document.getElementById('detail-container');

                let jobHTML = jobs.map(job => {
                    const descriptions = Array.isArray(job.job_description) ?
                        job.job_description.map(desc => `<li>${desc}</li>`).join('') : '';
                    const alumniList = Array.isArray(job.other_alumni) && job.other_alumni.length > 0 ?
                        `
                    <div class="grid justify-items-center gap-4 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 lg:gap-2">
                        ${job.other_alumni.map(alumni =>
                        `
                            <a class="alumni-card w-full max-w-sm cursor-pointer rounded-lg border border-gray-200 bg-lightblue shadow-md transition-shadow duration-300 hover:shadow-lg"
                            href="/alumni/${alumni.id_userDetails}">
                                <div>
                                    <div class="flex flex-col items-center p-4 text-center">
                                        <div class="mb-3 flex w-full justify-end px-2 text-gray-400">
                                            <span class="text-sm">${alumni.entry_year}</span>
                                        </div>
                                        <img class="mb-3 h-20 w-20 rounded-full object-cover shadow-lg"
                                            src="/storage/profile/${alumni.profile_photo}"
                                            alt="${alumni.name}" />
                                        <h2 class="mb-1 text-xl text-cyan">${alumni.name}</h2>
                                        <h3 class="text-sm text-cyan">${alumni.current_job}</h3>
                                        <h4 class="text-xs text-gray-500">${alumni.current_company}</h4>
                                    </div>
                                </div>
                            </a>
                        `)
                        .join('')}
                    </div>
                    ` :
                        `
                    <div class="py-6 text-center">
                        <p class="text-white">No other alumni found with this job experience.</p>
                    </div>`;

                    return `
                    <li class="mb-10 ms-4">
                        <div class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900"></div>
                        <button onclick="toggleDrawer('job-drawer-${job.id_tracking}')"
                            class="text-start text-lg text-cyan hover:underline sm:text-xl lg:text-center">
                            ${job.job_name}
                        </button>

                        <div id="job-drawer-${job.id_tracking}"
                            class="fixed right-0 top-28 z-20 translate-x-full rounded-lg bg-cyan-400 p-4 transition-transform duration-300 lg:w-2/5"
                            tabindex="-1" aria-labelledby="drawer-right-label">
                            <div class="flex items-center justify-between rounded-t border-b border-white md:py-4">
                                <h3 class="text-2xl text-cyan">${job.job_name}</h3>
                                <button type="button" class="ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-transparent text-sm text-white"
                                    onclick="closeDrawer('job-drawer-${job.id_tracking}')">
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="scrollbar-modal max-h-96 space-y-4 overflow-y-auto">
                                <h4 class="mt-4 text-lg text-white">Alumni with the same experience:</h4>
                                ${alumniList}
                            </div>
                        </div>

                        <h3 class="text-base text-cyan sm:text-lg">${job.company_name}</h3>
                        <p class="text-xs text-gray-400 sm:text-sm">${job.date_start} - ${job.date_end}</p>
                        <ol class="ms-4 list-outside list-disc text-sm sm:text-base">
                            ${descriptions}
                        </ol>
                    </li>
                `;
                }).join('');

                container.innerHTML = `
                <div class="flex flex-col lg:flex-row lg:space-x-8">
                    <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28"
                        src="/storage/profile/${user.profile_photo}" alt="" />
                    <div class="mt-4">
                        <h2 class="text-xl text-cyan sm:text-2xl">${user.name}</h2>
                        <h3 class="text-md text-cyan sm:text-lg">
                            ${user.current_job}, ${user.current_company}
                        </h3>
                    </div>
                </div>

                <div class="mt-8 space-y-4">
                    <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                    <p class="sm:text-md text-sm text-cyan sm:text-justify">
                        ${user.user_description}
                    </p>
                </div>

                <div class="flex flex-col space-y-4 pt-5">
                    <h4 class="text-lg text-cyan sm:text-xl">Experience</h4>
                    <ol class="relative ms-4 border-s border-gray-900">
                        ${jobHTML}
                    </ol>
                </div>
            `;
            } catch (err) {
                console.error('Failed to fetch data:', err);
            }
        });
    </script>

    {{-- Alumni Drawer --}}
    <script>
        let currentOpenDrawer = null;

        function toggleDrawer(drawerId) {
            const drawer = document.getElementById(drawerId);

            // If clicking the same drawer that's already open, close it
            if (currentOpenDrawer === drawerId) {
                closeDrawer(drawerId);
                return;
            }

            // Close any currently open drawer
            if (currentOpenDrawer) {
                closeDrawer(currentOpenDrawer);
            }

            // Open the new drawer
            drawer.classList.remove('translate-x-full');
            drawer.classList.add('translate-x-0');
            currentOpenDrawer = drawerId;
        }

        function closeDrawer(drawerId) {
            const drawer = document.getElementById(drawerId);
            drawer.classList.remove('translate-x-0');
            drawer.classList.add('translate-x-full');
            currentOpenDrawer = null;
        }

        // Close drawer when clicking outside
        document.addEventListener('click', function(event) {
            if (currentOpenDrawer && !event.target.closest(`#${currentOpenDrawer}`) &&
                !event.target.hasAttribute('onclick') && !event.target.closest('[onclick]')) {
                closeDrawer(currentOpenDrawer);
            }
        });
    </script>
@endsection

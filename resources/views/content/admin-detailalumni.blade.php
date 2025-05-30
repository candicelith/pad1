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

                <!-- Content Section -->
                <div class="w-full rounded-3xl bg-lightblue shadow-lg">
                    {{-- Alumni Details --}}
                    <div class="p-6 sm:p-8 lg:p-10">
                        <div class="lg:mx-14">
                            <div class="flex flex-col lg:flex-row lg:space-x-8">
                                <img class="h-24 w-24 rounded-full object-cover sm:h-28 sm:w-28"
                                    src="{{ asset('storage/profile/' . $userDetails->profile_photo) }}" alt="" />
                                <div class="mt-4">
                                    <h2 class="text-xl text-cyan sm:text-2xl">{{ $userDetails->name }}</h2>
                                    <h3 class="text-md text-cyan sm:text-lg">{{ $userDetails->current_job }},
                                        {{ $userDetails->current_company }}</h3>
                                </div>
                            </div>

                            <div class="mt-8 space-y-4">
                                <h4 class="text-lg text-cyan sm:text-xl">About</h4>
                                <p class="sm:text-md text-justify text-sm text-cyan">
                                    {{ $userDetails->user_description }}
                                </p>
                            </div>

                            <div class="flex flex-col space-y-4 pt-5">
                                <h4 class="text-lg text-cyan sm:text-xl">Added Experience : </h4>
                                <ol class="relative ms-4 border-s border-gray-900">
                                    <li class="mb-10 ms-4">
                                        <div
                                            class="absolute -start-1.5 mt-1.5 h-3 w-3 rounded-full border border-gray-900 bg-gray-900">
                                        </div>
                                        <h3 class="text-lg text-cyan sm:text-xl">{{ $pendingRequest->job_name }}</h3>
                                        <h3 class="text-md text-cyan sm:text-lg">
                                            {{ $pendingRequest->company->company_name }}</h3>
                                        <p class="text-xs text-gray-400 sm:text-sm">{{ $pendingRequest->date_start }} -
                                            {{ $pendingRequest->date_end }}</p>
                                        <ol class="ms-2 list-outside list-disc">
                                            @if (is_array($job))
                                                @foreach ($job as $description)
                                                    <li>{{ $description }}</li>
                                                @endforeach
                                            @endif
                                        </ol>
                                    </li>
                                </ol>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <div class="button-group flex items-center space-x-2">
                                {{-- Approve Button --}}
                                <form method="POST" action="{{ route('admin.handleApproval', $pendingRequest->id_request) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="approve">
                                    <button class="rounded-full bg-green-800 px-5 py-1 text-white hover:bg-green-600"
                                        type="submit">
                                        Accept
                                    </button>
                                </form>
                                {{-- Decline Button --}}
                                <form method="POST" action="{{ route('admin.handleApproval', $pendingRequest->id_request) }}">
                                    @csrf
                                    <input type="hidden" name="action" value="reject">
                                    <button class="rounded-full bg-red-900 px-5 py-1 text-white hover:bg-red-700"
                                        type="submit">
                                        Decline
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

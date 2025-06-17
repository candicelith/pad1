@extends('layout.headerFooter')

@section('content')
    <style>
        .custom-scrollbar {
            overflow-y: auto;
            scrollbar-width: none;
            /* Firefox */
            -ms-overflow-style: none;
            /* Internet Explorer 10+ */
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 0px;
            background: transparent;
            /* Chrome/Safari/Webkit */
        }
    </style>

    <section class="mt-20 bg-white sm:mt-28">
        <div class="mx-auto max-w-screen-xl py-8 lg:px-6 lg:py-16">
            <div class="mx-2.5 flex flex-col items-start sm:flex-row lg:mx-0">

                {{-- Back Button --}}
                <button class="mb-2 sm:mb-0" onclick="handleBack()">
                    <svg class="h-8 w-8 text-gray-800 sm:h-16 sm:w-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14 8-4 4 4 4" />
                    </svg>
                </button>
                {{-- Script for Handling Back Button --}}
                <script>
                    function handleBack() {
                        // Check if there is a previous page in history
                        if (document.referrer) {
                            window.history.back();
                        } else {
                            // Redirect to the specified route if no previous page
                            window.location.href = "{{ route('posts') }}";
                        }
                    }
                </script>

                {{-- Content Section --}}
                <div class="mx-auto flex min-h-screen min-w-full flex-col sm:me-0 lg:flex-row">

                    {{-- Post Details --}}
                    <div
                        class="w-full rounded-tl-lg rounded-tr-lg border-b-2 border-cyan bg-lightblue p-2 sm:rounded-e-none sm:rounded-s-lg sm:rounded-tr-none sm:border-b-0 sm:border-e-2 sm:px-5 md:rounded-e-none md:rounded-s-lg md:rounded-tr-none md:border-b-0 md:border-e-2 lg:px-4 lg:py-4">
                        <div id="vacancy-container"></div>
                        {{-- <div class="flex flex-col lg:flex-row lg:space-x-8"> --}}
                        {{-- <div class="flex-shrink-0">
                                <img class="h-28 w-28 rounded-full object-cover"
                                    src="{{ asset('storage/profile/' . $vacancy->profile_photo) }}" alt="" />
                            </div>
                            <div class="mt-4 lg:mt-0"> --}}
                        {{-- Position --}}
                        {{-- <h2 class="mb-2 text-xl tracking-tight text-cyan sm:text-2xl">{{ $vacancy->position }}</h2> --}}
                        {{-- Company Name --}}
                        {{-- <h2 class="mb-2 text-lg tracking-tight text-cyan sm:text-xl">{{ $vacancy->company_name }}
                                </h2> --}}
                        {{-- Posted By "Name" --}}
                        {{-- <p class="text-base text-gray-400 sm:text-lg">Posted by {{ $vacancy->name }}</p>
                                <div class="flex"> --}}
                        {{-- Start Date --}}
                        {{-- <p class="pe-5 text-xs text-gray-400 sm:text-sm">
                                        Start Date: {{ \Carbon\Carbon::parse($vacancy->date_open)->format('d M Y') }}
                                    </p> --}}
                        {{-- End Date --}}
                        {{-- <p class="text-xs text-gray-400 sm:text-sm">
                                        End Date: {{ \Carbon\Carbon::parse($vacancy->date_closed)->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 space-y-6 sm:mt-8">
                            <p class="text-justify text-sm text-cyan">
                                {{ $vacancy->vacancy_description }}
                            </p>
                            <div class="ms-2 space-y-3">
                                <div class="text-cyan">
                                    <h3 class="-ms-2 text-sm sm:text-base">Responsibilities</h3>
                                    <ul class="ms-2 list-outside list-disc text-sm">
                                        @foreach ($vacancy->vacancy_responsibilities as $vr)
                                            <li>{{ $vr }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="text-cyan">
                                    <h3 class="-ms-2 text-sm sm:text-base">Qualifications</h3>
                                    <ul class="ms-2 list-outside list-disc text-sm">
                                        @foreach ($vacancy->vacancy_qualification as $vq)
                                            <li>{{ $vq }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="text-cyan">
                                    <h3 class="-ms-2 text-sm sm:text-base">Benefits</h3>
                                    <ul class="ms-2 list-outside list-disc text-sm">
                                        @foreach ($vacancy->vacancy_benefits as $vb)
                                            <li>{{ $vb }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('storage/vacancies/' . $vacancy->vacancy_picture) }}"
                                    alt="vacancy_image" />
                            </div>
                        </div> --}}

                        @if (Auth::check() && !$registrations->contains('user_id', Auth::user()->id_users))
                            <div class="mt-10">
                                <!-- Modal toggle -->
                                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                                    class="bg-btn-cyan block rounded-lg px-7 py-2 text-center text-sm font-medium text-white hover:bg-cyan-100"
                                    type="button">
                                    Apply
                                </button>

                                {{-- Main modal --}}
                                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                                    class="fixed left-0 right-0 top-0 z-50 hidden h-1/2 max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                    <div class="relative max-h-full w-full max-w-screen-sm p-2 sm:max-w-3xl sm:p-4">
                                        <!-- Modal content -->
                                        <div
                                            class="relative rounded-lg border-4 border-cyan-100 bg-white p-1 shadow sm:p-2">
                                            {{-- Modal header --}}
                                            <div
                                                class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 px-3 py-4 text-center sm:px-5 sm:py-6">
                                                <h3 class="text-start text-xl text-cyan sm:text-2xl">
                                                    Apply to {{ $vacancy->company_name }}
                                                </h3>
                                                <button type="button" class="inline-flex items-center"
                                                    data-modal-toggle="crud-modal">
                                                    <svg class="h-6 w-6 text-cyan" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="3"
                                                            d="M6 18 17.94 6M18 18 6.06 6" />
                                                    </svg>
                                                </button>
                                            </div>

                                            {{-- Modal body --}}
                                            <form class="max-h-96 overflow-y-auto px-3 pb-3 pt-5 sm:px-9 sm:pb-5 sm:pt-7"
                                                action="{{ route('posts.detail.apply', ['vacancy' => $vacancy->id_vacancy, 'id' => $vacancy->id_vacancy]) }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-9 space-y-3">
                                                    <h2 class="text-2xl text-cyan">Resume</h2>
                                                    <p class="text-sm text-gray-400">Be sure to include your updated resume
                                                    </p>
                                                    <div class="col-span-2 sm:col-span-1">
                                                        <input type="file" name="cv" id="cv"
                                                            class="w-full rounded-full border-2 shadow-sm" required="">
                                                    </div>
                                                </div>
                                                <div class="items-end justify-between text-sm text-gray-400 sm:flex">
                                                    <p class="mb-2 text-sm sm:mb-0">Only you and {{ $vacancy->name }} can
                                                        view
                                                        this</p>
                                                    <button type="submit"
                                                        class="bg-btn-cyan rounded-lg px-7 py-2 text-center text-sm text-white hover:bg-cyan-100">
                                                        Submit
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::check() &&
                                (Auth::user()->id_users == $vacancy->id_users || $registrations->contains('user_id', Auth::user()->id_users)))
                            <div class="mt-12 space-y-2">
                                <p>Submission Inbox</p>
                                <div class="rounded-lg border-4 border-cyan-100 bg-white p-4">
                                    <table id="default-table" class="w-full">
                                        <thead class="bg-lightblue text-left">
                                            <tr>
                                                <th class="px-1 text-center text-sm">No</th>
                                                <th class="px-1 text-sm">Name</th>
                                                <th class="px-1 text-center text-sm">File Submitted</th>
                                                <th class="px-1 text-center text-sm">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-left">
                                            @foreach ($registrations as $index => $registration)
                                                <tr>
                                                    <td class="px-1 text-center">{{ $index + 1 }}</td>
                                                    <td
                                                        class="sm:truncate-0 max-w-16 truncate px-1 text-sm sm:max-w-32 sm:whitespace-normal">
                                                        {{ $registration->user->email }}
                                                    </td>
                                                    <td class="px-1 text-center">
                                                        <a id=""
                                                            href="{{ asset('storage/cvs/' . $registration->cv) }}"
                                                            target="_blank" aria-label="Download file"
                                                            class="download-cv flex items-center justify-center">
                                                            <svg class="h-6 w-6 text-gray-800 dark:text-white"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M12 13V4M7 14H5a1 1 0 00-1 1v4a1 1 0 001 1h14a1 1 0 001-1v-4a1 1 0 00-1-1h-2m-1-5l-4 5-4-5m9 8h.01" />
                                                            </svg>
                                                        </a>
                                                    </td>
                                                    <td class="px-1 text-center">
                                                        <form
                                                            action="{{ route('posts.detail.delete-apply', $registration->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Are you sure you want to delete this?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="m-0 inline border-0 bg-transparent p-0 text-center"
                                                                aria-label="Delete file">
                                                                <svg class="h-6 w-6 text-gray-800 dark:text-white"
                                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                                    viewBox="0 0 24 24">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8.586 2.586A2 2 0 0110 2h4a2 2 0 012 2v2h3a1 1 0 110 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V8a1 1 0 010-2h3V4a2 2 0 01.586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 10-2 0v8a1 1 0 102 0v-8Zm4 0a1 1 0 10-2 0v8a1 1 0 102 0v-8Z"
                                                                        clip-rule="evenodd" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="toast-success"
                                class="fixed bottom-5 left-5 mb-4 flex hidden w-full max-w-xs items-center rounded-lg bg-white p-4 text-gray-500 shadow-sm dark:bg-gray-800 dark:text-gray-400"
                                role="alert">
                                <div
                                    class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-green-600 text-green-200">
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div>
                                    <div class="ms-3 text-base font-bold text-black">Success
                                    </div>
                                    <div class="ms-3 text-sm font-normal">CV downloaded
                                        successfully</div>
                                </div>
                                <button type="button"
                                    class="-mx-1.5 -my-1.5 ms-auto inline-flex h-8 w-8 items-center justify-center rounded-lg bg-white p-1.5 text-gray-400 hover:bg-gray-100 hover:text-gray-900 focus:ring-2 focus:ring-gray-300 dark:bg-gray-800 dark:text-gray-500 dark:hover:bg-gray-700 dark:hover:text-white"
                                    data-dismiss-target="#toast-success" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <svg class="h-3 w-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                </button>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    // Tambahkan event listener untuk semua link download CV
                                    document.querySelectorAll('.download-cv').forEach(link => {
                                        link.addEventListener('click', function(e) {
                                            // Tampilkan toast
                                            const toast = document.getElementById('toast-success');
                                            toast.classList.remove('hidden');

                                            // Sembunyikan toast setelah 5 detik
                                            setTimeout(() => {
                                                toast.classList.add('hidden');
                                            }, 5000);
                                        });
                                    });

                                    // Event untuk tombol close toast
                                    document.querySelector('[data-dismiss-target="#toast-success"]')
                                        .addEventListener('click', function() {
                                            const toast = document.getElementById('toast-success');
                                            toast.classList.add('hidden');
                                        });
                                });
                            </script>
                        @endif
                    </div>

                    {{-- Comment Section --}}
                    <div
                        class="flex w-full flex-col rounded-bl-lg rounded-br-lg border-t-2 border-cyan bg-lightblue px-5 py-10 sm:rounded-e-lg sm:rounded-bl-none sm:border-s-2 sm:border-t-0 lg:mt-0 lg:w-1">
                        <div class="mx-2 flex-grow sm:my-10 sm:mt-10 lg:my-2">
                            <div
                                class="scrollbar-detailposts custom-scrollbar max-h-screen space-y-6 overflow-y-auto border-b-4">
                                {{-- @if ($comments->isEmpty())
                                    <div class="flex h-full flex-col items-center justify-center space-y-8 text-center">
                                        <img src="{{ asset('assets/Thinking Bubble.svg') }}" alt="">
                                        <p class="text-cyan">No comments yet.<br>
                                            Be the first to share your thoughts!</p>
                                    </div>
                                @else --}}
                                {{-- Comment Start --}}
                                <div id="comments-container"></div>
                                {{-- @foreach ($comments as $comment)
                                        <div id="comment-{{ $comment->id_comment }}" class="comment-item relative mb-6">
                                            <div class="flex items-start space-x-2 sm:space-x-4">
                                                <img src="{{ asset('storage/profile/' . ($comment->user->userDetails->profile_photo ?? 'default_profile.png')) }}"
                                                    alt="avatar" class="h-14 w-14 rounded-full object-cover">
                                                <div class="relative w-full max-w-md">
                                                    <div class="flex items-start justify-between">
                                                        <h2 class="text-sm font-medium hover:underline sm:text-base">
                                                            <a
                                                                href="{{ route('alumni.detail', ['id' => optional($comment->user)->userDetails->id_userDetails ?? null]) }}">
                                                                {{ optional($comment->user)->userDetails->name ?? 'Unknown User' }}
                                                            </a>
                                                    </div>

                                                    <span class="mt-1 block text-xs text-cyan">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </span>

                                                    <div class="comment-content">
                                                        <p
                                                            class="relative mt-2 overflow-hidden whitespace-normal break-words break-all rounded-b-full rounded-e-full rounded-tl-none bg-white px-8 py-3 text-sm shadow">
                                                            {!! nl2br(e($comment->text_comment)) !!}
                                                        </p>
                                                    </div>

                                                    @if (Auth::check()) --}}
                                {{-- Reply button --}}
                                {{-- <div class="mt-2 flex items-center space-x-4">
                                                            <span
                                                                class="reply-toggle text-cyan-600 cursor-pointer text-xs hover:underline"
                                                                data-comment-id="{{ $comment->id_comment }}"
                                                                data-comment-text="{{ $comment->text_comment }}">
                                                                Reply
                                                            </span>

                                                            @if ($comment->replies && $comment->replies->count() > 0)
                                                                <span
                                                                    class="show-all-replies text-cyan-600 cursor-pointer text-xs hover:underline"
                                                                    data-comment-id="{{ $comment->id_comment }}">
                                                                    Show all replies ({{ $comment->replies->count() }})
                                                                </span>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div> --}}

                                {{-- Nested Replies --}}
                                {{-- @if ($comment->replies && $comment->replies->count() > 0)
                                                <div class="replies-container relative ml-10 mt-4 space-y-4 sm:ml-16">


                                                    <div class="replies-list hidden"
                                                        id="replies-{{ $comment->id_comment }}">
                                                        @foreach ($comment->replies as $reply)
                                                            <div id="comment-{{ $reply->id_comment }}"
                                                                class="reply-item relative mb-4 pl-4"> --}}
                                {{-- Line to separate replies --}}
                                {{-- <div class="absolute -top-16 bottom-0 left-[-20px]">
                                                                    <img src="{{ asset('assets/line chat.svg') }}"
                                                                        alt="">
                                                                </div>
                                                                <div class="flex items-start space-x-2 sm:space-x-4">
                                                                    <img src="{{ asset('storage/profile/' . ($reply->user->userDetails->profile_photo ?? 'default_profile.png')) }}"
                                                                        alt="avatar"
                                                                        class="h-10 w-10 rounded-full object-cover sm:h-14 sm:w-14">
                                                                    <div class="relative w-full max-w-md">
                                                                        <div class="flex items-start justify-between">
                                                                            <h2 class="text-sm font-medium sm:text-base">
                                                                                <a
                                                                                    href="{{ route('alumni.detail', ['id' => optional($comment->user)->userDetails->id_userDetails ?? null]) }}">{{ $reply->user->userDetails->name }}</a>
                                                                            </h2>
                                                                        </div>

                                                                        <span class="mt-1 block text-xs text-cyan">
                                                                            {{ $reply->created_at->diffForHumans() }}
                                                                        </span>

                                                                        <div class="comment-content">
                                                                            <p
                                                                                class="relative mt-2 whitespace-normal break-words break-all rounded-b-full rounded-e-full rounded-tl-none bg-white px-6 py-2 text-sm shadow sm:px-8 sm:py-3">
                                                                                {!! nl2br(e($reply->text_comment)) !!}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif --}}
                            </div>
                        </div>

                        {{-- Input Section --}}
                        @if (Auth::check())
                            <form
                                action="{{ route('posts.detail.comment', ['vacancy' => $vacancy->id_vacancy, 'id' => $vacancy->id_vacancy]) }}"
                                method="POST" id="main-comment-form" class="relative">
                                @csrf
                                <input type="hidden" name="parent_id" id="parent-comment-id">

                                <div class="mt-auto flex items-center space-x-2 pt-10 sm:pt-0">
                                    <div class="relative flex-grow">
                                        {{-- Reply Context --}}
                                        <div id="reply-context"
                                            class="absolute bottom-full left-0 right-0 mb-1 flex hidden items-center justify-between rounded-t-lg border-green-tertiary bg-white px-4 py-2">
                                            <div class="flex min-w-0 items-center space-x-2">
                                                <span class="whitespace-nowrap text-sm font-semibold">Replying
                                                    to:</span>
                                                <span id="reply-context-text" class="flex-grow truncate text-sm">
                                                    <!-- Reply text will be inserted here -->
                                                </span>
                                            </div>
                                            <button type="button" id="cancel-reply"
                                                class="ml-2 flex-shrink-0 text-white hover:text-gray-200">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <input type="text" name="comment"
                                            class="border-input-comment w-full rounded-lg border-4 border-green-tertiary bg-white px-4 py-2 placeholder-gray-300"
                                            placeholder="..." id="comment-input">

                                    </div>
                                    <button type="submit" id="submit-button"
                                        class="p-1 text-green-900 transition-colors duration-300 disabled:cursor-not-allowed disabled:text-gray-400 disabled:opacity-50 sm:h-11 sm:w-11">
                                        <svg class="h-9 w-9 rotate-90 transition-transform duration-300"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m12 18-7 3 7-18 7 18-7-3Zm0 0v-5" />
                                        </svg>
                                    </button>

                                </div>
                            </form>
                        @endif

                        {{-- Modal Section --}}
                        <div id="defaultModal" tabindex="-1" aria-hidden="true"
                            class="fixed inset-0 z-50 hidden h-full w-full overflow-y-auto bg-black bg-opacity-50 backdrop-blur-sm">
                            <div
                                class="absolute left-1/2 top-1/2 w-full max-w-md -translate-x-1/2 -translate-y-1/2 transform p-4">
                                <div class="relative rounded-lg bg-cyan-400 shadow-lg">
                                    <div class="p-4 text-center md:p-5">
                                        <h3 class="mb-5 text-lg font-normal text-cyan">Log in to view post & comment
                                            details</h3>
                                        <p class="mb-5 text-sm font-normal text-cyan">Would you like to log in?
                                        </p>
                                        <button data-modal-hide="defaultModal" type="button"
                                            onclick="window.location.href='{{ route('login') }}'"
                                            class="ms-3 rounded-full border border-gray-900 bg-white px-11 py-3 text-sm font-medium text-cyan hover:bg-cyan hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-cyan">
                                            Yes
                                        </button>
                                        <button data-modal-hide="defaultModal" type="button"
                                            onclick="window.location.href='{{ route('posts') }}'"
                                            class="ms-3 rounded-full border border-gray-900 bg-white px-11 py-3 text-sm font-medium text-cyan hover:bg-cyan hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-cyan">
                                            No
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (!Auth::check())
        <script>
            // Show modal on page load
            window.addEventListener('load', function() {
                const modal = document.getElementById('defaultModal');
                modal.classList.remove('hidden');
            });

            // Hide modal on button click
            document.querySelectorAll('[data-modal-hide="defaultModal"]').forEach(function(button) {
                button.addEventListener('click', function() {
                    const modal = document.getElementById('defaultModal');
                    modal.classList.add('hidden');
                });
            });

            function toggleReplyForm(commentId) {
                const replyForm = document.getElementById(`reply-form-${commentId}`);
                replyForm.classList.toggle('hidden');
            }
        </script>
    @else
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const commentInput = document.getElementById('comment-input');
            const parentCommentIdInput = document.getElementById('parent-comment-id');
            const replyToggles = document.querySelectorAll('.reply-toggle');
            const replyContext = document.getElementById('reply-context');
            const replyContextText = document.getElementById('reply-context-text');
            const cancelReplyBtn = document.getElementById('cancel-reply');
            const showRepliesButtons = document.querySelectorAll('.show-all-replies');

            // Reply toggle functionality
            replyToggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const commentId = this.dataset.commentId;
                    const commentText = this.dataset.commentText;

                    // Set the parent comment ID
                    parentCommentIdInput.value = commentId;

                    // Show reply context with truncated text
                    replyContextText.textContent = commentText;
                    replyContext.classList.remove('hidden');

                    // Focus on the input
                    commentInput.focus();
                });
            });

            // Cancel reply functionality
            cancelReplyBtn.addEventListener('click', function() {
                // Clear parent comment ID
                parentCommentIdInput.value = '';

                // Hide reply context
                replyContext.classList.add('hidden');

                // Clear input
                commentInput.value = '';
            });

            //  Automatically clear reply context if input is empty
            commentInput.addEventListener('input', function() {
                if (this.value.trim() === '') {
                    parentCommentIdInput.value = '';
                    replyContext.classList.add('hidden');
                }
            });

            // Replies Buttons
            showRepliesButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const commentId = this.dataset.commentId;
                    const repliesList = document.getElementById(`replies-${commentId}`);

                    // Toggle replies visibility
                    repliesList.classList.toggle('hidden');

                    // Update button text based on visibility
                    if (repliesList.classList.contains('hidden')) {
                        this.textContent = `Show all ${repliesList.children.length} replies`;
                    } else {
                        this.textContent = 'Hide replies';
                    }
                });
            });
        });

        // Comment Input Handler
        const input = document.getElementById('comment-input');
        const submitBtn = document.getElementById('submit-button');
        const maxLength = 1000;
        const errorId = 'length-error';

        input.addEventListener('input', () => {
            const currentLength = input.value.length;
            let error = document.getElementById(errorId);

            if (currentLength > maxLength) {
                // Add red border and disable submit
                input.classList.add('border-red-500');
                submitBtn.disabled = true;
                submitBtn.classList.add('text-gray-400', 'opacity-50', 'cursor-not-allowed');
                submitBtn.classList.remove('text-green-900');

                // Show error message
                if (!error) {
                    error = document.createElement('p');
                    error.id = errorId;
                    error.className = 'text-sm text-red-600 mt-1';
                    input.parentElement.appendChild(error);
                }
                error.innerText = `Maximum 1000 characters allowed. You’ve typed ${currentLength}.`;
            } else {
                // Remove error styles and re-enable
                input.classList.remove('border-red-500');
                submitBtn.disabled = false;
                submitBtn.classList.remove('text-gray-400', 'opacity-50', 'cursor-not-allowed');
                submitBtn.classList.add('text-green-900');

                // Remove error text if exists
                if (error) error.remove();
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Detail Post API --}}
    <script>
        // Utility function to format date as "dd MMM yyyy"
        function formatDate(dateString) {
            const date = new Date(dateString);
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
        }

        // Calculate "X days ago" for the start date
        function getDateDifference(dateString) {
            const startDate = new Date(dateString);
            const now = new Date();
            const diffTime = Math.abs(now - startDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            return diffDays === 0 ? 'Today' : `${diffDays} days ago`;
        }

        // Function to fetch vacancy data and render it
        async function renderVacancyDetails() {
            // Get vacancy ID from URL
            const urlParams = new URLSearchParams(window.location.search);
            const vacancyId = window.location.pathname.split('/').pop();;

            if (!vacancyId) {
                console.error('Vacancy ID is missing in URL parameters');
                return;
            }

            try {
                // Make API request
                const response = await axios.get(`/api/posts/${vacancyId}`, {
                    withCredentials: true
                });

                if (!response.data.success) {
                    throw new Error(response.data.message || 'Failed to fetch vacancy details');
                }

                const vacancy = response.data.data;

                // Generate HTML for lists
                const responsibilitiesHTML = vacancy.vacancy_responsibilities
                    .map(resp => `<li>${resp}</li>`)
                    .join('');

                const qualificationsHTML = vacancy.vacancy_qualification
                    .map(qual => `<li>${qual}</li>`)
                    .join('');

                const benefitsHTML = vacancy.vacancy_benefits
                    .map(benefit => `<li>${benefit}</li>`)
                    .join('');

                // Handle company picture URL
                let companyPicture = vacancy.company.company_picture;
                if (companyPicture ===
                    'https://picsum.photos/id/870/200/300?grayscale&blur=2') {
                    companyPicture = '/storage/company/default_company.png';
                } else if (!companyPicture.startsWith('http')) {
                    companyPicture =
                        `/storage/company/${companyPicture || 'default_company.png'}`;
                }

                // Create the HTML structure
                const vacancyHTML = `
            <div class="flex flex-col lg:flex-row lg:space-x-8">
                <div class="flex-shrink-0">
                    <img class="h-28 w-28 rounded-full object-cover"
                        src="${companyPicture}"
                        alt="Company logo" />
                </div>
                <div class="mt-4 lg:mt-0">
                    <h2 class="mb-2 text-xl tracking-tight text-cyan sm:text-2xl">${vacancy.position}</h2>
                    <h2 class="mb-2 text-lg tracking-tight text-cyan sm:text-xl">${vacancy.company.company_name}</h2>
                    <p class="text-base text-gray-400 sm:text-lg">Posted by ${vacancy.user.user_details.name}</p>
                    <div class="flex">
                        <p class="pe-5 text-xs text-gray-400 sm:text-sm">
                            Start Date: ${formatDate(vacancy.date_open)}
                        </p>
                        <p class="text-xs text-gray-400 sm:text-sm">
                            End Date: ${formatDate(vacancy.date_closed)}
                        </p>
                    </div>
                    <p class="mt-2 text-xs text-cyan sm:text-sm">
                        Posted: ${getDateDifference(vacancy.date_open)}
                    </p>
                </div>
            </div>
            <div class="mt-4 space-y-6 sm:mt-8">
                <p class="text-justify text-sm text-cyan">
                    ${vacancy.vacancy_description}
                </p>
                <div class="ms-2 space-y-3">
                    <div class="text-cyan">
                        <h3 class="-ms-2 text-sm sm:text-base">Responsibilities</h3>
                        <ul class="ms-2 list-outside list-disc text-sm">
                            ${responsibilitiesHTML}
                        </ul>
                    </div>
                    <div class="text-cyan">
                        <h3 class="-ms-2 text-sm sm:text-base">Qualifications</h3>
                        <ul class="ms-2 list-outside list-disc text-sm">
                            ${qualificationsHTML}
                        </ul>
                    </div>
                    <div class="text-cyan">
                        <h3 class="-ms-2 text-sm sm:text-base">Benefits</h3>
                        <ul class="ms-2 list-outside list-disc text-sm">
                            ${benefitsHTML}
                        </ul>
                    </div>
                </div>
                <div>
                    <img src="${vacancy.vacancy_picture ?? 'default-vacancy.jpg'}"
                            alt="Vacancy image"
                            class="mt-4 rounded-lg shadow-md max-w-full" />
                </div>
            </div>
        `;

                // Insert the HTML into the container
                document.getElementById('vacancy-container').innerHTML = vacancyHTML;

            } catch (error) {
                console.error('Error loading vacancy details:', error);

                // Show error message
                document.getElementById('vacancy-container').innerHTML = `
            <div class="p-4 bg-red-50 text-red-700 rounded-lg">
                <h3 class="font-bold">Error loading vacancy</h3>
                <p>${error.message || 'Please try again later'}</p>
            </div>
        `;
            }
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', () => {
            // Make sure Axios is loaded
            if (typeof axios === 'undefined') {
                console.error('Axios is not loaded. Please include Axios library.');
                return;
            }

            // Render the vacancy details
            renderVacancyDetails();
        });
    </script>

    {{-- Comment API --}}
    <script>
        // DOM elements
        const commentsContainer = document.getElementById('comments-container');

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            // Get vacancy ID from URL
            const vacancyId = window.location.pathname.split('/').pop();

            // Load comments
            if (vacancyId) {
                fetchComments(vacancyId);
            }

            // Reply logic (initialize after DOM loaded)
            const commentInput = document.getElementById('comment-input');
            const replyContext = document.getElementById('reply-context');
            const replyContextText = document.getElementById('reply-context-text');
            const parentCommentIdInput = document.getElementById('parent-comment-id');
            const cancelReplyButton = document.getElementById('cancel-reply');

            // Handle reply button click via event delegation
            commentsContainer.addEventListener('click', function(event) {
                const target = event.target;
                if (target.classList.contains('reply-toggle')) {
                    const commentId = target.dataset.commentId;
                    const commentText = target.dataset.commentText;

                    parentCommentIdInput.value = commentId;
                    replyContext.classList.remove('hidden');
                    replyContextText.textContent = commentText;

                    commentInput.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                    commentInput.focus();
                }
            });

            // Cancel reply
            cancelReplyButton.addEventListener('click', function() {
                parentCommentIdInput.value = '';
                replyContext.classList.add('hidden');
                replyContextText.textContent = '';
            });
        });

        // Fetch comments for a vacancy
        async function fetchComments(vacancyId) {
            try {
                const response = await axios.get(`/api/posts/${vacancyId}/comments`, {
                    withCredentials: true
                });

                if (response.data.success) {
                    renderComments(response.data.data);
                } else {
                    renderEmptyState();
                }
            } catch (error) {
                console.error('Error fetching comments:', error);
                renderErrorState();
            }
        }

        // Render comments to the UI
        function renderComments(comments) {
            const loadingElement = document.getElementById('comments-loading');
            if (loadingElement) loadingElement.remove();

            if (!comments || comments.length === 0) {
                renderEmptyState();
                return;
            }

            commentsContainer.innerHTML = '';

            comments.forEach(comment => {
                const commentElement = createCommentElement(comment);
                commentsContainer.appendChild(commentElement);

                if (comment.replies && comment.replies.length > 0) {
                    const repliesContainer = document.createElement('div');
                    repliesContainer.className = 'replies-container relative ml-10 mt-4 space-y-4 sm:ml-16';

                    repliesContainer.innerHTML = `
                        <div class="replies-list hidden" id="replies-${comment.id_comment}">
                            ${comment.replies.map(reply => createReplyElement(reply)).join('')}
                        </div>
                    `;

                    commentElement.appendChild(repliesContainer);
                }
            });
        }

        function createCommentElement(comment) {
            const commentElement = document.createElement('div');
            commentElement.className = 'comment-item relative mb-6';
            commentElement.id = `comment-${comment.id_comment}`;

            const profilePhoto = comment.user?.user_details?.profile_photo || 'default_profile.png';
            const userName = comment.user?.user_details?.name || 'Unknown User';
            const repliesCount = comment.replies?.length || 0;

            commentElement.innerHTML = `
                <div class="flex items-start space-x-2 sm:space-x-4">
                    <img src="/storage/profile/${profilePhoto}"
                        alt="avatar"
                        class="h-14 w-14 rounded-full object-cover">
                    <div class="relative w-full max-w-md">
                        <div class="flex items-start justify-between">
                            <h2 class="text-sm font-medium hover:underline sm:text-base">
                                <a href="#">${userName}</a>
                            </h2>
                        </div>

                        <span class="mt-1 block text-xs text-cyan">
                            ${formatTimeAgo(comment.created_at)}
                        </span>

                        <div class="comment-content">
                            <p class="relative mt-2 overflow-hidden whitespace-normal break-words break-all rounded-b-full rounded-e-full rounded-tl-none bg-white px-8 py-3 text-sm shadow">
                                ${comment.text_comment}
                            </p>
                        </div>

                        <div class="mt-2 flex items-center space-x-4">
                            <span class="reply-toggle text-cyan-600 cursor-pointer text-xs hover:underline"
                                data-comment-id="${comment.id_comment}"
                                data-comment-text="${comment.text_comment}">
                                Reply
                            </span>

                            ${repliesCount > 0 ? `
                                                                                    <span class="show-all-replies text-cyan-600 cursor-pointer text-xs hover:underline"
                                                                                        data-comment-id="${comment.id_comment}">
                                                                                        Show replies (${repliesCount})
                                                                                    </span>
                                                                                ` : ''}
                        </div>
                    </div>
                </div>
            `;

            if (repliesCount > 0) {
                const showReplies = commentElement.querySelector('.show-all-replies');
                if (showReplies) {
                    showReplies.addEventListener('click', function() {
                        const repliesContainer = document.getElementById(`replies-${this.dataset.commentId}`);
                        if (repliesContainer) {
                            repliesContainer.classList.toggle('hidden');
                            this.textContent = repliesContainer.classList.contains('hidden') ?
                                `Show replies (${repliesCount})` :
                                `Hide replies (${repliesCount})`;
                        }
                    });
                }
            }

            return commentElement;
        }

        function createReplyElement(reply) {
            const profilePhoto = reply.user?.user_details?.profile_photo || 'default_profile.png';
            const userName = reply.user?.user_details?.name || 'Unknown User';

            return `
                <div id="comment-${reply.id_comment}" class="reply-item relative mb-4 pl-4">
                    <div class="absolute -top-16 bottom-0 left-[-20px]">
                        <img src="{{ asset('assets/line chat.svg') }}" alt="">
                    </div>
                    <div class="flex items-start space-x-2 sm:space-x-4">
                        <img src="/storage/profile/${profilePhoto}"
                            alt="avatar"
                            class="h-10 w-10 rounded-full object-cover sm:h-14 sm:w-14">
                        <div class="relative w-full max-w-md">
                            <div class="flex items-start justify-between">
                                <h2 class="text-sm font-medium sm:text-base">
                                    <a href="#">${userName}</a>
                                </h2>
                            </div>

                            <span class="mt-1 block text-xs text-cyan">
                                ${formatTimeAgo(reply.created_at)}
                            </span>

                            <div class="comment-content">
                                <p class="relative mt-2 whitespace-normal break-words break-all rounded-b-full rounded-e-full rounded-tl-none bg-white px-6 py-2 text-sm shadow sm:px-8 sm:py-3">
                                    ${reply.text_comment}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        function formatTimeAgo(dateString) {
            const date = new Date(dateString);
            const now = new Date();
            const seconds = Math.floor((now - date) / 1000);

            if (seconds < 60) return 'just now';

            const minutes = Math.floor(seconds / 60);
            if (minutes < 60) return `${minutes} min ago`;

            const hours = Math.floor(minutes / 60);
            if (hours < 24) return `${hours} hour${hours !== 1 ? 's' : ''} ago`;

            const days = Math.floor(hours / 24);
            return `${days} day${days !== 1 ? 's' : ''} ago`;
        }

        function renderEmptyState() {
            const loadingElement = document.getElementById('comments-loading');
            if (loadingElement) loadingElement.remove();

            commentsContainer.innerHTML = `
                <div class="flex h-full flex-col items-center justify-center space-y-8 text-center">
                    <img src="{{ asset('assets/Thinking Bubble.svg') }}" alt="No comments">
                    <p class="text-cyan">No comments yet.<br>Be the first to share your thoughts!</p>
                </div>
            `;
        }

        function renderErrorState() {
            const loadingElement = document.getElementById('comments-loading');
            if (loadingElement) loadingElement.remove();

            commentsContainer.innerHTML = `
                <div class="flex flex-col items-center justify-center space-y-4 py-8 text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <p class="text-lg font-medium text-red-500">Failed to load comments</p>
                    <p class="text-gray-600">Please try again later</p>
                    <button id="retry-comments" class="mt-4 rounded bg-cyan-500 px-4 py-2 font-medium text-white hover:bg-cyan-600">
                        Retry
                    </button>
                </div>
            `;

            const retryBtn = document.getElementById('retry-comments');
            if (retryBtn) {
                retryBtn.addEventListener('click', function() {
                    const vacancyId = window.location.pathname.split('/').pop();
                    if (vacancyId) fetchComments(vacancyId);
                });
            }
        }
    </script>
@endsection

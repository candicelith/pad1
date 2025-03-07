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
            <div class="mx-4 flex flex-col items-start sm:flex-row">

                {{-- Back Button --}}
                <button class="sm:mb-4" onclick="handleBack()">
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
                        class="w-full rounded-tl-lg rounded-tr-lg border-b-2 border-cyan bg-lightblue p-5 sm:rounded-e-none sm:rounded-s-lg sm:rounded-tr-none sm:border-b-0 sm:border-e-2 sm:p-10 md:rounded-e-none md:rounded-s-lg md:rounded-tr-none md:border-b-0 md:border-e-2">
                        <div class="flex flex-col lg:flex-row lg:space-x-8">
                            <div class="flex-shrink-0">
                                <img class="h-28 w-28 rounded-full object-cover"
                                    src="{{ asset('storage/profile/' . $vacancy->profile_photo) }}" alt="" />
                            </div>
                            <div class="mt-4 lg:mt-0">
                                {{-- Position --}}
                                <h2 class="mb-2 text-xl tracking-tight text-cyan sm:text-2xl">{{ $vacancy->position }}</h2>
                                {{-- Company Name --}}
                                <h2 class="mb-2 text-lg tracking-tight text-cyan sm:text-xl">{{ $vacancy->company_name }}
                                </h2>
                                {{-- Posted By "Name" --}}
                                <p class="text-base text-gray-400 sm:text-lg">Posted by {{ $vacancy->name }}</p>
                                <div class="flex">
                                    {{-- Start Date --}}
                                    <p class="pe-5 text-xs text-gray-400 sm:text-sm">
                                        Start Date: {{ \Carbon\Carbon::parse($vacancy->date_open)->format('d M Y') }}
                                    </p>
                                    {{-- End Date --}}
                                    <p class="text-xs text-gray-400 sm:text-sm">
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
                        </div>
                    </div>

                    {{-- Comment Section --}}
                    <div
                        class="flex w-full flex-col rounded-bl-lg rounded-br-lg border-t-2 border-cyan bg-lightblue px-5 py-10 sm:rounded-e-lg sm:rounded-bl-none sm:border-s-2 sm:border-t-0 lg:mt-0 lg:w-1">
                        <div class="mx-2 flex-grow sm:my-10 sm:mt-10">
                            <div class="scrollbar-detailposts max-h-screen space-y-6 overflow-y-auto custom-scrollbar">
                                @if ($comments->isEmpty())
                                    <div class="flex h-full flex-col items-center justify-center space-y-8 text-center">
                                        <img src="{{ asset('assets/Thinking Bubble.svg') }}" alt="">
                                        <p class="text-cyan">No comments yet.<br>
                                            Be the first to share your thoughts!</p>
                                    </div>
                                @else
                                    {{-- Comment Start --}}
                                    @foreach ($comments as $comment)
                                        <div id="comment-{{ $comment->id_comment }}" class="comment-item mb-6 relative">
                                            <div class="flex items-start space-x-2 sm:space-x-4">
                                                <img src="{{ asset('storage/profile/' . ($comment->user->userDetails->profile_photo ?? 'default_profile.png')) }}"
                                                    alt="avatar" class="h-14 w-14 rounded-full object-cover">
                                                <div class="relative max-w-md w-full">
                                                    <div class="flex justify-between items-start">
                                                        <h2 class="text-sm font-medium sm:text-base">
                                                            {{ $comment->user->userDetails->name }}</h2>
                                                    </div>

                                                    <span class="mt-1 block text-xs text-cyan">
                                                        {{ $comment->created_at->diffForHumans() }}
                                                    </span>

                                                    <div class="comment-content">
                                                        <p
                                                            class="relative mt-2 overflow-hidden whitespace-normal break-words break-all rounded-b-full rounded-e-full rounded-tl-none bg-teal-600 px-8 py-3 text-sm text-white">
                                                            {!! nl2br(e($comment->text_comment)) !!}
                                                        </p>
                                                    </div>

                                                    @if (Auth::check())
                                                        {{-- Reply button --}}
                                                        <div class="flex items-center space-x-4">
                                                            <span
                                                                class="reply-toggle cursor-pointer text-xs hover:underline text-cyan-600"
                                                                data-comment-id="{{ $comment->id_comment }}"
                                                                data-comment-text="{{ $comment->text_comment }}">
                                                                Reply
                                                            </span>

                                                            @if ($comment->replies && $comment->replies->count() > 1)
                                                                <span
                                                                    class="show-all-replies cursor-pointer text-xs text-cyan-600 hover:underline "
                                                                    data-comment-id="{{ $comment->id_comment }}">
                                                                    Show all replies ({{ $comment->replies->count() }})
                                                                </span>
                                                            @endif
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>



                                            {{-- Nested Replies --}}
                                            @if ($comment->replies && $comment->replies->count() > 0)
                                                <div class="replies-container ml-10 sm:ml-16 mt-4 space-y-4 relative">
                                                    {{-- Vertical line to separate replies --}}
                                                    <div class="absolute left-[-20px] top-0 bottom-0 w-0.5 bg-gray-300">
                                                    </div>

                                                    <div class="replies-list hidden"
                                                        id="replies-{{ $comment->id_comment }}">
                                                        @foreach ($comment->replies as $reply)
                                                            <div id="comment-{{ $reply->id_comment }}"
                                                                class="reply-item pl-4 relative mb-4">
                                                                <div class="flex items-start space-x-2 sm:space-x-4">
                                                                    <img src="{{ asset('storage/profile/' . ($reply->user->userDetails->profile_photo ?? 'default_profile.png')) }}"
                                                                        alt="avatar"
                                                                        class="h-10 w-10 sm:h-14 sm:w-14 rounded-full object-cover">
                                                                    <div class="relative max-w-md w-full">
                                                                        <div class="flex justify-between items-start">
                                                                            <h2 class="text-sm font-medium sm:text-base">
                                                                                {{ $reply->user->userDetails->name }}</h2>
                                                                        </div>

                                                                        <span class="mt-1 block text-xs text-cyan">
                                                                            {{ $reply->created_at->diffForHumans() }}
                                                                        </span>

                                                                        <div class="comment-content">
                                                                            <p
                                                                                class="relative mt-2 whitespace-normal break-words break-all rounded-b-full rounded-e-full rounded-tl-none bg-teal-600 px-6 py-2 text-sm text-white sm:px-8 sm:py-3">
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
                                @endif
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
                                    <div class="flex-grow relative">
                                        {{-- Reply Context --}}
                                        <div id="reply-context"
                                            class="hidden absolute bottom-full left-0 right-0 bg-gray-500 text-white rounded-t-lg px-4 py-2 flex justify-between items-center mb-1">
                                            <div class="flex items-center space-x-2 min-w-0">
                                                <span class="text-sm font-semibold whitespace-nowrap">Replying to:</span>
                                                <span id="reply-context-text" class="truncate flex-grow text-sm">
                                                    <!-- Reply text will be inserted here -->
                                                </span>
                                            </div>
                                            <button type="button" id="cancel-reply"
                                                class="ml-2 text-white hover:text-gray-200 flex-shrink-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>

                                        <input type="text" name="comment"
                                            class="bg-gray-600 w-full rounded-lg border-none px-4 py-2 text-white placeholder-gray-300 focus:ring-2 focus:ring-blue-500"
                                            placeholder="Write a comment..." id="comment-input">
                                    </div>
                                    <button type="submit" class="comment-button"
                                        style="background-color: #0097A7; border-radius: 10px; padding: 4px;">

                                        <svg class="h-9 w-9 rotate-90 text-white sm:h-11 sm:w-11 transition-transform duration-300"
                                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" fill="none" viewBox="0 0 24 24">

                                            <path stroke="currentColor" stroke-linecap="round" stroke-lienjoin="round"
                                                stroke-width="2" d="m12 18-7 3 7-18 7 18-7-3Zm0 0v-5" />

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
                                <div class="relative rounded-lg bg-cyan-100 shadow">
                                    <div class="p-4 text-center md:p-5">
                                        <h3 class="mb-5 text-lg font-normal text-white">Log in to view post & comment
                                            details</h3>
                                        <p class="mb-5 text-sm font-normal text-white">Would you like to log in?
                                        </p>

                                        <button data-modal-hide="defaultModal" type="button"
                                            onclick="window.location.href='{{ route('posts') }}'"
                                            class="ms-3 rounded-full border border-gray-900 bg-white px-6 py-2.5 text-sm font-medium text-cyan hover:bg-cyan hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-cyan">
                                            No
                                        </button>
                                        <button data-modal-hide="defaultModal" type="button"
                                            onclick="window.location.href='{{ route('login') }}'"
                                            class="ms-3 rounded-full border border-gray-900 bg-white px-6 py-2.5 text-sm font-medium text-cyan hover:bg-cyan hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-cyan">
                                            Yes
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
    </script>

@endsection

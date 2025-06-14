@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">

        @if (Session::has('success'))
            <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-lightgreen p-4 text-center text-sm text-green-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                role="alert">
                {!! Session::get('success') !!}
            </div>
        @endif

        <div class="sticky top-20 z-20 w-full bg-white py-4 sm:pb-8 sm:pt-3">
            {{-- Title --}}
            {{-- <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-9">
                <h2 class="mb-4 text-3xl text-cyan lg:text-4xl">Posts</h2>
            </div> --}}

            {{-- New Post Button --}}
            @auth
                @if (Auth::check() && Auth::user()->id_roles == '2')
                    {{-- New Post Button --}}
                    <div class="mx-auto mt-6 flex max-w-screen-xl justify-end px-4 sm:px-6">
                        <button id="new-post-btn" data-modal-target="crud-modal-post" data-modal-toggle="crud-modal-post"
                            class="bg-btn-cyan items-center rounded-xl bg-cyan px-6 py-3 text-sm text-white shadow-md hover:bg-lightblue hover:text-cyan sm:text-base">
                            New Post +
                        </button>
                    </div>
                @endif
            @endauth

            {{-- Filters and Search --}}
            <div class="mx-auto mt-4 max-w-screen-xl items-center justify-between px-4 sm:flex sm:px-6">
                @auth
                    @if (Auth::check() && Auth::user()->id_roles == '2')
                        <div class="mb-2 flex justify-between sm:mb-0 sm:space-x-4 xl:space-x-10">

                            <a href="{{ route('posts', ['filter' => 'my_posts']) }}"
                                class="text-cyan-600 {{ request('filter') == 'my_posts' ? 'bg-cyan-100 text-white' : '' }} rounded-xl border border-gray-200 px-3 py-2 text-sm hover:bg-gray-200 sm:px-6 sm:py-4 xl:text-base">
                                My Post
                            </a>

                            <a href="{{ route('posts', ['filter' => 'my_commented_posts']) }}"
                                class="text-cyan-600 {{ request('filter') == 'my_commented_posts' ? 'bg-cyan-100 text-white' : '' }} rounded-xl border border-gray-200 px-3 py-2 text-sm hover:bg-gray-200 sm:px-6 sm:py-4 xl:text-base">
                                My Commented Post
                            </a>
                        </div>
                    @elseif (Auth::check() && Auth::user()->id_roles == '3')
                        <div class="mb-2 flex justify-center sm:mb-0 sm:space-x-4 xl:space-x-10">
                            <button
                                class="text-cyan-600 w-full rounded-xl border border-gray-200 px-3 py-2 text-sm hover:bg-gray-200 focus:bg-cyan-100 focus:text-white sm:px-6 sm:py-4 xl:text-base">
                                My Commented Post
                            </button>
                        </div>
                    @endif
                @endauth
                {{-- Search --}}
                <div class="mb-2 max-w-screen-xl sm:mb-0">
                    <form id="search-form" class="flex max-w-sm items-center">
                        <label for="simple-search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <input type="text" id="simple-search" name="query"
                                class="block w-full rounded-lg border border-gray-500 bg-gray-200 p-2.5 ps-10 text-sm text-gray-900 focus:border-cyan focus:ring-cyan"
                                placeholder="Search post..." onkeyup="filterPosts()" />
                        </div>
                        <button type="submit"
                            class="bg-btn-cyan ms-2 rounded-xl border border-cyan bg-cyan p-2.5 text-sm font-medium text-white hover:bg-cyan-100 focus:outline-none focus:ring-4 focus:ring-cyan">
                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>
                </div>
                {{-- Date Range --}}
                <div id="date-range-picker" date-rangepicker datepicker datepicker-buttons datepicker-autoselect-today
                    class="flex items-center">
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-start" name="start" type="text"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900"
                            placeholder="Select date start">
                    </div>
                    <span class="mx-5 text-cyan">to</span>
                    <div class="relative">
                        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                            <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </div>
                        <input id="datepicker-range-end" name="end" type="text"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 ps-10 text-sm text-gray-900"
                            placeholder="Select date end">
                    </div>
                </div>
            </div>
            {{-- Filters and Search End --}}

        </div>

        {{-- Modal New Post --}}
        <div id="crud-modal-post" tabindex="-1" aria-hidden="true"
            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
            <div class="relative mx-4 max-h-full w-full sm:max-w-4xl">
                <div class="relative rounded-lg border-4 border-cyan-100 bg-white p-2 shadow">
                    <div class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 text-center md:p-5">
                        <h3 class="text-2xl text-cyan sm:text-start">
                            Post a Job Opportunity!
                        </h3>
                        <button type="button" class="inline-flex items-center" data-modal-toggle="crud-modal-post">
                            <svg class="h-6 w-6 text-cyan" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                    d="M6 18 17.94 6M18 18 6.06 6" />
                            </svg>
                        </button>
                    </div>

                    {{-- Modal Create Posts --}}
                    @auth
                        @if (Auth::check() && Auth::user()->id_roles == '2')
                            <form id="vacancy-form"
                                class="scrollbar-modal max-h-96 space-y-8 overflow-y-auto px-4 pb-4 pt-0 md:px-5 md:pb-5"
                                method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                                @csrf

                                {{-- Display all errors at the top (optional) --}}
                                @if ($errors->any())
                                    <div class="col-span-2 mb-4 rounded-md bg-red-100 p-4 text-sm text-red-700">
                                        <strong class="font-bold">Oops! Something went wrong.</strong>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="mt-0 grid grid-cols-2 gap-x-8 gap-y-6 sm:grid-cols-2">
                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="position" class="mb-1 block text-2xl text-cyan">
                                            Position <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <select name="position" id="position"
                                            class="@error('position') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">
                                            <option value="">Select a job position</option>
                                            {{-- Note: These values should likely be distinct or dynamic --}}
                                            <option value="UIUX Designer"
                                                {{ old('position') == 'UIUX Designer' ? 'selected' : '' }}>UIUX Designer
                                            </option>
                                            <option value="Frontend Developer"
                                                {{ old('position') == 'Frontend Developer' ? 'selected' : '' }}>Frontend
                                                Developer</option>
                                            <option value="Backend Developer"
                                                {{ old('position') == 'Backend Developer' ? 'selected' : '' }}>Backend Developer
                                            </option>
                                            {{-- Add other positions as needed --}}
                                        </select>
                                        @error('position')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="company" class="mb-1 block text-2xl text-cyan">
                                            Company <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <select name="company" id="company"
                                            class="@error('company') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">
                                            <option value="" disabled {{ old('company') ? '' : 'selected' }}>Select a
                                                company</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id_company }}"
                                                    {{ old('company') == $company->id_company ? 'selected' : '' }}>
                                                    {{ $company->company_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('company')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 sm:col-span-2">
                                        <label for="vacancy_description" class="mb-1 block text-2xl text-cyan">
                                            Description <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <textarea name="vacancy_description" id="vacancy_description"
                                            class="@error('vacancy_description') border-red-500 @else border-gray-300 @enderror w-full rounded-xl border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                            placeholder="Enter content">{{ old('vacancy_description') }}</textarea>
                                        @error('vacancy_description')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="start_date" class="mb-1 block text-2xl text-cyan">
                                            Start Date <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <input type="date" name="start_date" id="start_date"
                                            value="{{ old('start_date') }}"
                                            class="@error('start_date') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">
                                        @error('start_date')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-1 sm:col-span-1">
                                        <label for="end_date" class="mb-1 block text-2xl text-cyan">
                                            End Date <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                                            class="@error('end_date') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">
                                        @error('end_date')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Responsibility --}}
                                    <div class="col-span-2">
                                        <label for="responsibility" class="mb-1 block text-2xl text-cyan">Responsibility <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                        <div id="responsibility-container-create">
                                            {{-- Handle existing old input or provide at least one empty field --}}
                                            @forelse (old('vacancy_responsibility', ['']) as $index => $responsibility)
                                                <div class="responsibility-item mb-2 flex items-center">
                                                    <input id="responsibility" type="text" name="vacancy_responsibility[]"
                                                        value="{{ $responsibility }}"
                                                        class="@error('vacancy_responsibility.' . $index) border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                        placeholder="Enter responsibility" />
                                                    <button type="button"
                                                        class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                        style="{{ $loop->first && !old('vacancy_responsibility') ? 'display: none;' : '' }}">Remove</button>
                                                </div>
                                                @error('vacancy_responsibility.' . $index)
                                                    <p class="mb-2 text-sm text-red-500">{{ $message }}</p>
                                                @enderror
                                            @empty
                                                {{-- This case should ideally not be hit if default [''] is used for old() --}}
                                                <div class="responsibility-item mb-2 flex items-center">
                                                    <input id="responsibility" type="text" name="vacancy_responsibility[]"
                                                        class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                        placeholder="Enter responsibility" />
                                                    <button type="button"
                                                        class="remove-responsibility ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                        style="display: none;">Remove</button>
                                                </div>
                                            @endforelse
                                        </div>
                                        <button type="button" id="add-responsibility"
                                            class="bg-btn-cyan-100 mt-2 rounded-lg px-7 py-2 text-sm text-white hover:bg-lightblue hover:text-cyan sm:text-base">
                                            Add Responsibility
                                        </button>
                                        @error('vacancy_responsibility')
                                            {{-- Error for the array as a whole (e.g., min:1) --}}
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Qualification --}}
                                    <div class="col-span-2">
                                        <label for="qualification" class="mb-1 block text-2xl text-cyan">Qualification <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                        <div id="qualification-container">
                                            @forelse (old('vacancy_qualification', ['']) as $index => $qualification)
                                                <div class="qualification-item mb-2 flex items-center">
                                                    <input id="qualification" type="text" name="vacancy_qualification[]"
                                                        value="{{ $qualification }}"
                                                        class="@error('vacancy_qualification.' . $index) border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                        placeholder="Enter qualification" />
                                                    <button type="button"
                                                        class="remove-qualification ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                        style="{{ $loop->first && !old('vacancy_qualification') ? 'display: none;' : '' }}">Remove</button>
                                                </div>
                                                @error('vacancy_qualification.' . $index)
                                                    <p class="mb-2 text-sm text-red-500">{{ $message }}</p>
                                                @enderror
                                            @empty
                                                <div class="qualification-item mb-2 flex items-center">
                                                    <input id="qualification" type="text" name="vacancy_qualification[]"
                                                        class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                        placeholder="Enter qualification" />
                                                    <button type="button"
                                                        class="remove-qualification ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                        style="display: none;">Remove</button>
                                                </div>
                                            @endforelse
                                        </div>
                                        <button type="button" id="add-qualification"
                                            class="bg-btn-cyan-100 mt-2 rounded-lg px-7 py-2 text-sm text-white hover:bg-lightblue hover:text-cyan sm:text-base">
                                            Add Qualification
                                        </button>
                                        @error('vacancy_qualification')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- Benefits --}}
                                    <div class="col-span-2">
                                        <label for="benefits" class="mb-1 block text-2xl text-cyan">Benefits <span
                                                class="text-4xl text-red-500">*</span></label>
                                        <div id="benefits-container">
                                            @forelse (old('vacancy_benefits', ['']) as $index => $benefit)
                                                <div class="benefits-item mb-2 flex items-center">
                                                    <input id="benefit" type="text" name="vacancy_benefits[]"
                                                        value="{{ $benefit }}"
                                                        class="@error('vacancy_benefits.' . $index) border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                        placeholder="Enter benefits" />
                                                    <button type="button"
                                                        class="remove-benefits ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                        style="{{ $loop->first && !old('vacancy_benefits') ? 'display: none;' : '' }}">Remove</button>
                                                </div>
                                                @error('vacancy_benefits.' . $index)
                                                    <p class="mb-2 text-sm text-red-500">{{ $message }}</p>
                                                @enderror
                                            @empty
                                                <div class="benefits-item mb-2 flex items-center">
                                                    <input id="benefit" type="text" name="vacancy_benefits[]"
                                                        class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                        placeholder="Enter benefits" />
                                                    <button type="button"
                                                        class="remove-benefits ml-2 rounded-xl border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2"
                                                        style="display: none;">Remove</button>
                                                </div>
                                            @endforelse
                                        </div>
                                        <button type="button" id="add-benefits"
                                            class="bg-btn-cyan-100 mt-2 rounded-lg px-7 py-2 text-sm text-white hover:bg-lightblue hover:text-cyan sm:text-base">
                                            Add Benefits
                                        </button>
                                        @error('vacancy_benefits')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-span-2 sm:col-span-2"> {{-- Changed col-span-1 to col-span-2 for full width --}}
                                        <label for="vacancy_picture" class="mb-1 block text-2xl text-cyan">
                                            Upload Poster <span
                                                class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        </label>
                                        <input type="file" name="vacancy_picture" id="vacancy_picture"
                                            class="@error('vacancy_picture') border-red-500 @else border-gray-300 @enderror w-full rounded-full border bg-gray-200 file:mr-4 file:rounded-full file:border-0 file:bg-gray-300 file:px-4 file:py-2 file:text-gray-700 hover:file:bg-gray-400">
                                        @error('vacancy_picture')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit" id="submit-vacancy"
                                        class="bg-btn-cyan m-4 rounded-lg bg-cyan px-6 py-2 text-white shadow-lg hover:bg-cyan-400 hover:text-cyan sm:py-2.5">
                                        Post
                                    </button>
                                </div>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
        </div>

        {{-- No Result Found --}}
        <div id="no-results" class="hidden h-40 items-center justify-center">
            <div class="flex flex-col items-center justify-center space-y-2">
                <svg class="h-10 w-10 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
                <p class="text-center text-gray-900">No Result Found</p>
            </div>
        </div>

        <div class="mx-auto max-w-screen-xl px-4 py-3 sm:px-0">
            {{-- Post Card Start --}}
            <div id="post-container">
                {{-- @foreach ($vacancys as $vc)
                    <a href="{{ route('posts.detail', ['id' => (string) $vc->id_vacancy]) }}" class="post-card">
                        <div data-aos="fade-up" class="mt-3 grid space-y-4 lg:grid-cols-1">
                            <article
                                class="cursor-pointer rounded-lg border border-gray-200 bg-lightblue p-6 shadow-[0px_2px_3px_0px_rgba(0,0,0,0.30)]"
                                onclick="navigateToDetailPost()">
                                <div class="mb-5 flex items-center justify-between text-gray-400">
                                    <span class="ml-auto text-xs sm:text-sm">
                                        {{ $vc->date_difference }}
                                    </span>
                                </div>
                                <div class="flex flex-col lg:flex-row lg:space-x-8">
                                    <div class="flex-shrink-0">
                                        <img class="h-20 w-20 rounded-full object-cover"
                                            src="{{ asset('storage/profile/' . $vc->profile_photo) }}"
                                            alt="{{ $vc->name }}" />
                                    </div>
                                    <div class="mt-4 lg:mt-0"> --}}
                {{-- Position --}}
                {{-- <h2 class="post-title mb-2 text-xl tracking-tight text-cyan sm:text-2xl">
                                            {{ $vc->position }}
                                        </h2> --}}
                {{-- Company Name --}}
                {{-- <h2 class="post-company mb-2 text-base tracking-tight text-cyan sm:text-xl">
                                            {{ $vc->company_name }}
                                        </h2> --}}
                {{-- Posted By "Name" --}}
                {{-- <p class="post-author text-sm text-gray-400 sm:text-lg">Posted by
                                            {{ $vc->name }}
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </a>
                @endforeach --}}
            </div>

            {{-- Post Card End --}}

            {{-- Pagination --}}
            <div class="mt-6 flex justify-center">
                {{ $vacancys->links('vendor.pagination.custom-pagination') }}
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    {{-- Search Post --}}
    <script>
        function filterPosts() {
            let input = document.getElementById('simple-search').value.toLowerCase();
            let posts = document.querySelectorAll('.post-card');
            let noResults = document.getElementById('no-results');
            let hasResults = false;

            posts.forEach(post => {
                let title = post.querySelector('.post-title').textContent.toLowerCase();
                let company = post.querySelector('.post-company').textContent.toLowerCase();
                let author = post.querySelector('.post-author').textContent.toLowerCase();

                if (title.includes(input) || company.includes(input) || author.includes(input)) {
                    post.style.display = "block";
                    hasResults = true;
                } else {
                    post.style.display = "none";
                }
            });

            noResults.style.display = hasResults ? "none" : "flex";
        }
    </script>

    {{-- Create Post Modal --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const addDynamicInput = (containerId, buttonId, inputName, removeClass) => {
                const container = document.getElementById(containerId);
                const addButton = document.getElementById(buttonId);

                addButton.addEventListener('click', () => {
                    const newItem = document.createElement('div');
                    newItem.classList.add(`${inputName}-item`, 'mb-2', 'flex', 'items-center');
                    newItem.innerHTML = `
                <input type="text" name="${inputName}[]"
                       class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                       placeholder="Add More" />
                <button type="button" class="ml-2 rounded-full border border-gray-900 bg-red-600 px-2.5 py-1.5 text-sm text-white hover:bg-red-400 sm:px-4 sm:py-2 ${removeClass}">Remove</button>
            `;
                    container.appendChild(newItem);

                    newItem.querySelector(`.${removeClass}`).addEventListener('click', () => {
                        newItem.remove();
                    });
                });

                container.addEventListener('click', (e) => {
                    if (e.target.classList.contains(removeClass)) {
                        e.target.closest(`.${inputName}-item`).remove();
                    }
                });
            };

            addDynamicInput('responsibility-container-create', 'add-responsibility', 'job_responsibility',
                'remove-responsibility');
            addDynamicInput('qualification-container', 'add-qualification', 'vacancy_qualification',
                'remove-qualification');
            addDynamicInput('benefits-container', 'add-benefits', 'vacancy_benefits', 'remove-benefits');
        });
    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}
    {{-- Post API --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            fetchAndDisplayPosts();

            async function fetchAndDisplayPosts() {
                const postsContainer = document.getElementById('post-container');
                postsContainer.innerHTML = '<p class="text-center py-4 text-gray-500">Loading...</p>';

                try {
                    const response = await axios.get('/api/posts', {
                        withCredentials: true
                    });

                    const posts = response.data.data;

                    if (!posts || posts.length === 0) {
                        postsContainer.innerHTML = '<p class="text-center py-4">No vacancies available</p>';
                        return;
                    }

                    const postsHTML = posts.data.map(post => {
                        const dateDiffText = formatDateDifference(post.date_open);
                        const profilePhoto = post.profile_photo || 'default_profile.png';

                        return `
                            <a href="/posts/detail/${post.id_vacancy}" class="post-card">
                                <div class="mt-3 grid space-y-4 lg:grid-cols-1">
                                    <article class="cursor-pointer rounded-lg border border-gray-200 bg-lightblue p-6 shadow-[0px_2px_3px_0px_rgba(0,0,0,0.30)]">
                                        <div class="mb-5 flex items-center justify-between text-gray-400">
                                            <span class="ml-auto text-xs sm:text-sm">${dateDiffText}</span>
                                        </div>
                                        <div class="flex flex-col lg:flex-row lg:space-x-8">
                                            <div class="flex-shrink-0">
                                                <img class="h-20 w-20 rounded-full object-cover"
                                                     src="/storage/profile/${profilePhoto}"
                                                     alt="${post.name}" />
                                            </div>
                                            <div class="mt-4 lg:mt-0">
                                                <h2 class="post-title mb-2 text-xl tracking-tight text-cyan sm:text-2xl">
                                                    ${post.position}
                                                </h2>
                                                <h2 class="post-company mb-2 text-base tracking-tight text-cyan sm:text-xl">
                                                    ${post.company_name}
                                                </h2>
                                                <p class="post-author text-sm text-gray-400 sm:text-lg">Posted by ${post.name}</p>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </a>
                        `;
                    }).join('');

                    postsContainer.innerHTML = postsHTML;

                } catch (error) {
                    console.error('Error fetching posts:', error);
                    postsContainer.innerHTML =
                        '<p class="text-center py-4 text-red-500">Failed to load vacancies.</p>';
                }
            }

            function formatDateDifference(dateOpen) {
                const now = new Date();
                const opened = new Date(dateOpen);
                const diffTime = Math.abs(now - opened);
                const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

                if (diffDays === 0) return 'Today';
                if (diffDays === 1) return '1 day ago';
                return `${diffDays} days ago`;
            }
        });
    </script>
@endsection

@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white sm:mt-0">
        <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">
            {{-- 💡 Wrapper for both error box and form --}}
            <div class="w-full sm:max-w-xl md:max-w-3xl lg:max-w-4xl xl:max-w-5xl px-4">
                @if ($errors->any())
                    <div class="mb-6 rounded-md border border-red-300 bg-red-50 px-4 py-3 text-sm text-red-700">
                        <strong class="block font-semibold">Please fix the following errors:</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div
                class="flex w-full justify-center px-2 py-10 sm:max-w-xl sm:px-6 md:px-24 md:py-11 lg:max-w-5xl xl:max-w-6xl">
                <div class="w-full rounded-lg border-4 border-cyan-100 bg-white px-4 py-3 sm:max-w-lg sm:px-6 sm:py-7">
                    <h1 class="text-xl text-cyan sm:text-3xl">Registration Form</h1>
                    <h2 class="text-lg text-cyan sm:text-xl">Please verify your profile</h2>
                    <form id="registration-form" action="{{ route('registration.submit') }}" method="POST">
                        @csrf
                        <div class="mt-5 w-full" id="step-1">
                            <ol class="mb-4 flex w-full items-center space-x-2 sm:mb-5">
                                <li
                                    class="flex w-full items-center after:inline-block after:h-1 after:w-full after:rounded-full after:border-4 after:border-b after:border-blue-600 after:content-['']">
                                </li>
                                <li
                                    class="flex w-full items-center after:inline-block after:h-1 after:w-full after:rounded-full after:border-4 after:border-b after:border-gray-400 after:content-['']">
                                </li>
                            </ol>

                            <h2 class="mb-4 text-xl text-cyan">Choose Your Role</h2>
                            <div class="my-10">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="role-student" type="radio" value="student" name="role"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                        <label for="role-student"
                                            class="ms-2 text-xl font-medium text-cyan dark:text-gray-300">Student</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input id="role-alumni" type="radio" value="alumni" name="role"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                        <label for="role-alumni"
                                            class="ms-2 text-xl font-medium text-cyan dark:text-gray-300">Alumni</label>
                                    </div>
                                </div>
                                @error('role')
                                    <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="justify-between space-y-2 sm:flex sm:space-x-4 sm:space-y-0">
                                <button type="button"
                                    class="bg-btn-lightblue w-full rounded-lg border border-gray-400 px-14 py-2 text-center text-xl font-medium text-gray-400 sm:w-1/2"
                                    disabled>
                                    Previous
                                </button>
                                <button type="button" id="next-btn"
                                    class="bg-btn-cyan w-full rounded-lg bg-cyan px-20 py-2 text-center text-xl font-medium text-white hover:bg-cyan-400 hover:text-cyan sm:w-1/2">
                                    Next
                                </button>
                            </div>
                        </div>

                        <div class="mt-5 hidden w-full" id="step-2">
                            <ol class="mb-4 flex w-full items-center space-x-2 sm:mb-5">
                                <li
                                    class="flex w-full items-center after:inline-block after:h-1 after:w-full after:rounded-full after:border-4 after:border-b after:border-blue-600 after:content-['']">
                                </li>
                                <li
                                    class="flex w-full items-center after:inline-block after:h-1 after:w-full after:rounded-full after:border-4 after:border-b after:border-blue-600 after:content-['']">
                                </li>
                            </ol>

                            <h2 class="mb-4 text-cyan">You're registered as a student. <br>
                                Please review your account details below.</h2>
                            <div class="space-y-7">
                                <div class="space-y-3">
                                    <label class="text-xl font-medium text-cyan dark:text-gray-300">Name <span
                                            class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        <input type="text" name="name" readonly
                                            class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                            placeholder="Enter your full name (e.g., Budi Santoso)"
                                            value="{{ session('userDetails.name') ?? old('name') }}">
                                        @error('name')
                                            <p class="text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                </div>
                                <div class="space-y-3">
                                    <label class="text-xl font-medium text-cyan dark:text-gray-300">NIM <span
                                            class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                        <input type="text" name="nim" required
                                            class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                            placeholder="Enter your student ID number"
                                            value="{{ session('userDetails.nim') ?? old('nim') }}">
                                        @error('nim')
                                            <p class="text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                </div>
                                <div class="space-y-3">
                                    <label class="text-xl font-medium text-cyan dark:text-gray-300">Entry Year <span
                                            class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                    <input type="text" name="entry_year" required
                                        class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                        placeholder="Enter your entry year (e.g., 2023)"
                                        value="{{ session('userDetails.entry_year') ?? old('entry_year') }}">
                                    @error('entry_year')
                                        <p class="text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-3">
                                    <label class="text-xl font-medium text-cyan dark:text-gray-300">Graduate Year <span
                                            class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                    <input type="text" name="graduate_year" required
                                        class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                        placeholder="Enter your graduation year (e.g., 2023)"
                                        value="{{ session('userDetails.entry_year') ?? old('graduate_year') }}">
                                    @error('graduate_year')
                                        <p class="text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <p class="mb-10 mt-3 text-sm text-cyan">For further details on how your data is used and stored,
                                please see our <a href="{{ route('privacypolicy') }}"
                                    class="text-cyan-100 hover:underline">Privacy Policy</a>
                            </p>
                            <div class="flex justify-between space-x-4">
                                <button type="button" id="prev-btn"
                                    class="bg-btn-lightblue w-1/2 rounded-lg border border-gray-400 px-14 py-2 text-center text-xl font-medium text-gray-400 hover:bg-cyan hover:text-white">
                                    Previous
                                </button>
                                <button id="submit-btn" type="submit"
                                    class="bg-btn-cyan w-1/2 rounded-lg bg-cyan px-20 py-2 text-center text-xl font-medium text-white hover:bg-cyan-400 hover:text-cyan">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const step1 = document.getElementById('step-1');
                const step2 = document.getElementById('step-2');
                const nextBtn = document.getElementById('next-btn');
                const prevBtn = document.getElementById('prev-btn');

                const roleStudent = document.getElementById('role-student');
                const roleAlumni = document.getElementById('role-alumni');

                const graduateYearInput = document.querySelector('input[name="graduate_year"]');
                const graduateYearField = graduateYearInput.closest('.space-y-3');

                function updateGraduateYearVisibility() {
                    if (roleAlumni.checked) {
                        graduateYearField.classList.remove('hidden');
                        graduateYearInput.setAttribute('required', 'required');
                    } else {
                        graduateYearField.classList.add('hidden');
                        graduateYearInput.removeAttribute('required');
                        graduateYearInput.value = '';
                    }
                }

                nextBtn.addEventListener('click', function() {
                    const roleSelected = document.querySelector('input[name="role"]:checked');
                    if (!roleSelected) {
                        alert('Please select a role before proceeding.');
                        return;
                    }

                    updateGraduateYearVisibility();
                    step1.classList.add('hidden');
                    step2.classList.remove('hidden');
                });

                prevBtn.addEventListener('click', function() {
                    step2.classList.add('hidden');
                    step1.classList.remove('hidden');
                });

                roleStudent.addEventListener('change', updateGraduateYearVisibility);
                roleAlumni.addEventListener('change', updateGraduateYearVisibility);

                // Run on load in case role was already selected
                updateGraduateYearVisibility();
            });

            @if ($errors->any())
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('step-1').classList.remove('hidden');
                document.getElementById('step-2').classList.add('hidden');
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        @endif

        </script>

    </section>
@endsection

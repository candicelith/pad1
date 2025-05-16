@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white sm:mt-0">
        <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">
            <div class="flex w-full justify-center px-6 py-10 sm:max-w-xl md:px-24 md:py-11 lg:max-w-5xl xl:max-w-6xl">
                <div class="w-full max-w-lg rounded-lg border-4 border-cyan-100 bg-white px-6 py-7">
                    <h1 class="text-3xl text-cyan">Registration Form</h1>
                    <h2 class="text-xl text-cyan">Please verify your profile</h2>

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

                            <h2 class="text-xl text-cyan mb-4">Choose Your Role</h2>
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
                                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex justify-between space-x-4">
                                <button type="button"
                                    class="bg-btn-cyan-100 w-1/2 rounded-lg border border-gray-400 bg-gray-300 px-14 py-2 text-center text-xl font-medium text-gray-500"
                                    disabled>
                                    Previous
                                </button>
                                <button type="button" id="next-btn"
                                    class="bg-btn-cyan w-1/2 rounded-lg bg-cyan px-20 py-2 text-center text-xl font-medium text-white hover:bg-cyan-400">
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

                            <h2 class="text-xl text-cyan mb-4">Enter your details</h2>
                            <div class="space-y-7">
                                <div class="space-y-3">
                                    <label class="text-xl font-medium text-cyan dark:text-gray-300">Name</label>
                                    <input type="text" name="name" readonly
                                        class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                        placeholder="Enter your full name (e.g., Budi Santoso)"
                                        value="{{ session('userDetails.name') ?? old('name') }}">
                                    @error('name')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="space-y-3">
                                    <label class="text-xl font-medium text-cyan dark:text-gray-300">NIM</label>
                                    <input type="text" name="nim" required
                                        class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                        placeholder="Enter your student ID number" value="{{ session('userDetails.nim') ?? old('nim') }}">
                                    @error('nim')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-3">
                                    <label class="text-xl font-medium text-cyan dark:text-gray-300">Entry Year</label>
                                    <input type="text" name="entry_year" required
                                        class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                        placeholder="Enter your entry year (e.g., 2023)" value="{{ session('userDetails.entry_year') ?? old('entry_year') }}">
                                    @error('entry_year')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="space-y-3">
                                    <label class="text-xl font-medium text-cyan dark:text-gray-300">Graduate Year</label>
                                    <input type="text" name="graduate_year" required
                                        class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                        placeholder="Enter your graduation year (e.g., 2023)"
                                        value="{{ session('userDetails.entry_year') ?? old('graduate_year') }}">
                                    @error('graduate_year')
                                        <p class="text-red-500 text-sm">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <p class="mb-10 mt-3 text-sm text-cyan">For further details on how your data is used and stored,
                                please see our <a href="{{ route('privacypolicy') }}"
                                    class="text-cyan-100 hover:underline">Privacy Policy</a>
                            </p>
                            <div class="flex justify-between space-x-4">
                                <button type="button" id="prev-btn"
                                    class="bg-btn-cyan-100 w-1/2 rounded-lg border border-gray-400 bg-gray-300 px-14 py-2 text-center text-xl font-medium text-gray-500">
                                    Previous
                                </button>
                                <button type="submit"
                                    class="bg-btn-cyan w-1/2 rounded-lg bg-cyan px-20 py-2 text-center text-xl font-medium text-white hover:bg-cyan-400">
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
                const form = document.getElementById('registration-form');
                const step1 = document.getElementById('step-1');
                const step2 = document.getElementById('step-2');
                const nextBtn = document.getElementById('next-btn');
                const prevBtn = document.getElementById('prev-btn');
                const graduateYearField = document.querySelector('div.space-y-3:has(input[name="graduate_year"])');
                const entryYearInput = document.querySelector('input[name="entry_year"]');
                const graduateYearInput = document.querySelector('input[name="graduate_year"]');

                // Hide/show graduate year based on role selection
                const roleStudent = document.getElementById('role-student');
                const roleAlumni = document.getElementById('role-alumni');

                function updateGraduateYearVisibility() {
                    if (roleStudent.checked) {
                        // For students: entry_year required, graduate_year not required
                        graduateYearField.style.display = 'none';
                        entryYearInput.setAttribute('required', 'required');
                        graduateYearInput.removeAttribute('required');
                        graduateYearInput.value = ''; // Clear the graduate year value
                    } else if (roleAlumni.checked) {
                        // For alumni: both entry_year and graduate_year required
                        graduateYearField.style.display = 'block';
                        entryYearInput.setAttribute('required', 'required');
                        graduateYearInput.setAttribute('required', 'required');
                    }
                }

                // Add event listeners to radio buttons
                roleStudent.addEventListener('change', updateGraduateYearVisibility);
                roleAlumni.addEventListener('change', updateGraduateYearVisibility);

                // Run on first load when moving to step 2
                nextBtn.addEventListener('click', function() {
                    // Validate role selection
                    const roleSelected = document.querySelector('input[name="role"]:checked');
                    if (!roleSelected) {
                        alert('Please select a role before proceeding.');
                        return;
                    }

                    // Update graduate year visibility before showing step 2
                    updateGraduateYearVisibility();

                    step1.classList.add('hidden');
                    step2.classList.remove('hidden');
                });

                prevBtn.addEventListener('click', function() {
                    step2.classList.add('hidden');
                    step1.classList.remove('hidden');
                });

                @if (session('name'))
                    document.querySelector('input[name="name"]').value = "{{ session('name') }}";
                @endif

                // Add entry year change event to auto-calculate graduate year
                entryYearInput.addEventListener('change', function() {
                    if (this.value && !isNaN(this.value) && roleStudent.checked) {
                        // Only auto-calculate for students (typical 4-year program)
                        graduateYearInput.value = parseInt(this.value) + 4;
                    }
                });
                if (roleStudent.checked || roleAlumni.checked) {
                    updateGraduateYearVisibility();
                }
            });
        </script>
    </section>
@endsection

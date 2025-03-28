@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white sm:mt-0">
        <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">
            <div class="flex w-full justify-center px-6 py-10 sm:max-w-xl md:px-24 md:py-11 lg:max-w-5xl xl:max-w-6xl">
                <div class="w-full max-w-lg rounded-lg border-4 border-cyan-100 bg-white px-6 py-7">
                    <h1 class="text-3xl text-cyan">Registration Form</h1>
                    <h2 class="text-xl text-cyan">Please choose your role</h2>

                    <div class="mt-5 w-full" id="step-1">
                        <ol class="mb-4 flex w-full items-center space-x-2 sm:mb-5">
                            <li
                                class="flex w-full items-center after:inline-block after:h-1 after:w-full after:rounded-full after:border-4 after:border-b after:border-blue-600 after:content-['']">
                            </li>
                            <li
                                class="flex w-full items-center after:inline-block after:h-1 after:w-full after:rounded-full after:border-4 after:border-b after:border-gray-400 after:content-['']">
                            </li>
                        </ol>
                        <form id="registration-form">
                            <div class="my-10">
                                <div class="space-y-4">
                                    <div class="flex items-center">
                                        <input id="default-radio-1" type="radio" value="student" name="role"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                        <label for="default-radio-1"
                                            class="ms-2 text-xl font-medium text-cyan dark:text-gray-300">Student</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input checked id="default-radio-2" type="radio" value="alumni" name="role"
                                            class="h-4 w-4 border-gray-300 bg-gray-100 text-blue-600 focus:ring-2 focus:ring-blue-500">
                                        <label for="default-radio-2"
                                            class="ms-2 text-xl font-medium text-cyan dark:text-gray-300">Alumni</label>
                                    </div>
                                </div>
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
                        </form>
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
                        <h2 class="text-xl text-cyan">Enter your details</h2>
                        <div class="space-y-7">
                            <div class="space-y-3">
                                <label class="text-xl font-medium text-cyan dark:text-gray-300">Name</label>
                                <input type="text" name="name"
                                    class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                    placeholder="Enter your full name (e.g., Budi Santoso)">
                            </div>
                            <div class="space-y-3">
                                <label class="text-xl font-medium text-cyan dark:text-gray-300">NIM</label>
                                <input type="text" name="nim"
                                    class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                    placeholder="Enter your student ID number">
                            </div>
                            <div class="space-y-3">
                                <label class="text-xl font-medium text-cyan dark:text-gray-300">Graduate Year</label>
                                <input type="text" name="graduate_year"
                                    class="w-full rounded-full border-gray-300 bg-gray-100 px-4 text-sm"
                                    placeholder="Enter your graduation year (e.g., 2023)">
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
                </div>
            </div>
        </div>
        <script>
            document.getElementById('next-btn').addEventListener('click', function() {
                document.getElementById('step-1').classList.add('hidden');
                document.getElementById('step-2').classList.remove('hidden');
            });
            document.getElementById('prev-btn').addEventListener('click', function() {
                document.getElementById('step-2').classList.add('hidden');
                document.getElementById('step-1').classList.remove('hidden');
            });
        </script>
    </section>
@endsection

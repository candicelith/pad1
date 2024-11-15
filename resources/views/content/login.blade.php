@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">
            <div
                class="mx-10 w-full rounded-lg bg-cyan-100 px-8 py-10 shadow-lg sm:max-w-xl sm:px-14 sm:py-16 lg:max-w-5xl lg:px-20 xl:max-w-6xl">
                <h1 class="text-center text-2xl leading-tight tracking-tight text-white sm:text-3xl md:text-4xl">
                    Login
                </h1>
                <p class="my-4 text-center text-base text-white">Please log in if you are part of UGM-Software Engineering
                    students</p>
                <form class="mx-auto max-w-4xl space-y-6" action="#">
                    {{-- Email Input --}}
                    <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-6">
                        <label for="email" class="mb-2 shrink-0 text-lg text-white lg:mb-0 lg:w-40 lg:text-xl">
                            E-mail
                        </label>
                        <input type="email" name="email" id="email" {{-- Nama : email --}}
                            class="focus:ring-primary-600 focus:border-primary-600 w-full rounded-full border border-gray-900 bg-gray-50 p-4 text-gray-900"
                            placeholder="Enter your UGM E-mail" required />
                    </div>

                    {{-- Password Input --}}
                    <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-6">
                        <label for="password" class="mb-2 shrink-0 text-lg text-white lg:mb-0 lg:w-40 lg:text-xl">
                            Password
                        </label>
                        <input type="password" name="password" id="password" {{-- Nama : password --}}
                            class="focus:ring-primary-600 focus:border-primary-600 w-full rounded-full border border-gray-900 bg-gray-50 p-4 text-gray-900"
                            placeholder="Enter your NIU" required />
                    </div>

                    {{-- Log In Button --}}
                    <div class="flex justify-end">
                        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="submit"
                            class="w-full rounded-full border border-gray-900 bg-white px-5 py-3 text-lg text-cyan hover:bg-cyan hover:text-white focus:ring-4 focus:ring-cyan lg:w-48">
                            Log In
                        </button>
                        {{-- popup modal --}}
                        <div id="popup-modal" tabindex="-1"
                            class="fixed left-0 right-0 top-0 z-50 hidden h-full max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                            <div class="relative max-h-full w-full max-w-md p-4">
                                <div class="relative rounded-lg bg-red-300 shadow">
                                    <div class="p-4 text-center md:p-5">
                                        <h3 class="mb-5 text-lg font-normal text-red-950">
                                            Login failed. Please check your email or password and try again.
                                        </h3>
                                        <button data-modal-hide="popup-modal" type="button"
                                            class="ms-3 rounded-full border border-gray-900 bg-white px-5 py-2.5 text-sm font-medium text-red-950 hover:bg-red-950 hover:text-white focus:z-10 focus:outline-none focus:ring-4 focus:ring-red-950">
                                            Close
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script>
        function navigateToHome() {
            window.location.href = '{{ route('home') }}';
        }
    </script>
@endsection

@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white sm:mt-0">
        <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">
            <div
                class="mx-10 w-full rounded-lg bg-cyan-100 px-8 py-10 shadow-lg sm:max-w-xl sm:px-14 sm:py-16 lg:max-w-5xl lg:px-20 xl:max-w-6xl">
                <h1 class="text-center text-2xl leading-tight tracking-tight text-white sm:text-3xl md:text-4xl">
                    Login
                </h1>
                <p class="my-4 text-center text-sm text-white sm:text-base">Please log in if you are part of UGM-Software
                    Engineering
                    students</p>
                <form class="mx-auto max-w-4xl space-y-6" action="{{ route('authenticate') }}" method="POST">
                    @csrf
                    {{-- Email Input --}}
                    <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-6">
                        <label for="email" class="mb-2 shrink-0 text-base text-white sm:text-lg lg:mb-0 lg:w-40">
                            E-mail
                        </label>
                        <input type="email" name="email" id="email" {{-- Nama : email --}}
                            class="focus:ring-primary-600 focus:border-primary-600 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 placeholder:text-sm sm:p-4 sm:text-base"
                            placeholder="Enter your UGM E-mail" required />
                    </div>

                    {{-- Password Input --}}
                    <div class="flex flex-col lg:flex-row lg:items-center lg:space-x-6">
                        <label for="password" class="mb-2 shrink-0 text-base text-white sm:text-lg lg:mb-0 lg:w-40">
                            Password
                        </label>
                        <input type="password" name="password" id="password" {{-- Nama : password --}}
                            class="focus:ring-primary-600 focus:border-primary-600 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 placeholder:text-sm sm:p-4 sm:text-base"
                            placeholder="Enter your NIU" required />
                    </div>

                    {{-- Log In Button --}}
                    <div class="flex justify-end">
                        <button type="submit"
                            class="w-full rounded-full border border-gray-900 bg-white px-5 py-1 text-base text-cyan hover:bg-cyan hover:text-white focus:ring-4 focus:ring-cyan sm:py-3 sm:text-lg lg:w-48">
                            Log In
                        </button>

                        {{-- Popup Modal Trigger --}}
                        @if ($errors->has('email') || $errors->has('password'))
                            {{-- Error Listener --}}
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    document.getElementById("popup-modal").classList.remove("hidden");
                                    document.getElementById("modal-backdrop").classList.remove("hidden");
                                });
                            </script>
                        @endif
                    </div>


                    {{-- Backdrop for Modal --}}
                    <div id="modal-backdrop" class="fixed inset-0 z-40 hidden bg-black bg-opacity-50 backdrop-blur-sm">
                    </div>
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

            <script>
                function closeModal() {
                    document.getElementById("popup-modal").classList.add("hidden");
                    document.getElementById("modal-backdrop").classList.add("hidden");
                }
            </script>

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

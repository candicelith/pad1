@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white sm:mt-0">
        <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">

            <div
                class="mx-1 flex w-full flex-col overflow-hidden rounded-3xl shadow-lg sm:max-w-xl md:max-w-3xl md:flex-row md:px-0 lg:max-w-5xl">
                <!-- Sign In Section -->
                <div class="flex w-full flex-col justify-center bg-cyan-100 px-6 py-10 sm:px-16 sm:py-12 md:w-1/2">
                    <div class="space-y-4 text-white sm:space-y-12">
                        <div class="space-y-2 sm:space-y-3">
                            <h1 class="text-start text-2xl leading-tight tracking-tight md:text-5xl">Sign In</h1>
                            <h2 class="text-xl">Your Future Starts Here!</h2>
                        </div>
                        <div class="space-y-2 sm:space-y-3">
                            <div class="flex items-center justify-center rounded-xl bg-white pe-8">
                                <img src="{{ asset('assets/Google Icon.svg') }}" alt="" class="h-14 w-14 p-4">
                                <button class="px-4 py-5" onclick="window.location.href='/auth/google/redirect'">
                                    <p class="text-center text-sm text-gray-400 sm:text-lg">Sign In With Google</p>
                                </button>
                            </div>
                            <p class="text-center text-sm text-white">Sign in with your UGM account</p>
                        </div>
                    </div>
                </div>
                <!-- Image Section -->
                <div class="w-full md:w-1/2">
                    <img src="{{ asset('assets/login-photo.jpg') }}" alt="Login"
                        class="h-full w-full object-cover md:h-full">
                </div>
            </div>

        </div>

        <script>
            function closeModal() {
                document.getElementById("popup-modal").classList.add("hidden");
                document.getElementById("modal-backdrop").classList.add("hidden");
            }

            function navigateToHome() {
                window.location.href = '{{ route('home') }}';
            }
        </script>
    </section>
@endsection

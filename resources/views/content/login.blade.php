@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white sm:mt-0">
        <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">
            <div class="flex w-full px-6 py-10 sm:max-w-xl md:px-24 md:py-11 lg:max-w-5xl xl:max-w-6xl">

                <div class="flex w-1/2 flex-col justify-center rounded-l-3xl bg-cyan-100 shadow-lg sm:px-20 sm:py-10">
                    <div class="space-y-12 text-white">
                        <div class="space-y-3">
                            <h1 class="text-start text-2xl leading-tight tracking-tight md:text-5xl">Sign In</h1>
                            <h2 class="text-xl">Your Future Starts Here!</h2>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-center rounded-xl bg-white pe-8">
                                <img src="{{ asset('assets/Google Icon.svg') }}" alt="" class="p-4">
                                <button class="px-4 py-5" onclick="window.location.href='/auth/google/redirect'">
                                    <p class="text-center text-lg text-gray-400">Sign In With Google</p>
                                </button>
                            </div>
                            <p class="text-center text-sm text-white">Sign in with your UGM account</p>
                        </div>
                    </div>
                </div>

                <!-- Image -->
                <div class="min-h-full flex-1">
                    <img src="{{ asset('assets/login-photo.jpg') }}" alt=""
                        class="h-full w-full rounded-r-3xl object-cover">
                </div>
            </div>

        </div>

        <script>
            function closeModal() {
                document.getElementById("popup-modal").classList.add("hidden");
                document.getElementById("modal-backdrop").classList.add("hidden");
            }
        </script>
    </section>

    <script>
        function navigateToHome() {
            window.location.href = '{{ route('home') }}';
        }
    </script>
@endsection

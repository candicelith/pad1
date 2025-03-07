@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white sm:mt-0">
        <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">
            <div
                class="mx-10 w-full rounded-3xl bg-cyan-100 px-24 py-10 shadow-lg sm:max-w-xl md:px-24 md:py-11 lg:max-w-5xl xl:max-w-6xl">
                <div class="flex items-center justify-between">
                    <div class="flex w-80 flex-col space-y-20">
                        <div class="space-y-3 text-white">
                            <p class="text-start text-base sm:text-xl">Welcome!
                            </p>
                            <h1 class="text-start text-2xl leading-tight tracking-tight md:text-5xl">
                                Sign In
                            </h1>
                        </div>
                        <div class="space-y-3 text-white">
                            <h2 class="text-2xl">Your Future Starts Here!</h2>
                            <p class="text-wrap text-base">Sign in to access alumni career paths,
                                job postings, and company insights.</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-center space-y-3">
                        <div class="flex items-center justify-center rounded-xl bg-white pe-8">
                            <img src="{{ asset('assets/Google Icon.svg') }}" alt="" class="p-4">
                            <button class="px-4 py-5 text-center text-lg">Sign In With Google</button>
                        </div>
                        <p class="text-sm text-white">Sign in with your UGM account</p>
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
    </section>

    <script>
        function navigateToHome() {
            window.location.href = '{{ route('home') }}';
        }
    </script>
@endsection

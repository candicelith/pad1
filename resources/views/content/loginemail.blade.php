{{-- @extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white sm:mt-0">
        <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">
            <div
                class="mx-10 w-full rounded-lg bg-cyan-100 px-8 py-10 shadow-lg sm:max-w-xl sm:px-14 sm:py-16 lg:max-w-5xl lg:px-20 xl:max-w-6xl">
                <h1 class="text-center text-2xl leading-tight tracking-tight text-white sm:text-3xl md:text-4xl">
                    Sign In
                </h1>
                <p class="my-4 text-center text-sm text-white sm:text-base">Please log in if you are part of UGM-Software
                    Engineering
                    students
                </p>

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
@endsection --}}

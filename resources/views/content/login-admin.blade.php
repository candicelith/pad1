@extends('layout.headerFooter')

@section('content')
    <section class="mt-28 bg-white sm:mt-0">
        <form action="{{ route('admin.login') }}" method="POST">
            @csrf
            <div class="mx-auto my-16 flex max-w-screen-xl items-center justify-center md:h-screen lg:py-16">
                <div
                    class="mx-10 w-full space-y-12 rounded-lg bg-cyan-100 px-2 py-10 shadow-lg sm:px-14 sm:py-16 lg:max-w-5xl lg:px-20 xl:max-w-4xl xl:px-20">
                    <h1 class="text-center text-4xl leading-tight tracking-tight text-white sm:text-5xl">
                        Log In
                    </h1>

                    <div class="mx-7 space-y-9">
                        <div class="space-y-2">
                            <div class="grid-cols-5 items-center sm:grid">
                                <label class="col-span-1 text-xl text-white" for="email">E-mail</label>
                                <input
                                    class="@error('email') border-2 border-red-400 @enderror col-span-4 rounded-full bg-gray-200 px-4 py-2"
                                    type="email" id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter your E-mail" required>
                            </div>
                            @error('email')
                                <div class="grid grid-cols-5">
                                    <div class="col-span-4 col-start-2">
                                        <p class="text-sm text-red-500">{{ $message }}</p>
                                    </div>
                                </div>
                            @enderror
                        </div>

                        <div class="space-y-2">
                            <div class="grid-cols-5 items-center sm:grid">
                                <label class="col-span-1 text-xl text-white" for="password">Password</label>
                                <input
                                    class="@error('password') border-2 border-red-400 @enderror col-span-4 rounded-full bg-gray-200 px-4 py-2"
                                    type="password" id="password" name="password" placeholder="Enter your Password"
                                    required>
                            </div>
                            @error('password')
                                <div class="grid grid-cols-5">
                                    <div class="col-span-4 col-start-2">
                                        <p class="text-sm text-red-500">{{ $message }}</p>
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end px-4 md:px-8">
                        <button type="submit"
                            class="hover:bg-btn-cyan rounded-2xl border border-black bg-white px-8 py-2 text-cyan hover:bg-cyan hover:text-white">
                            Log In
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </section>

    <script>
        function closeModal() {
            document.getElementById("popup-modal").classList.add("hidden");
            document.getElementById("modal-backdrop").classList.add("hidden");
        }

        function navigateToHome() {
            window.location.href = '{{ route('home') }}';
        }
    </script>
@endsection

@extends('layout.headerFooter')

@section('content')
<section class="bg-white">
    <div class="flex flex-col items-center justify-center py-8 px-4 mx-auto max-w-screen-xl my-16 md:h-screen lg:py-16">
        <div class="w-full py-16 px-8 sm:py-24 sm:px-16 bg-cyan-100 rounded-lg shadow md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700">
            <h1 class="text-2xl md:text-3xl text-center leading-tight tracking-tight text-white mb-6">
                Please log in if you are part of UGM-Software Engineering students
            </h1>
            <form class="space-y-6" action="{{ route('store') }}" method="post"> {{-- Wajib Mengubah Ini --}}
                <!-- Email Input -->
                @csrf
                <div class="flex items-center space-x-4">
                    <label for="email" class="text-xl text-white w-28 shrink-0">E-mail</label>
                    <input type="email" name="email" id="email" {{-- Nama : email --}}
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-primary-600 focus:border-primary-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" required>
                    @if ($errors->has('email'))
                        <div class="text-danger">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <!-- Password Input -->
                <div class="flex items-center space-x-4">
                    <label for="password" class="text-xl text-white w-28 shrink-0">Password</label>
                    <input type="password" name="password" id="password" {{-- Nama : password --}}
                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-primary-600 focus:border-primary-600 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white"
                        placeholder="" required>
                    @if ($errors->has('password'))
                        <div class="text-danger">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <!-- Log In Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="w-40 text-cyan bg-white hover:bg-cyan hover:text-white focus:ring-4 focus:ring-cyan rounded-full text-sm px-5 py-2.5 text-center">
                        Log In
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

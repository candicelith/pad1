@extends('layout.headerFooter')

@section('content')
<section class="bg-white">
    <div class="flex flex-col items-center justify-center py-8 mx-20 my-16 md:h-screen lg:py-0">
        <div class="w-full p-16 bg-cyan-100 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-2xl text-center leading-tight tracking-tight text-white md:text-3xl">
                    Please log in if you are part of UGM-Software Engineering students
                </h1>
                <form class="px-20 py-14 space-y-9 md:space-y-11" action="#">
                    <!-- Email Input -->
                    <div class="flex items-center space-x-4">
                        <label for="email" class="text-xl text-white w-28">
                            E-mail
                        </label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required="">
                    </div>

                    <!-- Password Input -->
                    <div class="flex items-center space-x-4">
                        <label for="password" class="text-xl text-white w-28">
                            Password
                        </label>
                        <input type="password" name="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 rounded-full focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="" required="">
                    </div>

                    <!-- Log In Button aligned with inputs -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="w-40 text-cyan bg-white hover:bg-cyan hover:text-white focus:ring-4 focus:outline-none focus:ring-white rounded-full text-sm px-5 py-2.5 text-center">
                            Log In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

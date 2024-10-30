@extends('layout.headerFooter')

@section('content')

<section class="mt-24 bg-white">
    <form class="w-full sm:max-w-xl sm:px-14 sm:py-16 lg:max-w-5xl lg:px-20 xl:max-w-6xl mx-auto bg-cyan-100 sm:rounded-xl">
        <div class="px-10 py-5">
            <div class="mb-5 mt-5">
                <label for="position" class="block mb-2 text-xl text-white">Position</label>
                <input type="text" id="position" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-full block w-full p-1" required />
            </div>
            <div class="mb-5 mt-5">
                <label for="company" class="block mb-2 text-xl text-white">Company</label>
                <input type="text" id="company" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-full block w-full p-1" required />
            </div>
            <div class="mb-5 mt-5">
                <label for="description" class="block mb-2 text-xl text-white">Description</label>
                <input type="text" id="description" class="block w-full p-6 text-gray-900 border border-gray-900 rounded-xl bg-gray-50 text-base">
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </div>
    </form>
</section>

@endsection

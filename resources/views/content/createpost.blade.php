@extends('layout.headerFooter')

@section('content')

<section class="mt-24 sm:mb-12 bg-white">
    <form class="w-full pt-6 sm:max-w-xl sm:px-14 sm:py-16 lg:max-w-5xl lg:px-20 xl:max-w-6xl mx-auto bg-cyan-100 sm:rounded-xl">
        <div class="px-10">
            <div class="mb-5 mt-5">
                <label for="position" class="block mb-2 text-xl text-white">Position</label>
                <input type="text" id="position" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-full block w-full p-1 px-6" required />
            </div>
            <div class="mb-5 mt-5">
                <label for="position" class="block mb-2 text-xl text-white">Company</label>
                <input type="text" id="company" class="bg-gray-50 border border-gray-900 text-gray-900 text-sm rounded-full block w-full p-1 px-6" required />
            </div>
            <div class="mb-5 mt-5">
                <label for="description" class="block mb-2 text-xl text-white">Description</label>
                <textarea type="text" id="description" class="block w-full pt-2 px-2 text-gray-900 border border-gray-900 rounded-xl bg-gray-50 text-sm"></textarea>
            </div>
            <div class="mb-5 mt-5">
                <label for="responsibility" class="block mb-2 text-xl text-white">Responsibility</label>
                <textarea type="text" id="responsibility" class="block w-full pt-2 px-2 text-gray-900 border border-gray-900 rounded-xl bg-gray-50 text-sm"></textarea>
            </div>
            <div class="mb-5 mt-5">
                <label for="qualification" class="block mb-2 text-xl text-white">Qualification</label>
                <textarea type="text" id="qualification" class="block w-full pt-2 px-2 text-gray-900 border border-gray-900 rounded-xl bg-gray-50 text-sm"></textarea>
            </div>
            <div class="mb-5 mt-5">
                <label for="benefits" class="block mb-2 text-xl text-white">Benefits</label>
                <textarea type="text" id="benefits" class="block w-full pt-2 px-2 text-gray-900 border border-gray-900 rounded-xl bg-gray-50 text-sm"></textarea>
            </div>
            <div class="mb-5 mt-5">
                <label for="file" class="block mb-2 text-xl text-white">File Upload</label>
                <input type="file" id="file" class="block cursor-pointer text-gray-400 border border-gray-900 rounded-xl bg-gray-50 text-xs px-1" />
            </div>

            <button type="submit" class="text-cyan bg-white hover:bg-cyan hover:text-white focus:ring-4 focus:outline-none focus:ring-cyan-100 rounded-full text-sm sm:text-lg w-full sm:w-auto sm:px-10 py-2 text-center mb-4">Post</button>
        </div>
    </form>
</section>

@endsection

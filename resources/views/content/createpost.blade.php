@extends('layout.headerFooter')

@section('content')
    <section class="mt-24 bg-white px-4 sm:mb-12 sm:px-0">
        <form
            class="mx-auto w-full bg-cyan-100 pt-6 sm:max-w-xl sm:rounded-xl sm:px-14 sm:py-16 lg:max-w-5xl lg:px-20 xl:max-w-6xl">
            <div class="px-10">
                <div class="mb-5 mt-5">
                    <label for="position" class="mb-2 block text-xl text-white">Position</label>
                    <input type="text" id="position"
                        class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                        required />
                </div>
                <div class="mb-5 mt-5">
                    <label for="position" class="mb-2 block text-xl text-white">Company</label>
                    <input type="text" id="company"
                        class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                        required />
                </div>
                <div class="mb-5 mt-5">
                    <label for="description" class="mb-2 block text-xl text-white">Description</label>
                    <textarea type="text" id="description"
                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 pt-2 text-sm text-gray-900"></textarea>
                </div>
                <div class="mb-5 mt-5">
                    <label for="responsibility" class="mb-2 block text-xl text-white">Responsibility</label>
                    <textarea type="text" id="responsibility"
                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 pt-2 text-sm text-gray-900"></textarea>
                </div>
                <div class="mb-5 mt-5">
                    <label for="qualification" class="mb-2 block text-xl text-white">Qualification</label>
                    <textarea type="text" id="qualification"
                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 pt-2 text-sm text-gray-900"></textarea>
                </div>
                <div class="mb-5 mt-5">
                    <label for="benefits" class="mb-2 block text-xl text-white">Benefits</label>
                    <textarea type="text" id="benefits"
                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 pt-2 text-sm text-gray-900"></textarea>
                </div>
                <div class="mb-5 mt-5">
                    <label for="file" class="mb-2 block text-xl text-white">File Upload</label>
                    <input type="file" id="file"
                        class="block w-full cursor-pointer rounded-xl border border-gray-900 bg-gray-50 px-1 text-xs text-gray-400" />
                </div>

                <button type="submit"
                    class="mb-4 w-full rounded-full bg-white py-2 text-center text-sm text-cyan hover:bg-cyan hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 sm:w-auto sm:px-10 sm:text-lg">
                    Post
                </button>
            </div>
        </form>
    </section>
@endsection

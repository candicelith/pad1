@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-5 pt-4 sm:ml-64">
            <div class="mx-2 mt-14">
                <h2 class="flex justify-center text-4xl">Banner</h2>
                <div class="relative sm:mx-10">
                    <div class="top-0 z-20 flex justify-between bg-white pb-4">

                        {{-- Add News Button --}}
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="rounded-xl bg-cyan p-2 shadow-md hover:bg-cyan-400 hover:text-cyan">
                            <svg class="h-6 w-6 text-white hover:text-cyan" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14m-7 7V5" />
                            </svg>
                        </button>

                        {{-- Add News Modal --}}
                        <div id="crud-modal" tabindex="-1" aria-hidden="true"
                            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                            <div class="relative max-h-full w-full max-w-5xl p-4">
                                <div class="relative rounded-lg border-4 border-cyan-100 bg-white p-2 shadow">
                                    <div
                                        class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 text-center md:p-5">
                                        <h3 class="text-2xl text-cyan sm:text-start">
                                            Add New Banner
                                        </h3>
                                        <button type="button" class="inline-flex items-center"
                                            data-modal-toggle="crud-modal">
                                            <svg class="h-6 w-6 text-cyan" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="3" d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                        </button>
                                    </div>

                                    <form class="scrollbar-modal max-h-96 overflow-y-auto p-4 md:p-5" method="POST"
                                        action="" enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                            <div class="col-span-2 sm:col-span-2">
                                                <label for="banner_title" class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                    Title <span
                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                </label>
                                                <input type="text" name="banner_title" id="banner_title"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="Enter title" required>
                                            </div>
                                            <div class="col-span-2 sm:col-span-2">
                                                <label for="banner_content"
                                                    class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                    Content <span
                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                </label>
                                                <textarea type="text" name="banner_content" id="banner_content"
                                                    class="block h-1/2 w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="Enter content" required></textarea>
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="banner_image" class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                    Banner Image <span
                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                </label>
                                                <input type="file" name="banner_image" id="banner_image"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5">
                                            </div>
                                        </div>

                                        <div class="flex justify-end space-x-3 pt-2">
                                            <button type="submit"
                                                class="bg-btn-cyan rounded-md bg-cyan px-6 py-2 text-xl text-white transition hover:bg-cyan-400 hover:text-cyan">
                                                Create
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Table --}}
                    <div>
                        <table id="search-table" class="w-full text-left text-sm">
                            <thead class="bg-lightblue text-base">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-sm font-normal text-black sm:text-base">
                                        <span>NO</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>BANNER IMAGE</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm font-normal text-black sm:text-base">
                                        <span>BANNER TITLE</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>BANNER CONTENT</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm font-normal text-black sm:text-base">
                                        <span>ACTION</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-300 bg-white hover:bg-gray-50">
                                    <th scope="row" class="whitespace-nowrap px-6 py-4 text-sm text-black sm:text-base">
                                        1
                                    </th>
                                    <td class="px-6 py-4 text-sm text-black sm:text-base">
                                        <img src="" alt="Banner Image" class="h-10 w-10 rounded-full">
                                    </td>
                                    <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                        Judul
                                    </td>
                                    <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                        Isi
                                    </td>
                                    <td class="px-6 py-4">
                                        <button data-modal-target="crud-modal1" data-modal-toggle="crud-modal1"
                                            href=""
                                            class="rounded-lg bg-cyan p-1.5 text-center text-sm text-white shadow-md hover:bg-cyan-400 hover:text-cyan-100 sm:p-2 sm:text-base">
                                            <svg class="h-6 w-6 text-white hover:text-cyan" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                            </svg>
                                        </button>

                                        <div id="crud-modal1" tabindex="-1" aria-hidden="true"
                                            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                                            <div class="relative max-h-full w-full max-w-5xl p-4">
                                                <div
                                                    class="relative rounded-lg border-4 border-cyan-100 bg-white p-2 shadow">
                                                    <div
                                                        class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 text-center md:p-5">
                                                        <h3 class="text-2xl text-cyan sm:text-start">
                                                            Edit Banner
                                                        </h3>
                                                        <button type="button" class="inline-flex items-center"
                                                            data-modal-hide="crud-modal1">
                                                            <svg class="h-6 w-6 text-cyan" aria-hidden="true"
                                                                xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" fill="none" viewBox="0 0 24 24">
                                                                <path stroke="currentColor" stroke-linecap="round"
                                                                    stroke-linejoin="round" stroke-width="3"
                                                                    d="M6 18 17.94 6M18 18 6.06 6" />
                                                            </svg>
                                                        </button>
                                                    </div>

                                                    <form class="scrollbar-modal max-h-96 overflow-y-auto p-4 md:p-5"
                                                        method="POST" action="" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                            <div class="col-span-2 sm:col-span-2">
                                                                <label for="banner_title"
                                                                    class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                                    Title <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                                </label>
                                                                <input type="text" name="banner_title"
                                                                    id="banner_title"
                                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5"
                                                                    placeholder="Enter title" required>
                                                            </div>
                                                            <div class="col-span-2 sm:col-span-2">
                                                                <label for="banner_content"
                                                                    class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                                    Content <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                                </label>
                                                                <textarea type="text" name="banner_content" id="banner_content"
                                                                    class="block h-1/2 w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5"
                                                                    placeholder="Enter content" required></textarea>
                                                            </div>
                                                            <div class="col-span-2 sm:col-span-1">
                                                                <label for="banner_image"
                                                                    class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                                    Banner Image <span
                                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                                </label>
                                                                <input type="file" name="banner_image"
                                                                    id="banner_image"
                                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5">
                                                            </div>
                                                        </div>

                                                        <div class="flex justify-end space-x-3 pt-2">
                                                            <button type="submit"
                                                                class="bg-btn-cyan rounded-md bg-cyan px-6 py-2 text-xl text-white transition hover:bg-cyan-400 hover:text-cyan">
                                                                Create
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <button href=""
                                            class="rounded-lg bg-cyan p-1.5 text-center text-sm text-white shadow-md hover:bg-cyan-400 hover:text-cyan-100 sm:p-2 sm:text-base">
                                            <svg class="h-6 w-6 text-white hover:text-cyan" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z" />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: false,
                sortable: false
            });
        }
    </script>
@endsection

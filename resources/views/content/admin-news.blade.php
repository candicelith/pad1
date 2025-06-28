@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-5 pt-4 sm:ml-64">
            <div class="mx-2 mt-14">
                <h2 class="flex justify-center text-4xl">Banner</h2>
                <div class="relative sm:mx-10">
                    @if (Session::has('approved'))
                        <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-lightgreen p-4 text-center text-sm text-green-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                            role="alert">
                            {!! Session::get('approved') !!}
                        </div>
                    @elseif (Session::has('rejected'))
                        <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-red-300 p-4 text-center text-sm text-red-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                            role="alert">
                            {!! Session::get('rejected') !!}
                        </div>
                    @endif
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
                                        action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                            <div class="col-span-2 sm:col-span-2">
                                                <label for="heading" class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                    Title
                                                </label>
                                                <input type="text" name="heading" id="heading"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="Enter title">
                                            </div>
                                            <div class="col-span-2 sm:col-span-2">
                                                <label for="description" class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                    Content
                                                </label>
                                                <textarea name="description" id="description"
                                                    class="block h-1/2 w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="Enter content"></textarea>
                                            </div>
                                            <div class="col-span-2 sm:col-span-1">
                                                <label for="banner_image" class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                    Banner Image <span
                                                        class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                                </label>
                                                <input type="file" name="banner_image" id="banner_image"
                                                    class="rounded-full border" onchange="checkFileSize(this)" required>
                                            </div>
                                        </div>
                                        <p class="cv-error mt-1 text-sm text-red-500"></p>
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
                                @foreach ($newss as $index => $news)
                                    <tr class="border-b border-gray-300 bg-white hover:bg-gray-50">
                                        <th scope="row"
                                            class="whitespace-nowrap px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-sm text-black sm:text-base">
                                            <img src="{{ asset('storage/' . $news->banner_image) }}" alt="Banner Image"
                                                 class="max-w-full h-auto w-40 rounded-md object-cover">
                                        </td>
                                        <td class="px-6 py-4 text-sm text-black sm:text-base max-w-xs truncate">
                                            {{ $news->heading }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 font-normal text-black sm:text-base max-w-xs truncate">
                                            {{ $news->description }}
                                        </td>
                                        <td class="px-6 py-4 row">
                                            <button data-modal-target="edit-modal-{{ $news->id }}"
                                                data-modal-toggle="edit-modal-{{ $news->id }}" href=""
                                                class="rounded-lg bg-cyan p-1.5 text-center text-sm text-white shadow-md hover:bg-cyan-400 hover:text-cyan-100 sm:p-2 sm:text-base">
                                                <svg class="h-6 w-6 text-white hover:text-cyan" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M10.779 17.779 4.36 19.918 6.5 13.5m4.279 4.279 8.364-8.643a3.027 3.027 0 0 0-2.14-5.165 3.03 3.03 0 0 0-2.14.886L6.5 13.5m4.279 4.279L6.499 13.5m2.14 2.14 6.213-6.504M12.75 7.04 17 11.28" />
                                                </svg>
                                            </button>

                                            <div id="edit-modal-{{ $news->id }}" tabindex="-1" aria-hidden="true"
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
                                                                data-modal-hide="edit-modal-{{ $news->id }}">
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
                                                            method="POST"
                                                            action="{{ route('admin.news.update', ['id' => $news->id]) }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                                                <div class="col-span-2 sm:col-span-2">
                                                                    <label for="heading"
                                                                        class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                                        Title
                                                                        Title
                                                                    </label>
                                                                    <input type="text" name="heading" id="heading"
                                                                        class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5"
                                                                        placeholder="Enter title"
                                                                        placeholder="Enter title"
                                                                        value="{{ $news->heading }}">
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-2">
                                                                    <label for="description"
                                                                        class="mb-2 block text-sm text-cyan sm:text-2xl">
                                                                        Content
                                                                        Content
                                                                    </label>
                                                                    <textarea type="text" name="description" id="description"
                                                                        class="block h-1/2 w-full rounded-xl border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-cyan dark:placeholder-gray-400 sm:p-2.5"
                                                                        placeholder="Enter content">{{ $news->description }}</textarea>
                                                                </div>
                                                                <div class="col-span-2 sm:col-span-1">
                                                                    <label for="banner_image"
                                                                        class="mb-2 block text-sm text-cyan sm:text-2xl">Banner
                                                                        Image <span
                                                                            class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span></label>
                                                                    <input type="file" name="banner_image"
                                                                        id="banner_image" class="rounded-full border"
                                                                        onchange="checkFileSize(this)" required>
                                                                </div>
                                                            </div>
                                                            <p class="cv-error mt-1 text-sm text-red-500"></p>
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

                                            <button type="button" onclick="submitDelete({{ $news->id }})"
                                                class="bg-btn-cyan rounded-lg bg-cyan p-1.5 text-center text-sm text-white shadow-md hover:bg-cyan-400 hover:text-cyan-100 sm:p-2 sm:text-base">
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{-- TEMPEL FORM HAPUS DI SINI --}}
        <form id="delete-form" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
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

        function submitDelete(id) {
            if (!confirm('Are you sure you want to delete this news?')) return;

            const form = document.getElementById('delete-form');
            form.action = "{{ route('admin.news.delete', '') }}/" + id;
            form.submit();
        }

        function checkFileSize(input) {
            const form = input.closest('form');
            if (!form) {
                console.error("Could not find parent form for the input element.");
                return;
            }

            const errorElement = form.querySelector('.cv-error');
            if (!errorElement) {
                console.error("Could not find the .cv-error element within the form.");
                return;
            }

            const file = input.files[0];
            if (!file) {
                errorElement.textContent = "";
                return;
            }

            const maxSizeMB = 4;
            const allowedTypes = ['image/jpeg', 'image/png'];

            // File size check
            if (file.size > maxSizeMB * 1024 * 1024) {
                errorElement.textContent = `File is too large. Maximum allowed size is ${maxSizeMB} MB.`;
                input.value = ""; // Clear the invalid file input
                return;
            }

            // File Type Check
            if (!allowedTypes.includes(file.type)) {
                errorElement.textContent = "Invalid file format. Only JPG or PNG images are allowed.";
                input.value = ""; // Clear the invalid file input
                return;
            }

            // If all checks pass, clear the error message
            errorElement.textContent = "";
        }
    </script>
@endsection

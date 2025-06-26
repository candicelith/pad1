@extends('layout.admin-headerNav')

@section('admincontent')
    <section>

        <div class="mt-5 pt-4 sm:ml-64">
            <div class="mx-2 mt-14">

                @if ($errors->any())
                    <div class="mb-4 rounded-md bg-red-100 p-4 text-red-700 dark:bg-red-200 dark:text-red-800">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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

                <h2 class="flex justify-center text-4xl">Company Management</h2>
                <div class="relative sm:mx-10">
                    <div class="top-0 z-20 flex justify-between bg-white pb-4">

                        {{-- Add Company Button --}}
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="group rounded-xl bg-cyan p-2 shadow-md hover:bg-cyan-400 group-hover:text-cyan">
                            <svg class="h-6 w-6 text-white group-hover:text-cyan" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14m-7 7V5" />
                            </svg>
                        </button>


                        {{-- Add Company Modal --}}
                        <div id="crud-modal" tabindex="-1" aria-hidden="true"
                            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                            <div class="relative max-h-full w-full max-w-5xl p-4">
                                <div class="relative rounded-lg border-4 border-cyan-100 bg-white p-2 shadow">
                                    <div
                                        class="flex items-center justify-between rounded-t border-b-4 border-cyan-100 text-center md:p-5">
                                        <h3 class="text-2xl text-cyan sm:text-start">
                                            Add New Company
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

                                    <form class="scrollbar-modal max-h-96 space-y-8 overflow-y-auto p-4 md:p-5"
                                        method="POST" action="{{ route('admin.company.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="relative h-24 w-24 sm:h-32 sm:w-32">
                                            <div
                                                class="h-full w-full overflow-hidden rounded-full border-4 border-cyan bg-gray-100">
                                                <img id="preview-image" class="h-full w-full object-cover" src=""
                                                    alt="Profile Picture">
                                            </div>

                                            <label for="company_picture"
                                                class="hover:bg-cyan-600 absolute bottom-0 right-0 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-cyan text-white shadow-md transition-all sm:h-10 sm:w-10">
                                                <svg class="h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M3 9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M12 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2" d="M9 5h6l-1 4" />
                                                </svg>
                                            </label>

                                            {{-- Hidden Input for Company Picture --}}
                                            <input id="company_picture" name="company_picture" type="file"
                                                accept="image/*" class="hidden"
                                                onchange="previewImage(this)">
                                        </div>
                                        <p id="company_picture-error" class="text-sm text-red-500"></p>


                                        <div>
                                            <label for="company_name" class="mb-1 block text-2xl text-cyan">
                                                Name <span
                                                    class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                            </label>
                                            <input type="text" name="company_name" id="company_name"
                                                class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                value="{{ old('company_name') }}"
                                                placeholder="Enter the company name (e.g., ABC Tech Solutions)" required>
                                        </div>

                                        <div>
                                            <label for="company_field" class="mb-1 block text-2xl text-cyan">
                                                Industry Type <span
                                                    class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                            </label>
                                            <input type="text" name="company_field" id="company_field"
                                                class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                value="{{ old('company_field') }}"
                                                placeholder="Enter the industry type (e.g., IT, Finance, Healthcare)"
                                                required>
                                        </div>

                                        <div>
                                            <label for="company_address" class="mb-1 block text-2xl text-cyan">
                                                Location <span
                                                    class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                            </label>
                                            <input type="text" name="company_address" id="company_address"
                                                class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                value="{{ old('company_address') }}"
                                                placeholder="Enter city and country (e.g., Jakarta, Indonesia)" required>
                                        </div>

                                        <div>
                                            <label for="company_description" class="mb-1 block text-2xl text-cyan">
                                                Description <span
                                                    class="relative top-1 -ms-2 align-baseline text-4xl leading-none text-red-500">*</span>
                                            </label>
                                            <textarea name="company_description" id="company_description" rows="4"
                                                class="w-full rounded-md border border-gray-300 bg-gray-200 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                                placeholder="Briefly describe the company and its mission" required>{{ old('company_description') }}</textarea>
                                        </div>

                                        {{-- Gallery Upload --}}
                                        <div class="md:col-span-3">
                                            <label for="company_gallery"
                                                class="block text-lg font-medium text-cyan">Company Gallery</label>
                                            <p class="text-sm text-gray-500 mb-2">You can add multiple photos of your
                                                company (max 5, each under 2MB).</p>
                                            <input type="file" name="company_gallery[]" id="company_gallery" multiple
                                                accept="image/*"
                                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-200 file:text-gray-700 hover:file:bg-gray-300">
                                            <p id="company_gallery-error" class="text-sm text-red-500"></p>
                                            <div id="gallery-preview"
                                                class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4"></div>
                                        </div>

                                        <div class="flex justify-end space-x-3 pt-4">
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

                    {{-- Companies Table --}}
                    <div class="">
                        <table id="search-table" class="w-full text-left text-sm">
                            <thead class="bg-lightblue text-base">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-sm font-normal text-black sm:text-base">
                                        <span>NO</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm font-normal text-black sm:text-base">
                                        <span>COMPANY NAME</span>
                                    </th>
                                    <th scope="col"
                                        class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY FIELD</span>
                                    </th>
                                    <th scope="col"
                                        class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY ADDRESS</span>
                                    </th>
                                    <th scope="col"
                                        class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY DESCRIPTION</span>
                                    </th>
                                    <th scope="col"
                                        class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY PICTURE</span>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-sm font-normal text-black sm:text-base">
                                        <span>ACTION</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($companies as $index => $company)
                                    <tr class="border-b border-black bg-white hover:bg-gray-50">
                                        <th scope="row"
                                            class="whitespace-nowrap px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $company->company_name }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $company->company_field }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $company->company_address }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $company->company_description }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                            <img src="{{ asset('storage/company/' . $company->company_picture) }}"
                                                alt="Company Logo" class="h-10 w-10 rounded-full">
                                        <td class="flex space-x-2 px-6 py-4">
                                            <a href="{{ route('admin.company.detail', ['id' => $company->id_company]) }}"
                                                class="rounded-lg bg-cyan px-4 py-2 text-center text-sm text-white shadow-md hover:bg-cyan-400 hover:text-cyan sm:px-7 sm:text-base">
                                                Detail
                                            </a>
                                            <form
                                                action="{{ route('admin.company.delete', ['id' => $company->id_company]) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?');"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red rounded-lg px-4 py-2 text-center text-sm text-black shadow-md hover:bg-red-400 hover:text-cyan sm:px-7 sm:text-base">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script>
        if (document.getElementById("search-table") && typeof simpleDatatables.DataTable !== 'undefined') {
            const dataTable = new simpleDatatables.DataTable("#search-table", {
                searchable: true,
                sortable: false
            });
        }

        function previewImage(input) {
            const file = input.files[0];
            const errorElement = document.getElementById('company_picture-error');
            const preview = document.getElementById('preview-image');

            if (!file) {
                preview.src = "";
                errorElement.textContent = "";
                return;
            }

            const maxFileSize = 2 * 1024 * 1024; // 2MB
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

            if (file.size > maxFileSize) {
                errorElement.textContent = 'File size must be less than 2MB.';
                input.value = ''; // Clear the input
                preview.src = "";
                return;
            }

            if (!allowedTypes.includes(file.type)) {
                errorElement.textContent = 'Invalid file type. Please select a JPG, PNG, or GIF.';
                input.value = ''; // Clear the input
                preview.src = "";
                return;
            }

            errorElement.textContent = '';
            preview.src = URL.createObjectURL(file);
        }

        document.getElementById('company_gallery').addEventListener('change', function(event) {
            const previewContainer = document.getElementById('gallery-preview');
            const errorElement = document.getElementById('company_gallery-error');
            previewContainer.innerHTML = ''; // Clear previous previews
            errorElement.textContent = ''; // Clear previous errors
            const files = event.target.files;

            if (files.length > 5) {
                errorElement.textContent = 'You can only upload a maximum of 5 images for the gallery.';
                // Clear the file input
                event.target.value = '';
                return;
            }

            const maxFileSize = 2 * 1024 * 1024; // 2MB

            for (const file of files) {
                if (file.size > maxFileSize) {
                    errorElement.textContent = `File "${file.name}" is too large. Maximum size is 2MB.`;
                    event.target.value = ''; // Clear the input
                    previewContainer.innerHTML = ''; // Clear previews
                    return;
                }
            }


            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const imgWrapper = document.createElement('div');
                        imgWrapper.classList.add('relative', 'w-full', 'h-24');
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('h-full', 'w-full', 'object-cover', 'rounded-lg',
                            'shadow-md');
                        imgWrapper.appendChild(img);
                        previewContainer.appendChild(imgWrapper);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
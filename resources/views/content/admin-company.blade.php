@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-5 pt-4 sm:ml-64">
            <div class="mx-2 mt-14">
                <h2 class="flex justify-center text-4xl">Company Management</h2>
                <div class="relative sm:mx-10">
                    <div class="top-0 z-20 flex justify-between bg-white pb-4">
                        {{-- Add Company Button --}}
                        <button
                            data-modal-target="crud-modal"
                            data-modal-toggle="crud-modal"
                            class="rounded-xl bg-cyan-100 p-2 shadow-md hover:bg-white"
                        >
                            <svg class="h-6 w-6 text-white hover:text-cyan-100" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14m-7 7V5" />
                            </svg>
                        </button>

                        {{-- Add Company Modal --}}
                        <div
                            id="crud-modal"
                            tabindex="-1"
                            aria-hidden="true"
                            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0"
                        >
                            <div class="relative max-h-full w-full max-w-5xl p-4">
                                <div class="relative rounded-lg bg-cyan-100 p-2 shadow">
                                    <div class="flex items-center justify-between rounded-t text-center md:p-5">
                                        <h3 class="text-xl text-white sm:text-start">
                                            Add New Company
                                        </h3>
                                    </div>

                                    <form
                                        class="p-4 md:p-5"
                                        method="POST"
                                        action="{{ route('admin.company.store') }}"
                                        enctype="multipart/form-data"
                                    >
                                        @csrf
                                        <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                            <div class="col-span-2 sm:col-span-1">
                                                <label
                                                    for="company_name"
                                                    class="mb-2 block text-sm text-white sm:text-lg"
                                                >
                                                    Company Name
                                                </label>
                                                <input
                                                    type="text"
                                                    name="company_name"
                                                    id="company_name"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="Enter company name"
                                                    required
                                                >
                                            </div>

                                            <div class="col-span-2 sm:col-span-1">
                                                <label
                                                    for="company_field"
                                                    class="mb-2 block text-sm text-white sm:text-lg"
                                                >
                                                    Company Field
                                                </label>
                                                <input
                                                    type="text"
                                                    name="company_field"
                                                    id="company_field"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="Enter company field"
                                                    required
                                                >
                                            </div>

                                            <div class="col-span-2">
                                                <label
                                                    for="company_description"
                                                    class="mb-2 block text-sm text-white sm:text-lg"
                                                >
                                                    Company Description
                                                </label>
                                                <textarea
                                                    name="company_description"
                                                    id="company_description"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="Enter company description"
                                                    rows="3"
                                                ></textarea>
                                            </div>

                                            <div class="col-span-2 sm:col-span-1">
                                                <label
                                                    for="company_phone"
                                                    class="mb-2 block text-sm text-white sm:text-lg"
                                                >
                                                    Company Phone
                                                </label>
                                                <input
                                                    type="tel"
                                                    name="company_phone"
                                                    id="company_phone"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="+62 8123456789"
                                                >
                                            </div>

                                            <div class="col-span-2 sm:col-span-1">
                                                <label
                                                    for="company_picture"
                                                    class="mb-2 block text-sm text-white sm:text-lg"
                                                >
                                                    Company Logo
                                                </label>
                                                <input
                                                    type="file"
                                                    name="company_picture"
                                                    id="company_picture"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                >
                                            </div>

                                            <div class="col-span-2">
                                                <label
                                                    for="company_address"
                                                    class="mb-2 block text-sm text-white sm:text-lg"
                                                >
                                                    Company Address
                                                </label>
                                                <textarea
                                                    name="company_address"
                                                    id="company_address"
                                                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="Enter company address"
                                                    rows="2"
                                                ></textarea>
                                            </div>
                                        </div>

                                        <div class="flex justify-end space-x-4">
                                            <button
                                                type="button"
                                                class="inline-flex items-center rounded-full bg-white px-5 py-1.5 text-center text-sm text-cyan shadow-lg hover:bg-cyan hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan sm:py-2.5 sm:text-base"
                                                data-modal-toggle="crud-modal"
                                            >
                                                Cancel
                                            </button>
                                            <button
                                                type="submit"
                                                class="inline-flex items-center rounded-full bg-white px-5 py-1.5 text-center text-sm text-cyan shadow-lg hover:bg-cyan hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan sm:py-2.5 sm:text-base"
                                            >
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
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY FIELD</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY PHONE</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY EMAIL</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY WEBSITE</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY ADDRESS</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>COMPANY DESCRIPTION</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
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
                                            {{ $company->company_phone }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $company->company_email ?? 'N/A' }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $company->company_website ?? 'N/A' }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $company->company_address }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $company->company_description }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-sm text-black sm:text-base">
                                            <img src="{{ asset('storage/company/' . $company->company_picture) }}" alt="Company Logo" class="w-10 h-10 rounded-full">
                                        <td class="px-6 py-4">
                                            <a
                                                href="{{ route('admin.company.detail', ['id' => $company->id_company]) }}"
                                                class="rounded-full bg-cyan-100 px-4 py-2 text-center text-sm text-white shadow-md hover:bg-white hover:text-cyan-100 sm:px-7 sm:text-base"
                                            >
                                                Detail
                                            </a>
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
    </script>
@endsection

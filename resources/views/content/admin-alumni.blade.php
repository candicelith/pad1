@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-5 pt-4 sm:ml-64">
            <div class="mx-2 mt-14">
                <h2 class="flex justify-center text-4xl">Alumni</h2>
                <div class="relative sm:mx-10">
                    <div class="top-0 z-20 flex justify-between bg-white pb-4">

                        {{-- Add Alumni Button --}}
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="rounded-xl bg-cyan p-2 shadow-md hover:bg-cyan-400 hover:text-cyan">
                            <svg class="h-6 w-6 text-white hover:text-cyan" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 12h14m-7 7V5" />
                            </svg>
                        </button>

                        {{-- Main modal --}}
                        <div id="crud-modal" tabindex="-1" aria-hidden="true"
                            class="fixed left-0 right-0 top-0 z-50 hidden h-[calc(100%-1rem)] max-h-full w-full items-center justify-center overflow-y-auto overflow-x-hidden md:inset-0">
                            <div class="relative max-h-full w-full max-w-5xl p-4">
                                {{-- Modal content --}}
                                <div class="relative rounded-2xl bg-cyan-400 px-9 py-8 shadow">
                                    {{-- Modal header --}}
                                    <div class="flex items-center justify-between rounded-t text-center md:p-5">
                                        <h3 class="text-3xl text-cyan sm:text-start">
                                            Create New Alumni’s Account
                                        </h3>
                                        <button type="button" data-modal-toggle="crud-modal">
                                            <svg class="h-6 w-6 text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="4" d="M6 18 17.94 6M18 18 6.06 6" />
                                            </svg>
                                        </button>
                                    </div>
                                    <hr class="border-1 h-px bg-white">
                                    {{-- Modal body --}}
                                    <form class="p-4 md:p-5" method="POST" action="{{ route('admin.store') }}">
                                        @csrf
                                        <div class="mb-4 grid grid-cols-1 gap-8 sm:grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="name" class="mb-3 block text-sm text-cyan sm:text-2xl">Full
                                                    Name</label>
                                                <input type="text" name="name" id="name"
                                                    class="m:p-2.5 block h-11 w-full rounded-full border border-gray-300 bg-gray-50 px-4 py-2 text-sm text-gray-900"
                                                    placeholder="Jane Doe" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="nim"
                                                    class="mb-3 block text-sm text-cyan sm:text-lg">NIM</label>
                                                <input type="text" name="nim" id="nim"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="23/******/SV/*****" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="email"
                                                    class="mb-3 block text-sm text-cyan sm:text-lg">Email</label>
                                                <input type="text" name="email" id="email"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="trpl@mail.ugm.ac.id" required="">
                                            </div>
                                            {{-- <div class="col-span-2">
                                                <label for="phone" class="mb-2 block text-sm text-white sm:text-lg">Nomor Telepon</label>
                                                <input type="tel" name="phone" id="phone"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                    placeholder="+6281234567890" pattern="^\+62[0-9]{8,13}$" required>
                                            </div> --}}
                                            {{-- <div class="col-span-2">
                                                <label for="graduate_year"
                                                    class="mb-2 block text-sm text-white sm:text-lg">Graduate Year</label>
                                                <select name="graduate_year" id="graduate_year"
                                                    class="block h-1/2 w-full rounded-full border border-gray-300 bg-gray-50 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400 sm:p-2.5"
                                                    required>
                                                    <option value="" disabled selected>Select Year</option>
                                                    @for ($year = 2018; $year <= 2024; $year++)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div> --}}
                                        </div>

                                        <div class="flex justify-end">
                                            <button type="submit"
                                                class="bg-btn-cyan inline-flex items-center rounded-xl bg-cyan px-8 py-2 text-center text-sm text-white shadow-lg hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan sm:py-2.5 sm:text-base">
                                                Create
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="">
                        <table id="search-table" class="w-full text-left text-sm">
                            <thead class="bg-lightblue text-base">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-sm font-normal text-black sm:text-base">
                                        <span>NO</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm font-normal text-black sm:text-base">
                                        <span>NAME</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>NIU</span>
                                    </th>
                                    <th scope="col" class="hidden-mobile px-6 py-3 font-normal text-black sm:text-base">
                                        <span>EMAIL</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm font-normal text-black sm:text-base">
                                        <span>ACTION</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alumni as $index => $a)
                                    <tr class="border-b border-black bg-white hover:bg-gray-50">
                                        <th scope="row"
                                            class="whitespace-nowrap px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $index + 1 }}
                                        </th>
                                        <td class="px-6 py-4 text-sm text-black sm:text-base">
                                            {{ $a->userDetails->name ?? 'N/A' }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-black">
                                            {{ $a->userDetails->nim_part ?? 'N/A' }}
                                        </td>
                                        <td class="hidden-mobile px-6 py-4 text-black">
                                            {{ $a->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.detail-alumni', ['id' => $a->userDetails->id_userDetails ?? '']) }}"
                                                class="rounded-lg bg-cyan px-4 py-2 text-center text-sm text-white shadow-md hover:bg-cyan-400 hover:text-cyan sm:px-7 sm:text-base">
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

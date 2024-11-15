@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-5 pt-4 sm:ml-64">
            <div class="mt-14">
                <h2 class="flex justify-center text-4xl">Alumni</h2>
                <div class="relative mx-10">
                    <div class="top-0 z-20 flex justify-between bg-white pb-4">
                        <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                            class="rounded-xl bg-cyan-100 p-2 shadow-md hover:bg-white">
                            <svg class="h-6 w-6 text-white hover:text-cyan-100" aria-hidden="true"
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
                                <div class="relative rounded-lg bg-cyan-100 p-2 shadow">
                                    {{-- Modal header --}}
                                    <div class="flex items-center justify-between rounded-t md:p-5">
                                        <h3 class="text-xl text-white">
                                            Form Pembuatan Akun Alumni
                                        </h3>
                                    </div>
                                    {{-- Modal body --}}
                                    <form class="p-4 md:p-5">
                                        <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                                            <div class="col-span-2">
                                                <label for="name" class="mb-2 block text-lg text-white">Full
                                                    Name</label>
                                                <input type="text" name="name" id="name"
                                                    class="block w-full rounded-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                                                    placeholder="" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="niu" class="mb-2 block text-lg text-white">NIU</label>
                                                <input type="text" name="niu" id="niu"
                                                    class="block w-full rounded-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                                                    placeholder="" required="">
                                            </div>
                                            <div class="col-span-2">
                                                <label for="email" class="mb-2 block text-lg text-white">Email</label>
                                                <input type="text" name="email" id="email"
                                                    class="block w-full rounded-full border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-gray-500 dark:bg-gray-600 dark:text-white dark:placeholder-gray-400"
                                                    placeholder="" required="">
                                            </div>
                                        </div>
                                        <div class="flex justify-end space-x-4">
                                            <button type="submit"
                                                class="text-md inline-flex items-center rounded-full bg-white px-5 py-2.5 text-center text-cyan shadow-lg hover:bg-cyan hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan">
                                                Create
                                            </button>
                                            <button type="button"
                                                class="text-md inline-flex items-center rounded-full bg-white px-5 py-2.5 text-center text-cyan shadow-lg hover:bg-cyan hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan"
                                                data-modal-toggle="crud-modal">
                                                Cancel
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <input type="text" id="table-search"
                                class="block w-60 rounded-full border border-gray-300 bg-gray-100 ps-4 pt-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                placeholder="Search Alumni...">
                        </div>
                    </div>

                    <div class="max-h-[calc(100vh-200px)] overflow-x-auto">
                        <table class="w-full text-left text-sm rtl:text-right">
                            <thead class="bg-lightblue text-base">
                                <tr>
                                    <th scope="col" class="px-6 py-3 font-normal">
                                        NO
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-normal">
                                        NAME
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-normal">
                                        NIU
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-normal">
                                        EMAIL
                                    </th>
                                    <th scope="col" class="px-6 py-3 font-normal">
                                        ACTION
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-black bg-white hover:bg-gray-50">
                                    <th scope="row" class="whitespace-nowrap px-6 py-4">
                                        1
                                    </th>
                                    <td class="px-6 py-4">
                                        Naila Geda Gedi
                                    </td>
                                    <td class="px-6 py-4">
                                        12345
                                    </td>
                                    <td class="px-6 py-4">
                                        aku@gmail.com
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('adminprofilalumni') }}"
                                            class="rounded-full bg-cyan-100 px-7 py-2 text-center text-base text-white shadow-md hover:bg-white hover:text-cyan-100">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

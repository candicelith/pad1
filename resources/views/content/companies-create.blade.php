@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="flex items-start justify-center space-x-6">
                {{-- Back Button --}}
                <a class="sm:mb-4" href="{{ route('alumni.profile') }}">
                    <svg class="h-8 w-8 text-gray-800 sm:h-16 sm:w-16" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m14 8-4 4 4 4" />
                    </svg>
                </a>
                <div class="mx-auto w-full max-w-2xl rounded-3xl border-4 border-cyan-400 bg-white shadow-md">
                    <div>
                        <div
                            class="flex items-center justify-between rounded-t border-b-4 border-cyan-400 text-center md:py-8 md:ps-10">
                            <h3 class="text-3xl text-cyan sm:text-start">Create A New Company</h3>
                        </div>

                        @if (session('success'))
                            <div class="relative mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700"
                                role="alert">
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="relative mb-4 rounded border border-red-400 bg-red-100 px-4 py-3 text-red-700"
                                role="alert">
                                <ul class="list-disc pl-4">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('companies.store') }}" method="POST" class="space-y-8 px-10 pb-8" enctype="multipart/form-data">
                            @csrf
                            <div class="relative h-24 w-24 sm:h-32 sm:w-32">
                                <!-- Profile Picture -->
                                <div class="h-full w-full overflow-hidden rounded-full border-4 border-cyan bg-gray-100">
                                    <img id="preview-image" class="h-full w-full object-cover" src=""
                                        alt="Profile Picture">
                                </div>

                                <!-- Camera Icon -->
                                <label for="company_picture"
                                    class="hover:bg-cyan-600 absolute bottom-0 right-0 flex h-8 w-8 cursor-pointer items-center justify-center rounded-full bg-cyan text-white shadow-md transition-all sm:h-10 sm:w-10">
                                    <svg class="h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M3 9a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9Z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M12 17a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M9 5h6l-1 4" />
                                    </svg>
                                </label>
                                {{-- Hidden Input for Company Picture --}}
                                <input id="company_picture" name="company_picture" type="file"
                                accept="image/*" class="hidden"
                                onchange="document.getElementById('preview-image').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                            <div>
                                <label for="company_name" class="mb-1 block text-2xl text-cyan">
                                    Name<span class="text-4xl text-red-500">*</span>
                                </label>
                                <input type="text" name="company_name" id="company_name"
                                    class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                    value="{{ old('company_name') }}"
                                    placeholder="Enter the company name (e.g., ABC Tech Solutions)" required>
                            </div>


                            <div>
                                <label for="company_field" class="mb-1 block text-2xl text-cyan">
                                    Industry Type<span class="text-4xl text-red-500">*</span>
                                </label>
                                <input type="text" name="company_field" id="company_field"
                                    class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                    value="{{ old('company_field') }}"
                                    placeholder="Enter the industry type (e.g., IT, Finance, Healthcare)" required>
                            </div>

                            <div>
                                <label for="company_address" class="mb-1 block text-2xl text-cyan">
                                    Location<span class="text-4xl text-red-500">*</span>
                                </label>
                                <input type="text" name="company_address" id="company_address"
                                    class="w-full rounded-full border border-gray-300 bg-gray-200 py-2 pe-3 ps-4 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                    value="{{ old('company_address') }}"
                                    placeholder="Enter city and country (e.g., Jakarta, Indonesia)" required>
                            </div>

                            <div>
                                <label for="company_description" class="mb-1 block text-2xl text-cyan">
                                    Description<span class="text-4xl text-red-500">*</span>
                                </label>
                                <textarea name="company_description" id="company_description" rows="4"
                                    class="w-full rounded-md border border-gray-300 bg-gray-200 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                    placeholder="Briefly describe the company and its mission" required>{{ old('company_description') }}</textarea>
                            </div>

                            {{-- <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div>
                                    <label for="company_phone" class="mb-1 block text-sm  text-cyan">
                                        Phone Number
                                    </label>
                                    <input type="text" name="company_phone" id="company_phone"
                                        class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                        value="{{ old('company_phone') }}">
                                </div>
                            </div> --}}

                            <div class="space-y-3">
                                <label for="company_phone" class="mb-1 block text-2xl text-cyan">
                                    File Upload<span class="text-4xl text-red-500">*</span>
                                </label>
                                <span>You can add one or more photos of your new company</span>
                                <input type="file" name="" id="" class="rounded-full border" required>
                            </div>

                            <div class="flex justify-end space-x-3 pt-4">
                                {{-- <a href="{{ url()->previous() }}"
                                    class="rounded-md bg-gray-200 px-4 py-2 text-gray-700 transition hover:bg-gray-300">
                                    Cancel
                                </a> --}}
                                <button type="submit"
                                    class="bg-btn-cyan rounded-md bg-cyan px-6 py-2 text-2xl text-white transition hover:bg-cyan-400 hover:text-cyan">
                                    Create
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

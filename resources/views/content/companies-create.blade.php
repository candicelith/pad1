@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
            <div class="mx-auto w-full max-w-2xl rounded-3xl border border-gray-400 bg-lightblue shadow-md">
                <div class="mx-6 py-6 sm:mx-10 sm:py-10">
                    <div class="mb-6 border-b pb-4">
                        <h2 class="text-2xl font-bold text-cyan">Add New Company</h2>
                        <p class="mt-2 text-gray-600">Fill in the information below to add a new company</p>
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

                    <form action="{{ route('companies.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="company_name" class="mb-1 block text-sm font-medium text-gray-700">
                                Company Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="company_name" id="company_name"
                                class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                value="{{ old('company_name') }}" required>
                        </div>

                        <div>
                            <label for="company_field" class="mb-1 block text-sm font-medium text-gray-700">
                                Industry/Field <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="company_field" id="company_field"
                                class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                value="{{ old('company_field') }}" required>
                        </div>

                        <div>
                            <label for="company_description" class="mb-1 block text-sm font-medium text-gray-700">
                                Description
                            </label>
                            <textarea name="company_description" id="company_description" rows="4"
                                class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan">{{ old('company_description') }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <div>
                                <label for="company_phone" class="mb-1 block text-sm font-medium text-gray-700">
                                    Phone Number
                                </label>
                                <input type="text" name="company_phone" id="company_phone"
                                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                    value="{{ old('company_phone') }}">
                            </div>

                            <div>
                                <label for="company_address" class="mb-1 block text-sm font-medium text-gray-700">
                                    Address
                                </label>
                                <input type="text" name="company_address" id="company_address"
                                    class="w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm focus:border-cyan focus:outline-none focus:ring-cyan"
                                    value="{{ old('company_address') }}">
                            </div>
                        </div>

                        <div class="flex justify-end space-x-3 pt-4">
                            <a href="{{ url()->previous() }}"
                                class="rounded-md bg-gray-200 px-4 py-2 text-gray-700 transition hover:bg-gray-300">
                                Cancel
                            </a>
                            <button type="submit"
                                class="bg-btn-cyan hover:bg-cyan-600 rounded-md bg-cyan px-6 py-2 text-white transition">
                                Save Company
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layout.headerFooter')

@section('content')
<section class="mt-20 bg-white">
    <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">
        <div class="w-full max-w-2xl mx-auto rounded-3xl border border-gray-400 bg-lightblue shadow-md">
            <div class="mx-6 py-6 sm:mx-10 sm:py-10">
                <div class="mb-6 border-b pb-4">
                    <h2 class="text-2xl font-bold text-cyan">Add New Company</h2>
                    <p class="text-gray-600 mt-2">Fill in the information below to add a new company</p>
                </div>

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
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
                        <label for="company_name" class="block text-sm font-medium text-gray-700 mb-1">
                            Company Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="company_name" id="company_name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan focus:border-cyan"
                            value="{{ old('company_name') }}" required>
                    </div>

                    <div>
                        <label for="company_field" class="block text-sm font-medium text-gray-700 mb-1">
                            Industry/Field <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="company_field" id="company_field"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan focus:border-cyan"
                            value="{{ old('company_field') }}" required>
                    </div>

                    <div>
                        <label for="company_description" class="block text-sm font-medium text-gray-700 mb-1">
                            Description
                        </label>
                        <textarea name="company_description" id="company_description" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan focus:border-cyan">{{ old('company_description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div>
                            <label for="company_phone" class="block text-sm font-medium text-gray-700 mb-1">
                                Phone Number
                            </label>
                            <input type="text" name="company_phone" id="company_phone"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan focus:border-cyan"
                                value="{{ old('company_phone') }}">
                        </div>

                        <div>
                            <label for="company_address" class="block text-sm font-medium text-gray-700 mb-1">
                                Address
                            </label>
                            <input type="text" name="company_address" id="company_address"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-cyan focus:border-cyan"
                                value="{{ old('company_address') }}">
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ url()->previous() }}"
                           class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition">
                            Cancel
                        </a>
                        <button type="submit"
                                class="bg-cyan text-white px-6 py-2 rounded-md hover:bg-cyan-600 transition">
                            Save Company
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
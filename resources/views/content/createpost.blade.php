@extends('layout.headerFooter')

@section('content')
    <section class="mt-24 bg-white sm:mb-12">
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data"
            class="mx-auto w-full bg-cyan-100 pt-6 sm:max-w-xl sm:rounded-xl sm:px-14 sm:py-16 lg:max-w-5xl lg:px-20 xl:max-w-6xl">
            @csrf
            <div class="px-10">
                <div class="mb-5 mt-5">
                    <label for="position" class="mb-2 block text-xl text-white">Position</label>
                    <input type="text" id="position" name="position"
                        class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                        required value="{{ old('position') }}" />
                    @error('position')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5 mt-5">
                    <label for="company" class="mb-2 block text-xl text-white">Company</label>
                    <select id="company" name="company"
                        class="block w-full rounded-full border border-gray-900 bg-gray-50 p-1 px-6 text-sm text-gray-900"
                        required>
                        <option value="" disabled {{ old('company') ? '' : 'selected' }}>Select a company</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id_company }}"
                                {{ old('company') == $company->id_company ? 'selected' : '' }}>
                                {{ $company->company_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('company')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- // Description --}}
                <div class="mb-5 mt-5">
                    <label for="description" class="mb-2 block text-xl text-white">Description</label>
                    <textarea type="text" id="description" name="vacancy_description"
                        class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 pt-2 text-sm text-gray-900">{{ old('vacancy_description') }}</textarea>
                    @error('vacancy_description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- // Responsibility --}}
                <div class="mb-5 mt-5">
                    <label for="responsibility" class="mb-2 block text-xl text-white">Responsibility</label>
                    <div id="responsibility-container">
                        <div class="responsibility-item mb-2 flex items-center">
                            <input type="text" name="vacancy_responsibility[]"
                                   class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                                   placeholder="Enter responsibility" required />
                            <button type="button" class="ml-2 px-2 text-sm text-red-600 remove-responsibility">Remove</button>
                        </div>
                    </div>
                    <button type="button" id="add-responsibility"
                            class="mt-2 rounded-full bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                        Add Responsibility
                    </button>
                    @error('vacancy_responsibility')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                {{-- // Qualification --}}
                <div class="mb-5 mt-5">
                    <label for="qualification" class="mb-2 block text-xl text-white">Qualification</label>
                    <div id="qualification-container">
                        <div class="qualification-item mb-2 flex items-center">
                            <input type="text" name="vacancy_qualification[]"
                                   class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                                   placeholder="Enter qualification" required />
                            <button type="button" class="ml-2 px-2 text-sm text-red-600 remove-qualification">Remove</button>
                        </div>
                    </div>
                    <button type="button" id="add-qualification"
                            class="mt-2 rounded-full bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                        Add Qualification
                    </button>
                    @error('vacancy_qualification')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-5 mt-5">
                    <label for="benefits" class="mb-2 block text-xl text-white">Benefits</label>
                    <div id="benefits-container">
                        <div class="benefits-item mb-2 flex items-center">
                            <input type="text" name="vacancy_benefits[]"
                                   class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                                   placeholder="Enter benefits" required />
                            <button type="button" class="ml-2 px-2 text-sm text-red-600 remove-benefits">Remove</button>
                        </div>
                    </div>
                    <button type="button" id="add-benefits"
                            class="mt-2 rounded-full bg-blue-500 px-4 py-2 text-white hover:bg-blue-600">
                        Add Benefits
                    </button>
                    @error('vacancy_benefits')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5 mt-5">
                    <label for="file" class="mb-2 block text-xl text-white">File Upload</label>
                    <input type="file" id="file" name="vacancy_picture"
                        class="block cursor-pointer rounded-xl border border-gray-900 bg-gray-50 px-1 text-xs text-gray-400" />
                    @error('vacancy_picture')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="mb-4 w-full rounded-full bg-white py-2 text-center text-sm text-cyan hover:bg-cyan hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 sm:w-auto sm:px-10 sm:text-lg">
                    Post
                </button>
            </div>
        </form>
    </section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
    const addDynamicInput = (containerId, buttonId, inputName, removeClass) => {
        const container = document.getElementById(containerId);
        const addButton = document.getElementById(buttonId);

        addButton.addEventListener('click', () => {
            const newItem = document.createElement('div');
            newItem.classList.add(`${inputName}-item`, 'mb-2', 'flex', 'items-center');
            newItem.innerHTML = `
                <input type="text" name="${inputName}[]"
                       class="block w-full rounded-xl border border-gray-900 bg-gray-50 px-2 text-sm text-gray-900"
                       placeholder="Add More" />
                <button type="button" class="ml-2 px-2 text-sm text-red-600 ${removeClass}">Remove</button>
            `;
            container.appendChild(newItem);

            newItem.querySelector(`.${removeClass}`).addEventListener('click', () => {
                newItem.remove();
            });
        });

        container.addEventListener('click', (e) => {
            if (e.target.classList.contains(removeClass)) {
                e.target.closest(`.${inputName}-item`).remove();
            }
        });
    };

    addDynamicInput('qualification-container', 'add-qualification', 'vacancy_qualification', 'remove-qualification');
    addDynamicInput('responsibility-container', 'add-responsibility', 'vacancy_responsibility', 'remove-responsibility');
    addDynamicInput('benefits-container', 'add-benefits', 'vacancy_benefits', 'remove-benefits');
});

</script>

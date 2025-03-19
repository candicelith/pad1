@extends('layout.headerFooter')

@section('content')
    <section class="mt-20 bg-white">
        <div class="mx-auto max-w-screen-xl px-4 py-8 lg:px-6 lg:py-16">

            {{-- Title --}}
            <div class="mx-auto mb-8 max-w-screen-sm text-center lg:mb-16">
                <h2 class="mb-4 text-3xl text-cyan lg:text-4xl">Posts</h2>
            </div>

            {{-- New Post Button --}}
            <div class="mt-6 flex justify-end">
                <a href="{{ route(name: 'createpost') }}"
                    class="items-center rounded-full bg-cyan-100 px-5 py-1 text-lg text-white shadow hover:bg-white hover:text-cyan-100">
                    New Post +
                </a>
            </div>

            {{-- Post Card Start --}}
            {{-- @foreach ($vacancys as $vc) --}}
            <div data-aos="fade-up" class="mt-3 grid space-y-4 lg:grid-cols-1">
                <article class="cursor-pointer rounded-lg border border-gray-200 bg-lightblue p-6 shadow-md"
                    onclick="navigateToDetailPost()">
                    <div class="mb-5 flex items-center justify-between text-gray-400">
                        <span class="ml-auto text-sm">
                            2 days ago
                        </span>
                    </div>
                    <div class="flex flex-col lg:flex-row lg:space-x-8">
                        <div class="flex-shrink-0">
                            <img class="h-20 w-20 rounded-full object-cover" src="" alt="AMBA" />
                        </div>
                        <div class="mt-4 lg:mt-0">
                            {{-- Position --}}
                            <h2 class="mb-2 text-2xl tracking-tight text-cyan">
                                UIUX
                            </h2>
                            {{-- Company Name --}}
                            <h2 class="mb-2 text-xl tracking-tight text-cyan">
                                BCA
                            </h2>
                            {{-- Posted By "Name" --}}
                            <p class="text-lg text-gray-400">Posted by AMBA</p>
                        </div>
                    </div>
                </article>
            </div>
            {{-- @endforeach --}}
            {{-- Post Card End --}}

            {{-- Pagination --}}
            <div class="mt-6 flex justify-center">
                {{-- {{ $vacancys->links('vendor.pagination.custom-pagination') }} --}}
            </div>
        </div>
    </section>

    <script>
        function navigateToDetailPost() {
            window.location.href = '{{ route('detailpost') }}';
        }
    </script>
@endsection

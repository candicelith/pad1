@extends('layout.headerFooter')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl text-cyan">Alumni</h2>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4">
                @foreach ($alumnis as $al)
                <div class="w-full max-w-sm bg-lightblue border border-gray-200 rounded-lg shadow-md">
                    <div class="flex flex-col items-center py-10">
                        <div class="w-full flex justify-end mb-5 text-gray-400 px-6">
                            <span class="text-sm">{{ $al->graduate_year }}</span>
                        </div>
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Bonnie image"/>
                        <h2 class="mb-1 text-xl text-cyan">{{ $al->name }}</h2>
                        <h3 class="text-lg text-cyan">Visual Designer</h3>
                        <h4 class="text-md text-gray-500">GoTo Group</h4>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

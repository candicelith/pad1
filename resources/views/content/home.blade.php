@extends('layout.headerFooter')

@section('content')
    <!--Hero Start-->
    <section class="bg-center bg-no-repeat bg-jumbotron shadow bg-gray-700 bg-blend-multiply h-[720px] ">
        <div class="px-4 mx-auto max-w-screen-xl text-start py-24 lg:py-56">
            <h1 class="mb-4 text-4xl tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Strategi Alumni Meraih
                Karier di Perusahaan Terbaik</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl">Memasuki dunia kerja setelah lulus merupakan
                tantangan
                tersendiri bagi banyak alumni. Namun, dengan strategi...</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                <a href="#"
                    class="inline-flex justify-center hover:text-cyan-100 items-center py-3 px-5 text-base font-medium text-center bg-cyan-100 text-white rounded-lg hover:bg-white focus:ring-4 focus:ring-cyan">
                    Read More
                </a>
            </div>
        </div>
    </section>
    <!--Hero End-->

    <!--Content Start-->
    <section class="px-4 mx-auto max-w-screen-xl py-10">
        <div class="flex flex-col lg:flex-row lg:space-x-8">
            <div class="w-full lg:w-2/3 bg-cyan-100 rounded-lg p-6">
                <h1 class="text-2xl mb-4 text-white">Posts</h1>
                @foreach ($posts as $ps)
                    <a href="{{ route('detailpost') }}">
                        <div class="mb-4">
                            <article class="p-6 bg-lightblue rounded-lg border border-gray-500 shadow-lg">
                                <div class="flex justify-between items-center mb-5 text-gray-400">
                                    <span class="ml-auto text-sm">{{ $ps->date_difference }}</span>
                                </div>
                                <div class="flex space-x-8">
                                    <div>
                                        <img class="w-20 h-20 rounded-full"
                                            src="{{ $ps->profile_photo }}"
                                            alt="Jese Leos avatar"  />
                                    </div>
                                    <div>
                                        <h2 class="text-xl text-cyan">{{ $ps->name }}</h2>
                                        <h2 class="mb-2 text-lg tracking-tight text-cyan"><span
                                                class="text-gray-400">Searching for: </span>{{ $ps->position }}</h2>
                                    </div>
                                </div>
                                <div>
                                    <p>{{ $ps->vacancy_description }}</p>
                                    <img class="w-full h-40 overflow-hidden rounded-md" src="{{ $ps->vacancy_picture }}"
                                        alt="Vacancy Picture">
                                </div>
                            </article>
                        </div>
                    </a>
                @endforeach
                <a href="{{ route('posts') }}"
                    class="mt-4 inline-flex justify-center items-center py-2 px-4 text-cyan bg-white rounded-lg hover:bg-cyan hover:text-white">More</a>
            </div>

            <div class="w-full lg:w-1/3 bg-cyan-100 rounded-lg p-6 mt-4 lg:mt-0">
                <h1 class="text-2xl mb-4 text-white">Top 10 Companies Alumni Work For</h1>
                @foreach ($company as $com)
                    <div class="mb-4">
                        <article class="p-3 bg-lightblue rounded-lg border border-gray-500 shadow-lg">
                            <div class="flex space-x-8">
                                <div>
                                    <img class="w-20 h-20 rounded-full"
                                        src="{{$com->company_picture}}"
                                        alt="Jese Leos avatar"  />
                                </div>
                                <div>
                                    <h2 class="text-xl text-cyan">{{ $com->company_name }}</h2>
                                    <p>
                                        Active Employees: {{ $com->employee_count }}
                                    </p>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection

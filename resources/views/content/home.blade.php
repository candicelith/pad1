<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    @extends('layout.headerFooter')

    @section('content')
    <!--Hero Start-->
    <section class="bg-center bg-no-repeat bg-jumbotron shadow bg-gray-700 bg-blend-multiply h-[720px] ">
        <div class="px-4 mx-auto max-w-screen-xl text-start py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Strategi Alumni Meraih Karier di Perusahaan Terbaik</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl">Memasuki dunia kerja setelah lulus merupakan tantangan
                tersendiri bagi banyak alumni. Namun, dengan strategi...</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
                <a href="#" class="inline-flex justify-center hover:text-cyan-100 items-center py-3 px-5 text-base font-medium text-center bg-cyan-100 text-white rounded-lg hover:bg-white focus:ring-4 focus:ring-cyan">
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
                <h1 class="text-2xl font-bold mb-4">Posts</h1>
                <p class="text-white">isi post</p>
                <a href="{{ route('posts') }}" class="mt-4 inline-flex justify-center items-center py-2 px-4 text-cyan bg-white rounded-lg hover:bg-cyan hover:text-white">More</a>
            </div>
            <div class="w-full lg:w-1/3 bg-cyan-100 rounded-lg p-6 mt-4 lg:mt-0">
                <h1 class="text-2xl font-bold mb-4">Top 10 Companies Alumni Work For</h1>
                <p class="text-white">isi perusahaan</p>
            </div>
        </div>
    </section>
    <!--Content End-->

    @endsection

</body>
</html>

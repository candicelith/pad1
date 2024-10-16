@extends('layout.headerFooter')

@section('content')
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl text-cyan">Companies</h2>
            </div>
            <div>
                <form class="flex items-center max-w-sm mx-auto">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2"/>
                        </svg>
                    </div>
                    <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search branch name..." required />
                </div>
                <button type="submit" class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
                </form>
            </div>
            <div class="flex flex-wrap justify-center gap-0.5">
                <button
                class="text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-sm px-4 py-1 text-center"
                value="" onclick="">all</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="A" onclick="">a</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="B" onclick="">b</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="C" onclick="">c</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="D" onclick="">d</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="E" onclick="">e</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="F" onclick="">f</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="G" onclick="">g</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="H" onclick="">h</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="I" onclick="">i</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="J" onclick="">j</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="K" onclick="">k</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="L" onclick="">l</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="M" onclick="">m</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="N" onclick="">n</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="O" onclick="">o</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="P" onclick="">p</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="Q" onclick="">q</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="R" onclick="">r</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="S" onclick="">s</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="T" onclick="">t</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="U" onclick="">u</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="V" onclick="">v</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="W" onclick="">w</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="X" onclick="">x</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="Y" onclick="">y</button>
                <button
                class="w-10 h-6 text-white bg-cyan hover:bg-cyan-100 hover:text-white focus:outline-none focus:ring-4 focus:ring-cyan-100 focus:text-white focus:bg-cyan-100 rounded-full text-xs px-4 py-1 text-center"
                value="Z" onclick="">z</button>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-4">
                <div class="w-full max-w-sm bg-lightblue border border-gray-200 rounded-lg shadow-md">
                    <div class="flex flex-col items-center py-10">
                        <div class="w-full flex justify-end mb-5 text-gray-400 px-6">
                            <span class="text-sm">2022</span>
                        </div>
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png" alt="Bonnie image"/>
                        <h2 class="mb-1 text-xl text-cyan">Bonnie Green</h2>
                        <h3 class="text-lg text-cyan">Visual Designer</h3>
                        <h4 class="text-md text-gray-500">GoTo Group</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

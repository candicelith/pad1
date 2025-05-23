@extends('layout.admin-headerNav')

@section('admincontent')
    <section class="my-4 sm:mx-4">
        <div class="mt-5 pt-4 sm:ml-64">
            <div class="mt-14">

                @if (Session::has('approved'))
                    <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-lightgreen p-4 text-center text-sm text-green-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                        role="alert">
                        {!! Session::get('approved') !!}
                    </div>
                @elseif (Session::has('rejected'))
                    <div class="mx-auto mb-4 w-3/4 transform rounded-lg bg-red-300 p-4 text-center text-sm text-red-800 opacity-100 transition-opacity duration-500 sm:w-1/2"
                        role="alert">
                        {!! Session::get('rejected') !!}
                    </div>
                @endif

                <div class="grid sm:mx-10 sm:grid-cols-2 sm:gap-10">
                    <div class="w-full rounded-lg bg-lightblue p-4 shadow md:p-6">
                        <h2 class="mb-4 text-base">User Growth Trend on Pokari Platform</h2>
                        <div id="column-chart"></div>
                    </div>

                    <div class="w-full rounded-lg bg-lightblue p-4 shadow md:p-6">
                        <h2 class="mb-4 text-base">Number of TRPL UGM Alumni by Entry Year</h2>
                        <div id="column-chart"></div>
                    </div>

                    <div class="w-full rounded-lg bg-lightblue p-4 shadow sm:mt-0 md:p-6">
                        <h2 class="mb-4 text-base">Edit Alumni Request</h2>
                        <div class="scrollbar-companies grid max-h-[300px] space-y-4 overflow-y-auto pe-2 lg:grid-cols-1">

                            {{-- Req Start --}}
                            @foreach ($pendingRequest as $request)
                                <div class="request-card cursor-pointer rounded-lg bg-cyan-100">
                                    <div class="flex items-center justify-between px-5 py-2">
                                        <div class="flex items-center space-x-4">
                                            <img onclick="window.location.href='{{ route('admin.approval', ['id' => $request->id_request]) }}'"
                                                class="h-10 w-10 rounded-full"
                                                src="{{ asset('storage/profile/default_profile.png') }}" alt="">
                                            <h3 onclick="window.location.href='{{ route('admin.approval', ['id' => $request->id_request]) }}'"
                                                class="text-sm text-white">{{ $request->userDetails->name }}</h3>
                                        </div>
                                        <div class="button-group flex items-center space-x-2">
                                            {{-- Approve Button --}}
                                            <form method="POST"
                                                action="{{ route('admin.handleApproval', $request->id_request) }}">
                                                @csrf
                                                <input type="hidden" name="action" value="approve">
                                                <button type="submit">
                                                    <svg class="h-6 w-6 text-green-800 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            {{-- Decline Button --}}
                                            <form method="POST"
                                                action="{{ route('admin.handleApproval', $request->id_request) }}">
                                                @csrf
                                                <input type="hidden" name="action" value="reject">
                                                <button type="submit">
                                                    <svg class="h-6 w-6 text-red-900 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- Req End --}}
                        </div>
                    </div>

                    <div class="w-full rounded-lg bg-lightblue p-4 shadow sm:mt-0 md:p-6">
                        <h2 class="mb-4 text-base">Add Company Request</h2>
                        <div class="scrollbar-companies grid max-h-[300px] space-y-4 overflow-y-auto pe-2 lg:grid-cols-1">

                            {{-- Req Start --}}
                            @foreach ($pendingRequest as $request)
                                <div class="request-card cursor-pointer rounded-lg bg-cyan-100">
                                    <div class="flex items-center justify-between px-5 py-2">
                                        <div class="flex items-center space-x-4">
                                            <img onclick="window.location.href='{{ route('admin.approval', ['id' => $request->id_request]) }}'"
                                                class="h-10 w-10 rounded-full"
                                                src="{{ asset('storage/profile/default_profile.png') }}" alt="">
                                            <h3 onclick="window.location.href='{{ route('admin.approval', ['id' => $request->id_request]) }}'"
                                                class="text-sm text-white">{{ $request->userDetails->name }}</h3>
                                        </div>
                                        <div class="button-group flex items-center space-x-2">
                                            {{-- Approve Button --}}
                                            <form method="POST"
                                                action="{{ route('admin.handleApproval', $request->id_request) }}">
                                                @csrf
                                                <input type="hidden" name="action" value="approve">
                                                <button type="submit">
                                                    <svg class="h-6 w-6 text-green-800 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                            {{-- Decline Button --}}
                                            <form method="POST"
                                                action="{{ route('admin.handleApproval', $request->id_request) }}">
                                                @csrf
                                                <input type="hidden" name="action" value="reject">
                                                <button type="submit">
                                                    <svg class="h-6 w-6 text-red-900 dark:text-white" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        fill="none" viewBox="0 0 24 24">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- Req End --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        fetch('/api/alumni-data')
            .then(response => response.json())
            .then(data => {
                const options = {
                    colors: ["#183D55"],
                    series: [{
                        name: "Jumlah Alumni",
                        color: "#183D55",
                        data: data, // Dynamically set data from the API
                    }],
                    chart: {
                        type: "bar",
                        height: "320px",
                        fontFamily: "Gilgan, sans-serif",
                        toolbar: {
                            show: false,
                        },
                    },
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: "70%",
                            borderRadiusApplication: "end",
                            borderRadius: 0,
                        },
                    },
                    tooltip: {
                        shared: true,
                        intersect: false,
                        style: {
                            fontFamily: "Gilgan, sans-serif",
                        },
                    },
                    states: {
                        hover: {
                            filter: {
                                type: "darken",
                                value: 1,
                            },
                        },
                    },
                    stroke: {
                        show: true,
                        width: 0,
                        colors: ["transparent"],
                    },
                    grid: {
                        show: false,
                        strokeDashArray: 4,
                        padding: {
                            left: 2,
                            right: 2,
                            top: -14
                        },
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    legend: {
                        show: false,
                    },
                    xaxis: {
                        floating: false,
                        labels: {
                            show: true,
                            style: {
                                fontFamily: "Inter, sans-serif",
                                cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                            }
                        },
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                    },
                    yaxis: {
                        show: true,
                    },
                    fill: {
                        opacity: 1,
                    },
                };

                // Render chart only after options are defined
                if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
                    const chart = new ApexCharts(document.getElementById("column-chart"), options);
                    chart.render();
                }
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>



    <script>
        function approveAlumni(element) {
            // Change background color to green for the specific element
            element.classList.remove('bg-cyan-100');
            element.classList.add('bg-lightgreen');

            // Replace buttons with "Approved" text for the specific button group
            const buttonGroup = element.querySelector('.button-group');
            buttonGroup.innerHTML = '<span class="text-green-800 text-sm sm:text-base">Approved</span>';
        }

        function declineAlumni(element) {
            // Change background color to red for the specific element
            element.classList.remove('bg-cyan-100');
            element.classList.add('bg-red-300');

            // Replace buttons with "Declined" text for the specific button group
            const buttonGroup = element.querySelector('.button-group');
            buttonGroup.innerHTML = '<span class="text-red-800 text-sm sm:text-base">Declined</span>';
        }
    </script>
@endsection

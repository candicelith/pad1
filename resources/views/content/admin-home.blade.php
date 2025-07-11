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
                        <div id="line-chart"></div>
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
                            @foreach ($pendingCompanies as $companies)
                                <div class="request-card cursor-pointer rounded-lg bg-cyan-100">
                                    <div class="flex items-center justify-between px-5 py-2">
                                        <div class="flex items-center space-x-4">
                                            <img onclick="window.location.href='{{ route('admin.company.approval', ['id' => $companies->id_company]) }}'"
                                                class="h-10 w-10 rounded-full"
                                                src="{{ $companies->company_picture ? asset('storage/company/' . $companies->company_picture) : asset('assets/default_company.png') }}"
                                                alt="profile_picture">
                                            <h3 onclick="window.location.href='{{ route('admin.company.approval', ['id' => $companies->id_company]) }}'"
                                                class="text-sm text-white">{{ $companies->company_name }}</h3>
                                        </div>

                                        <div class="button-group flex items-center space-x-2">
                                            {{-- Approve Button --}}
                                            <form method="POST"
                                                action="{{ route('admin.company.approve', $companies->id_company) }}">
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
                                                action="{{ route('admin.company.reject', $companies->id_company) }}">
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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            axios.get('/api/alumni-data')
                .then(response => {
                    const data = response.data;
                    const categories = data.map(item => item.x);
                    const values = data.map(item => item.y);

                    const baseOptions = {
                        series: [{
                            name: "Jumlah Alumni",
                            data: values
                        }],
                        xaxis: {
                            categories: categories,
                            labels: {
                                show: true,
                                style: {
                                    fontFamily: "Inter, sans-serif",
                                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                                }
                            },
                            axisBorder: {
                                show: false
                            },
                            axisTicks: {
                                show: false
                            },
                        },
                        chart: {
                            height: "320px",
                            fontFamily: "Gilgan, sans-serif",
                            toolbar: {
                                show: false
                            }
                        },
                        tooltip: {
                            shared: true,
                            intersect: false,
                            style: {
                                fontFamily: "Gilgan, sans-serif",
                            },
                        },
                        stroke: {
                            show: true,
                            width: 2,
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
                            enabled: false
                        },
                        legend: {
                            show: false
                        },
                        yaxis: {
                            show: true
                        },
                        fill: {
                            opacity: 1
                        }
                    };

                    const options1 = {
                        ...baseOptions,
                        chart: {
                            ...baseOptions.chart,
                            type: "bar"
                        },
                        colors: ["#183D55"],
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: "70%",
                                borderRadiusApplication: "end",
                                borderRadius: 0,
                            },
                        },
                    };

                    if (typeof ApexCharts !== 'undefined') {
                        new ApexCharts(document.getElementById("column-chart"), options1).render();
                    }
                })
                .catch(error => console.error('Error fetching alumni data:', error));

            axios.get('/api/user-data')
                .then(response => {
                    const data = response.data;
                    const categories = data.map(item => item.x);
                    const values = data.map(item => item.y);

                    const options2 = {
                        series: [{
                            name: "Jumlah User",
                            data: values
                        }],
                        chart: {
                            type: "line",
                            height: "320px",
                            fontFamily: "Gilgan, sans-serif",
                            toolbar: {
                                show: false,
                            },
                        },
                        colors: ["#183D55"],
                        stroke: {
                            curve: 'smooth',
                            width: 2,
                        },
                        xaxis: {
                            categories: categories,
                            labels: {
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
                        tooltip: {
                            style: {
                                fontFamily: "Gilgan, sans-serif",
                            },
                        },
                        legend: {
                            show: false,
                        },
                        grid: {
                            show: false,
                        },
                    };

                    if (typeof ApexCharts !== 'undefined') {
                        new ApexCharts(document.getElementById("line-chart"), options2).render();
                    }
                })
                .catch(error => console.error('Error fetching user data:', error));
        });
    </script>

    <script>
        // function approveAlumni(element) {
        //     // Change background color to green for the specific element
        //     element.classList.remove('bg-cyan-100');
        //     element.classList.add('bg-lightgreen');

        //     // Replace buttons with "Approved" text for the specific button group
        //     const buttonGroup = element.querySelector('.button-group');
        //     buttonGroup.innerHTML = '<span class="text-green-800 text-sm sm:text-base">Approved</span>';
        // }

        // function declineAlumni(element) {
        //     // Change background color to red for the specific element
        //     element.classList.remove('bg-cyan-100');
        //     element.classList.add('bg-red-300');

        //     // Replace buttons with "Declined" text for the specific button group
        //     const buttonGroup = element.querySelector('.button-group');
        //     buttonGroup.innerHTML = '<span class="text-red-800 text-sm sm:text-base">Declined</span>';
        // }
    </script>
@endsection

@extends('layout.admin-headerNav')

@section('admincontent')
    <section class="mx-4 my-4">
        <div class="mt-5 pt-4 sm:ml-64">
            <div class="mt-14">
                <div class="flex flex-col justify-evenly sm:flex-row">
                    <div class="w-full max-w-sm rounded-lg bg-lightblue p-4 shadow md:p-6">
                        <h2 class="mb-4 text-base">Data Alumni TRPL</h2>
                        <div id="column-chart"></div>
                    </div>
                    <div class="mt-10 w-full max-w-sm rounded-lg bg-lightblue p-4 shadow sm:mt-0 md:p-6">
                        <h2 class="mb-4 text-base">Request</h2>
                        <div class="scrollbar-companies grid max-h-[300px] space-y-4 overflow-y-auto pe-2 lg:grid-cols-1">
                            {{-- Req Start --}}
                            <div class="request-card cursor-pointer rounded-lg bg-cyan-100"
                                onclick="window.location.href='{{ route('admindetailalumni') }}'">
                                <div class="flex items-center justify-between px-5 py-2">
                                    <div class="flex items-center space-x-4">
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                            alt="">
                                        <h3 class="text-sm text-white">Naila Geda Gedi</h3>
                                    </div>
                                    <div class="button-group flex items-center space-x-2">
                                        <button onclick="approveAlumni(this.closest('.request-card'))">
                                            <svg class="h-6 w-6 text-green-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                        <button onclick="declineAlumni(this.closest('.request-card'))">
                                            <svg class="h-6 w-6 text-red-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="request-card cursor-pointer rounded-lg bg-cyan-100"
                                onclick="window.location.href='{{ route('admindetailalumni') }}'">
                                <div class="flex items-center justify-between px-5 py-2">
                                    <div class="flex items-center space-x-4">
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png"
                                            alt="">
                                        <h3 class="text-sm text-white">Nopal Geda Gedi</h3>
                                    </div>
                                    <div class="button-group flex items-center space-x-2">
                                        <button onclick="approveAlumni(this.closest('.request-card'))">
                                            <svg class="h-6 w-6 text-green-800 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                        <button onclick="declineAlumni(this.closest('.request-card'))">
                                            <svg class="h-6 w-6 text-red-900 dark:text-white" aria-hidden="true"
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        const options = {
            colors: ["#183D55"],
            series: [{
                name: "Jumlah Alumni",
                color: "#183D55",
                data: [{
                        x: "2017",
                        y: 231
                    },
                    {
                        x: "2018",
                        y: 122
                    },
                    {
                        x: "2019",
                        y: 63
                    },
                    {
                        x: "2020",
                        y: 421
                    },
                    {
                        x: "2021",
                        y: 122
                    },
                    {
                        x: "2022",
                        y: 323
                    },
                    {
                        x: "2023",
                        y: 111
                    },
                ],
            }, ],
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
        }

        if (document.getElementById("column-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("column-chart"), options);
            chart.render();
        }
    </script>


    <script>
        function navigateToAdminDetailAlumni() {
            window.location.href = '{{ route('admindetailalumni') }}';
        }

        function approveAlumni(element) {
            // Change background color to green for the specific element
            element.classList.remove('bg-cyan-100');
            element.classList.add('bg-lightgreen');

            // Replace buttons with "Approved" text for the specific button group
            const buttonGroup = element.querySelector('.button-group');
            buttonGroup.innerHTML = '<span class="text-green-800">Approved</span>';
        }

        function declineAlumni(element) {
            // Change background color to red for the specific element
            element.classList.remove('bg-cyan-100');
            element.classList.add('bg-red-300');

            // Replace buttons with "Declined" text for the specific button group
            const buttonGroup = element.querySelector('.button-group');
            buttonGroup.innerHTML = '<span class="text-red-800">Declined</span>';
        }
    </script>
@endsection

@extends('layout.admin-headerNav')

@section('admincontent')
    <section>
        <div class="mt-5 p-4 sm:ml-64">
            <div class="mt-14">
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div class="w-full max-w-sm rounded-lg bg-lightblue p-4 shadow md:p-6">
                        <h2 class="mb-4 text-base">Data Alumni TRPL</h2>
                        <div id="column-chart"></div>
                    </div>
                    <div class="flex h-28 items-center justify-center rounded bg-gray-50 dark:bg-gray-800">
                        <p class="text-2xl text-gray-400 dark:text-gray-500">
                            <svg class="h-3.5 w-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 1v16M1 9h16" />
                            </svg>
                        </p>
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
@endsection

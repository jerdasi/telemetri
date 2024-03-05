@extends("layouts.app-structure")

@section("title", "Dashboard | Balai Wilayah Sungai Sumatera")

@section("content")
    <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
                <div class="card w-100">
                    <div class="card-body">
                        <div
                            class="d-sm-flex d-block align-items-center justify-content-between mb-9"
                        >
                            <div class="mb-3 mb-sm-0">
                                <h5 class="card-title fw-semibold">
                                    Cuaca Overview
                                </h5>
                            </div>
                            <div class="d-flex column-gap-1">
                                <label for="wilayahSelectOverview"></label>
                                <select class="form-select" id="wilayahSelectOverview">
                                    @forelse ($list_wilayah as $wilayah)
                                        <option value="{{ $wilayah->id }}">
                                            {{ $wilayah->nama }}
                                        </option>
                                    @empty
                                        <option value="-1" disabled>
                                            Tidak Ada Wilayah
                                        </option>
                                    @endforelse
                                </select>

                                <label for="posSelectOverview"></label>
                                <select class="form-select" id="posSelectOverview">
                                    @forelse ($list_pos as $pos)
                                        <option value="{{ $pos->id }}">
                                            {{ $pos->nama }}
                                        </option>
                                    @empty
                                        <option value="-1" disabled>
                                            Tidak Ada Pos
                                        </option>
                                    @endforelse
                                </select>

                            </div>
                        </div>
                        <div id="chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Yearly Breakup -->
                        <div class="card overflow-hidden">
                            <div class="card-body p-4">
                                <h5 class="card-title mb-9 fw-semibold">
                                    Kelengkapan Laporan Hari Ini
                                </h5>
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h4 class="fw-semibold mb-3">
                                            1/{{ count($list_waktu) }} Total Laporan
                                        </h4>
                                        <div class="mb-3">
                                            <p class="text-dark">
                                                22 Februari 2024
                                            </p>
                                        </div>
                                        <div class="d-flex">
                                            <div class="me-4">
                                                <span
                                                    class="round-8 bg-primary d-inline-block"
                                                ></span>
                                                <span class="fs-2">
                                                    00:00-06:00
                                                </span>
                                            </div>
                                            <div class="me-4">
                                                <span
                                                    class="round-8 bg-danger d-inline-block"
                                                ></span>
                                                <span class="fs-2">
                                                    06:15-12:00
                                                </span>
                                            </div>
                                            <div class="me-4">
                                                <span
                                                    class="round-8 bg-danger d-inline-block"
                                                ></span>
                                                <span class="fs-2">
                                                    12:15-18:00
                                                </span>
                                            </div>
                                            <div class="me-4">
                                                <span
                                                    class="round-8 bg-danger d-inline-block"
                                                ></span>
                                                <span class="fs-2">
                                                    18:15-23:45
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div
                                            class="d-flex justify-content-center"
                                        >
                                            <div id="breakup"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row p-2">
            <div class="w-100 card">
                <div class="card-body">
                    <div
                        class="d-sm-flex d-block align-items-center justify-content-between mb-9"
                    >
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">
                                Riwayat Laporan
                            </h5>
                        </div>
                        <div class="d-flex">
                            <select class="form-select">
                                <option value="1">Batubi - Natuna</option>
                                <option value="2">Sei Raya - Karimun</option>
                                <option value="3">
                                    Teluk Radang - Karimun
                                </option>
                                <option value="4">Sawang - Karimun</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4 bg-primary border-bottom">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">
                                        Tanggal Laporan
                                    </h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">
                                        Lokasi Pos / Penjaga Pos
                                    </h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">
                                        Rentang Waktu
                                    </h6>
                                </th>
                                <th class="border-bottom-0 text-center">
                                    <h6 class="fw-semibold mb-0">
                                        Curah Hujan | Tinggi Muka Air |
                                        Klimatologi | Kualitas Air
                                    </h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($list_laporan as $item)
                                <tr>
                                    <td class="border-bottom-0">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border-bottom-0">
                                        {{ \Carbon\Carbon::createFromFormat("Y-m-d H:i:s", $item->tanggal)->locale("id_ID")->isoFormat("DD MMMM YYYY HH:mm:ss") }}
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            {{ $item->pos->nama }} /
                                            {{ $item->pos->wilayah->nama }}
                                        </h6>
                                        <h6 class="mb-0">
                                            {{ $item->user->name }}
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            {{ $item->konfigurasi_waktu->nama }}
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0">
                                            [{{ $item->curah_hujan }}]
                                            [{{ $item->tinggi_muka_air }}]
                                            [{{ $item->klimatologi }}]
                                            [{{ $item->kualitas_air }}]
                                        </h6>
                                    </td>

                                    <td
                                        class="border-bottom-0 d-flex column-gap-2"
                                    >
                                        <a
                                            class="btn rounded btn-primary"
                                            href="{{ route("laporan.edit", $item->id) }}"
                                        >
                                            <i
                                                class="ti ti-pencil fs-4 text-white"
                                            ></i>
                                        </a>
                                        <form
                                            action="{{ route("laporan.destroy", $item->id) }}"
                                            method="post"
                                        >
                                            @csrf
                                            @method("delete")
                                            <button
                                                class="btn rounded btn-danger"
                                            >
                                                <i
                                                    class="ti ti-trash fs-4 text-white"
                                                ></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if (count($list_laporan) > 5)
                            <nav
                                aria-label="Pagination"
                                class="d-flex justify-content-end mt-2"
                            >
                                <ul class="pagination">
                                    <li class="page-item">
                                        <a
                                            aria-label="Previous"
                                            class="page-link"
                                            href="#"
                                        >
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a
                                            aria-label="Next"
                                            class="page-link"
                                            href="#"
                                        >
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include("layouts.footer")
    </div>
@endsection

@push("script")
    <script type="module">
        let listLaporanPerPos = @json($laporan_per_pos);
        $(document).ready(function() {
            let listPos = @json($list_pos);
            let wilayahSelectOverview = $("#wilayahSelectOverview");
            let posSelectOverview = $("#posSelectOverview");

            function changedWilayah() {
                let selectedWilayah = $(this).val();
                let filteredPos = listPos
                    .filter((pos) => pos.wilayah_id == selectedWilayah)
                    .map((pos) => {
                        return {
                            value: pos.id,
                            text: pos.nama,
                        };
                    });

                posSelectOverview.empty();
                $.each(filteredPos, function (index, option) {
                    posSelectOverview.append(
                        $('<option>', {
                            value: option.value,
                            text: option.text,
                        }),
                    );
                });

                if (!filteredPos.length) {
                    posSelectOverview.append(
                        $('<option>', {
                            value: -1,
                            text: 'Tidak ada Pos',
                        }),
                    );
                }

                createChartOverview(posSelectOverview.val());
            }

            async function createChartOverview(idPos) {
                let chartData = {
                    series: [],
                    categories: []
                }
                const laporanPerPosSelected = listLaporanPerPos[idPos] || [];

                let keySeries = [{ label: "Curah Hujan", key: "curah_hujan"}, { label: "Tinggi Muka Air", key: "tinggi_muka_air"},
                    { label: "Klimatologi", key: "klimatologi"}, { label: "Kualitas Air", key: "kualitas_air"}];

                if (!laporanPerPosSelected.length) {
                    chartData.series = [];
                    chartData.categories = ["Tidak ada Data"]
                } else {
                    chartData.series = keySeries.map(item => {
                        return {
                            name: item.label,
                            data: laporanPerPosSelected.map(laporan => laporan[item.key])
                        }
                    })
                    chartData.categories = laporanPerPosSelected.map(item => {
                        const tanggal = new Date(item.tanggal);
                        const hari = tanggal.getDate();
                        const bulan = tanggal.getMonth() + 1;

                        return (('0' + hari).slice(-2) + '/' + ('0' + bulan).slice(-2))
                    })
                }



                console.log(chartData);
                let chartOptions = {

                    chart: {
                        type: "bar",
                        height: 345,
                        offsetX: -15,
                        toolbar: { show: true },
                        foreColor: "#adb0bb",
                        fontFamily: "inherit",
                        sparkline: { enabled: false },
                    },

                    colors: ["#5D87FF", "#49BEFF", "#fd7e14", "#13DEB9"],

                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: "35%",
                            borderRadius: [6],
                            borderRadiusApplication: "end",
                            borderRadiusWhenStacked: "all",
                        },
                    },
                    markers: { size: 0 },

                    dataLabels: {
                        enabled: false,
                    },

                    legend: {
                        show: false,
                    },

                    grid: {
                        borderColor: "rgba(0,0,0,0.1)",
                        strokeDashArray: 3,
                        xaxis: {
                            lines: {
                                show: false,
                            },
                        },
                    },

                    xaxis: {
                        type: "category",
                        categories: ["Tidak ada"],
                        labels: {
                            style: { cssClass: "grey--text lighten-2--text fill-color" },
                        },
                    },

                    yaxis: {
                        show: true,
                        min: 0,
                        max: 100,
                        tickAmount: 4,
                        labels: {
                            style: {
                                cssClass: "grey--text lighten-2--text fill-color",
                            },
                        },
                    },
                    stroke: {
                        show: true,
                        width: 3,
                        lineCap: "butt",
                        colors: ["transparent"],
                    },

                    tooltip: { theme: "light" },

                    responsive: [
                        {
                            breakpoint: 600,
                            options: {
                                plotOptions: {
                                    bar: {
                                        borderRadius: 3,
                                    },
                                },
                            },
                        },
                    ],
                }
                chartOptions.series = chartData.series;
                chartOptions.xaxis.categories = chartData.categories;

                let chartOverview = new ApexCharts(
                    document.querySelector("#chart"),
                    chartOptions,
                );
                await chartOverview.render();
            }

            wilayahSelectOverview.change(changedWilayah)
            wilayahSelectOverview.val(listPos[0].id).trigger("change");
        })


        $(async function () {
            let chartOptionsLaporan = {
                color: "#adb5bd",
                series: [1, 1, 1, 1],
                labels: ["00:00-06:00", "06:15-12:00", "12:15-18:00", "18:15-23:45"],
                chart: {
                    width: 180,
                    type: "donut",
                    fontFamily: "Plus Jakarta Sans', sans-serif",
                    foreColor: "#adb0bb",
                },
                plotOptions: {
                    pie: {
                        startAngle: 0,
                        endAngle: 360,
                        donut: {
                            size: "75%",
                        },
                    },
                },
                stroke: {
                    show: false,
                },

                dataLabels: {
                    enabled: false,
                },

                legend: {
                    show: false,
                },
                colors: ["#5D87FF", "#FA896B", "#FA896B", "#FA896B"],

                responsive: [
                    {
                        breakpoint: 991,
                        options: {
                            chart: {
                                width: 150,
                            },
                        },
                    },
                ],
                tooltip: {
                    theme: "dark",
                    fillSeriesColor: false,
                },
            };
            let chartLaporan = new ApexCharts(
                document.querySelector("#breakup"),
                chartOptionsLaporan,
            );
            await chartLaporan.render();
        });
    </script>
@endpush

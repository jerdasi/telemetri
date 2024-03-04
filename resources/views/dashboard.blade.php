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
                            <div class="d-flex">
                                <select class="form-select">
                                    <option value="1">Januari 2024</option>
                                    <option value="2">Februari 2024</option>
                                    <option value="3">Maret 2024</option>
                                    <option value="4">April 2024</option>
                                </select>
                                <select class="form-select">
                                    <option value="1">Semua Data</option>
                                    <option value="2">Curah Hujan</option>
                                    <option value="3">Tinggi Muka Air</option>
                                    <option value="4">Klimatologi</option>
                                    <option value="4">Kualitas Air</option>
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
                                            1/4 Total Laporan
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
                        <table class="table text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            Tanggal
                                        </h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            Penjaga Pos / Lokasi Pos
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
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            22 Februari 2024
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">
                                            Jeremia Daniel Silitonga
                                        </h6>
                                        <span class="fw-normal">
                                            Jemaja Timur - Kep. Anambas
                                        </span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div
                                            class="d-flex align-items-center gap-2"
                                        >
                                            <span
                                                class="badge bg-primary rounded-3 fw-semibold"
                                            >
                                                00:00-06:00
                                            </span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0 fs-4">
                                            [60] [20] [30] [45]
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <button class="btn rounded btn-primary">
                                            <i
                                                class="ti ti-pencil fs-4 text-white"
                                            ></i>
                                        </button>
                                        <button class="btn rounded btn-danger">
                                            <i
                                                class="ti ti-trash fs-4 text-white"
                                            ></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            22 Februari 2024
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">
                                            Jeremia Daniel Silitonga
                                        </h6>
                                        <span class="fw-normal">
                                            Dabo - Lingga
                                        </span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div
                                            class="d-flex align-items-center gap-2"
                                        >
                                            <span
                                                class="badge bg-secondary rounded-3 fw-semibold"
                                            >
                                                06:15-12:00
                                            </span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0 fs-4">
                                            [60] [20] [30] [45]
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <button class="btn rounded btn-primary">
                                            <i
                                                class="ti ti-pencil fs-4 text-white"
                                            ></i>
                                        </button>
                                        <button class="btn rounded btn-danger">
                                            <i
                                                class="ti ti-trash fs-4 text-white"
                                            ></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            22 Februari 2024
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">
                                            Jeremia Daniel Silitonga
                                        </h6>
                                        <span class="fw-normal">
                                            Sei Jago - Bintan
                                        </span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div
                                            class="d-flex align-items-center gap-2"
                                        >
                                            <span
                                                class="badge bg-danger rounded-3 fw-semibold"
                                            >
                                                12:15-18:00
                                            </span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0 fs-4">
                                            [60] [20] [30] [45]
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <button class="btn rounded btn-primary">
                                            <i
                                                class="ti ti-pencil fs-4 text-white"
                                            ></i>
                                        </button>
                                        <button class="btn rounded btn-danger">
                                            <i
                                                class="ti ti-trash fs-4 text-white"
                                            ></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            22 Februari 2024
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">
                                            Jeremia Daniel Silitonga
                                        </h6>
                                        <span class="fw-normal">
                                            Sei Raya - Karimun
                                        </span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div
                                            class="d-flex align-items-center gap-2"
                                        >
                                            <span
                                                class="badge bg-success rounded-3 fw-semibold"
                                            >
                                                18:15-23:45
                                            </span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0 fs-4">
                                            [60] [20] [30] [45]
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <button class="btn rounded btn-primary">
                                            <i
                                                class="ti ti-pencil fs-4 text-white"
                                            ></i>
                                        </button>
                                        <button class="btn rounded btn-danger">
                                            <i
                                                class="ti ti-trash fs-4 text-white"
                                            ></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            22 Februari 2024
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">
                                            Jeremia Daniel Silitonga
                                        </h6>
                                        <span class="fw-normal">
                                            Sei Raya - Karimun
                                        </span>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div
                                            class="d-flex align-items-center gap-2"
                                        >
                                            <span
                                                class="badge bg-success rounded-3 fw-semibold"
                                            >
                                                18:15-23:45
                                            </span>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <h6 class="fw-semibold mb-0 fs-4">
                                            [60] [20] [30] [45]
                                        </h6>
                                    </td>
                                    <td class="border-bottom-0 text-center">
                                        <button class="btn rounded btn-primary">
                                            <i
                                                class="ti ti-pencil fs-4 text-white"
                                            ></i>
                                        </button>
                                        <button class="btn rounded btn-danger">
                                            <i
                                                class="ti ti-trash fs-4 text-white"
                                            ></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <nav
                            aria-label="Pagination"
                            class="d-flex justify-content-end mt-2"
                        >
                            <ul class="pagination">
                                <li class="page-item">
                                    <a
                                        class="page-link"
                                        href="#"
                                        aria-label="Previous"
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
                                        class="page-link"
                                        href="#"
                                        aria-label="Next"
                                    >
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include("layouts.footer")
    </div>
@endsection

@extends("layouts.app-structure")

@section("title", "Laporan Pos")

@section("content")
    <div class="container-fluid">
        <h3 class="fw-bolder pb-2">Laporan Pos</h3>

        @if (session("message"))
            <div class="alert alert-info" role="alert">
                {{ session("message") }}
            </div>
        @endif

        <div class="card mb-0">
            <div class="card-body">
                <div class="d-flex justify-content-end column-gap-2">
                    <a
                        class="text-white btn btn-primary mb-4 col-8 col-sm-4 col-md-3 fs-3 btn-lg"
                        href="/laporan/create"
                    >
                        <i class="ti ti-plus me-1"></i>
                        Laporan
                    </a>
                    <a
                        class="text-white btn btn-success mb-4 col-8 col-sm-4 col-md-2 fs-3 btn-lg"
                        href="{{ url("laporan/export/excel") }}"
                    >
                        <i class="ti ti-download me-1"></i>
                        Export Laporan
                    </a>
                </div>
                <div
                    class="d-sm-flex d-block align-items-center justify-content-between mb-9"
                >
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">
                            Daftar Laporan Pos
                        </h5>
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

        @include("layouts.footer")
    </div>
@endsection

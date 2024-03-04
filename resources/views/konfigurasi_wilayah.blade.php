@extends("layouts.app-structure")

@section("title", "Konfigurasi Wilayah")

@section("content")
    <div class="container-fluid">
        <h3 class="fw-bolder pb-2">Konfigurasi Wilayah</h3>

        @if (session("message"))
            <div class="alert alert-info" role="alert">
                {{ session("message") }}
            </div>
        @endif

        <div class="card mb-0">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <a
                        class="text-white btn btn-primary mb-4 col-8 col-sm-4 col-md-3 fs-3 btn-lg"
                        href="/konfigurasi-wilayah/create"
                    >
                        <i class="ti ti-plus me-1"></i>
                        Wilayah
                    </a>
                </div>
                <div
                    class="d-sm-flex d-block align-items-center justify-content-between mb-9"
                >
                    <div class="mb-3 mb-sm-0">
                        <h5 class="card-title fw-semibold">Daftar Wilayah</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4 bg-primary border-bottom">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">No</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Nama</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Aksi</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_wilayah as $item)
                                <tr>
                                    <td class="border-bottom-0">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">
                                            {{ $item->nama }}
                                        </h6>
                                    </td>

                                    <td
                                        class="border-bottom-0 d-flex column-gap-2"
                                    >
                                        <a
                                            class="btn rounded btn-primary"
                                            href="{{ route("konfigurasi-wilayah.edit", $item->id) }}"
                                        >
                                            <i
                                                class="ti ti-pencil fs-4 text-white"
                                            ></i>
                                        </a>
                                        <form
                                            action="{{ route("konfigurasi-wilayah.destroy", $item->id) }}"
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
                    @if (count($list_wilayah) > 5)
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

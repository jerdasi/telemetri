@extends("layouts.app-structure")

@section("title", "Tambah Konfigurasi Wilayah")

@section("content")
    <div class="container-fluid">
        <h3 class="fw-bolder pb-2">Tambah Konfigurasi Wilayah</h3>
        <div class="card mb-0">
            <div class="card-body">
                <form
                    action="{{ route("konfigurasi-wilayah.store") }}"
                    method="post"
                >
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="nama">
                            Nama Wiilayah
                        </label>
                        <input
                            aria-describedby="inputNama"
                            class="form-control"
                            id="nama"
                            name="nama"
                            type="text"
                            value="{{ old("nama") }}"
                            placeholder="Nama Wilayah"
                        />
                        @error("nama")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a
                            class="btn btn-outline-dark col-6 col-sm-4 col-md-3"
                            href="/konfigurasi-wilayah"
                        >
                            Kembali
                        </a>

                        <button
                            class="btn btn-primary col-6 col-sm-4 col-md-3"
                            type="submit"
                        >
                            Tambah
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @include("layouts.footer")
    </div>
@endsection

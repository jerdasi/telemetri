@extends("layouts.app-structure")

@section("title", "Edit Konfigurasi Wilayah")

@section("content")
    <div class="container-fluid">
        <h3 class="fw-bolder pb-2">Edit Konfigurasi Wilayah</h3>
        <div class="card mb-0">
            <div class="card-body">
                <form
                    action="{{ route("konfigurasi-wilayah.update", $wilayah->id) }}"
                    method="post"
                >
                    @csrf
                    @method("put")
                    <div class="mb-3">
                        <label class="form-label" for="nama">
                            Nama Wilayah
                        </label>
                        <input
                            aria-describedby="inputNama"
                            class="form-control"
                            id="nama"
                            name="nama"
                            placeholder="Nama Wilayah"
                            type="text"
                            value="{{ old("nama") ?? $wilayah->nama }}"
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
                            Edit
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @include("layouts.footer")
    </div>
@endsection

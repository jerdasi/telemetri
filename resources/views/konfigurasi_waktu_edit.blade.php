@extends("layouts.app-structure")

@section("title", "Edit Konfigurasi Waktu")

@section("content")
    <div class="container-fluid">
        <h3 class="fw-bolder pb-2">Edit Konfigurasi Waktu</h3>
        <div class="card mb-0">
            <div class="card-body">
                <form
                    action="{{ route("konfigurasi-waktu.update", $konfigurasiWaktu->id) }}"
                    method="post"
                >
                    @csrf
                    @method("put")
                    <div class="mb-3">
                        <label class="form-label" for="nama">
                            Nama Rentang Waktu
                        </label>
                        <input
                            aria-describedby="inputNama"
                            class="form-control"
                            id="nama"
                            name="nama"
                            placeholder="HH:mm - HH:mm"
                            type="text"
                            value="{{ old("nama") ?? $konfigurasiWaktu->nama }}"
                        />
                        @error("nama")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a
                            class="btn btn-outline-dark col-6 col-sm-4 col-md-3"
                            href="/konfigurasi-waktu"
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

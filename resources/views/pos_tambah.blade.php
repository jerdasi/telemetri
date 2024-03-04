@extends("layouts.app-structure")

@section("title", "Tambah Pos")

@section("content")
    <div class="container-fluid">
        <h3 class="fw-bolder pb-2">Tambah Pos</h3>
        <div class="card mb-0">
            <div class="card-body">
                <form action="{{ route("pos.store") }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="nama">Nama Pos</label>
                        <input
                            aria-describedby="inputNama"
                            class="form-control"
                            id="nama"
                            name="nama"
                            placeholder="Nama Pos"
                            type="text"
                            value="{{ old("nama") }}"
                        />
                        @error("nama")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="wilayah_id">
                            Wilayah
                        </label>
                        <select
                            class="form-control"
                            aria-describedby="inputWilayahId"
                            id="wilayah_id"
                            name="wilayah_id"
                        >
                            <option value="">Pilih Jenis Wilayah</option>
                            @forelse ($list_wilayah as $wilayah)
                                <option
                                    value="{{ $wilayah->id }}"
                                    {{ old("wilayah_id") == $wilayah->id ? "selected" : "" }}
                                >
                                    {{ $wilayah->nama }}
                                </option>
                            @empty
                                <option value="">Tidak Ada Wilayah</option>
                            @endforelse
                        </select>
                        @error("wilayah_id")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a
                            class="btn btn-outline-dark col-6 col-sm-4 col-md-3"
                            href="/pos"
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

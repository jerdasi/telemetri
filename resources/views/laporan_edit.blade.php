@extends("layouts.app-structure")

@section("title", "Edit Laporan")

@section("content")
    <div class="container-fluid">
        <h3 class="fw-bolder pb-2">Edit Informasi Laporan</h3>
        <div class="card mb-0">
            <div class="card-body">
                <form
                    action="{{ route("laporan.update", $laporan->id) }}"
                    method="post"
                >
                    @csrf
                    @method("put")

                    <div class="mb-3">
                        <label class="form-label" for="inputNamaPenjaga">
                            Pelapor
                        </label>
                        <input
                            aria-describedby="inputNamaPenjaga"
                            class="form-control"
                            id="inputNamaPenjaga"
                            type="text"
                            name="user_id"
                            value="{{ $laporan->user->name }}"
                            disabled
                        />
                        @error("user_id")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3 d-lg-flex column-gap-3">
                        <div class="mb-3 col">
                            <label class="form-label" for="inputTanggalLaporan">
                                Tanggal
                            </label>
                            <input
                                name="tanggal"
                                aria-describedby="inputTanggalLaporan"
                                class="form-control"
                                id="inputTanggalLaporan"
                                type="datetime-local"
                                value="{{ old("tanggal") ?? $laporan->tanggal }}"
                            />
                            @error("tanggal")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3 col">
                            <div class="mb-3">
                                <label class="form-label" for="inputWilayah">
                                    Wilayah
                                </label>
                                <select
                                    class="form-select"
                                    id="inputWilayah"
                                    name="wilayah_id"
                                >
                                    <option value="0">Pilih salah satu</option>
                                    @forelse ($list_wilayah as $wilayah)
                                        <option value="{{ $wilayah->id }}">
                                            {{ $wilayah->nama }}
                                        </option>
                                    @empty
                                        <option value="-1" disabled>
                                            Tidak Ada Pos
                                        </option>
                                    @endforelse
                                </select>
                                @error("wilayah_id")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label" for="inputNamaPos">
                                    Nama Pos
                                </label>
                                <select
                                    class="form-select"
                                    id="inputNamaPos"
                                    name="pos_id"
                                    disabled
                                >
                                    <option value="0">Pilih salah satu</option>
                                    @forelse ($list_pos as $pos)
                                        <option
                                            value="{{ $pos->id }}"
                                            {{ (old("pos_id") ?? $laporan->pos_id) == $pos->id ? "selected" : "" }}
                                        >
                                            {{ $pos->nama }} /
                                            {{ $pos->wilayah->nama }}
                                        </option>
                                    @empty
                                        <option value="-1" disabled>
                                            Tidak Ada Pos
                                        </option>
                                    @endforelse
                                </select>
                                @error("pos_id")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-lg-flex align-items-stretch column-gap-3">
                        <div class="col">
                            <label class="form-label" for="inputRentangWaktu">
                                Rentang Waktu
                            </label>
                            <select
                                class="form-select"
                                id="inputRentangWaktu"
                                name="waktu_id"
                            >
                                <option value="0">Pilih salah satu</option>
                                @forelse ($list_waktu as $waktu)
                                    <option
                                        value="{{ $waktu->id }}"
                                        {{ (old("waktu_id") ?? $laporan->waktu_id) == $waktu->id ? "selected" : "" }}
                                    >
                                        {{ $waktu->nama }}
                                    </option>
                                @empty
                                    <option value="-1" disabled>
                                        Tidak Ada Pos
                                    </option>
                                @endforelse
                            </select>
                            @error("waktu_id")
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div
                            class="col d-sm-flex mt-3 mt-lg-0 align-items-stretch column-gap-2"
                        >
                            <div class="mb-3">
                                <label class="form-label" for="inputCurahHujan">
                                    Curah Hujan
                                </label>
                                <input
                                    aria-describedby="inputCurahHujan"
                                    class="form-control"
                                    id="inputCurahHujan"
                                    type="number"
                                    name="curah_hujan"
                                    placeholder="Isi angka"
                                    value="{{ old("curah_hujan") ?? $laporan->curah_hujan }}"
                                />
                                @error("curah_hujan")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="inputTinggiMukaAir"
                                >
                                    Tinggi Muka Air
                                </label>
                                <input
                                    aria-describedby="inputTinggiMukaAir"
                                    class="form-control"
                                    id="inputTinggiMukaAir"
                                    type="number"
                                    name="tinggi_muka_air"
                                    placeholder="Isi angka"
                                    value="{{ old("tinggi_muka_air") ?? $laporan->tinggi_muka_air }}"
                                />
                                @error("tinggi_muka_air")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="inputKlimatologi"
                                >
                                    Klimatologi
                                </label>
                                <input
                                    aria-describedby="inputKlimatologi"
                                    class="form-control"
                                    id="inputKlimatologi"
                                    type="number"
                                    name="klimatologi"
                                    placeholder="Isi angka"
                                    value="{{ old("klimatologi") ?? $laporan->klimatologi }}"
                                />
                                @error("klimatologi")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label
                                    class="form-label"
                                    for="inputKualitasAir"
                                >
                                    Kualitas Air
                                </label>
                                <input
                                    aria-describedby="inputKualitasAir"
                                    class="form-control"
                                    id="inputKualitasAir"
                                    type="number"
                                    name="kualitas_air"
                                    placeholder="Isi angka"
                                    value="{{ old("kualitas_air") ?? $laporan->kualitas_air }}"
                                />
                                @error("kualitas_air")
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a
                            class="btn btn-outline-dark col-6 col-sm-4 col-md-3"
                            href="/laporan"
                        >
                            Kembali
                        </a>

                        <button
                            class="btn btn-primary col-6 col-sm-4 col-md-3"
                            type="submit"
                        >
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>

        @include("layouts.footer")
    </div>
@endsection

@push("script")
    <script type="module">
        $(document).ready(function () {
            let selectedWilayah = {{ $laporan->pos->wilayah_id }};
            let selectedPos = {{ $laporan->pos_id }};

            let listWilayah = @json($list_wilayah);
            let listPos = @json($list_pos);

            $('select[name="wilayah_id"]').change(function () {
                let selectedWilayah = $(this).val();

                let posInputEl = $('select[name="pos_id"]');

                posInputEl.empty();

                let filteredPos = [];
                if (selectedWilayah != 0) {
                    posInputEl.prop('disabled', false);
                    filteredPos = listPos
                        .filter((pos) => pos.wilayah_id == selectedWilayah)
                        .map((pos) => {
                            return {
                                value: pos.id,
                                text: pos.nama,
                            };
                        });
                } else {
                    posInputEl.prop('disabled', true);
                    filteredPos = listPos.map((pos) => {
                        return {
                            value: pos.id,
                            text: pos.nama,
                        };
                    });
                }

                posInputEl.append(
                    $('<option>', {
                        value: 0,
                        text: 'Pilih salah satu',
                    }),
                );

                $.each(filteredPos, function (index, option) {
                    posInputEl.append(
                        $('<option>', {
                            value: option.value,
                            text: option.text,
                        }),
                    );
                });

                if (!filteredPos.length) {
                    posInputEl.append(
                        $('<option>', {
                            value: -1,
                            text: 'Tidak ada Pos',
                            disabled: true,
                        }),
                    );
                }
            });

            // Set Selected Wilayah dan Pos
            $('select[name="wilayah_id"]')
                .val(selectedWilayah)
                .trigger('change');
            $('select[name="pos_id"]').val(selectedPos);
        });
    </script>
@endpush

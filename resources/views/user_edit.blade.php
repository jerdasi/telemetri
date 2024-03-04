@extends("layouts.app-structure")

@section("title", "Edit Informasi User")

@section("content")
    <div class="container-fluid">
        <h3 class="fw-bolder pb-2">Edit Informasi User</h3>
        <div class="card mb-0">
            <div class="card-body">
                <form
                    action="{{ route("konfigurasi-user.update", $user->id) }}"
                    method="post"
                >
                    @csrf
                    @method("put")
                    <div class="mb-3">
                        <label class="form-label" for="inputNama">Nama</label>
                        <input
                            aria-describedby="inputNama"
                            class="form-control"
                            id="inputNama"
                            type="text"
                            name="name"
                            value="{{ old("name") ?? $user->name }}"
                            placeholder="Nama User"
                        />
                        @error("name")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="inputUsername">
                            Username
                        </label>
                        <input
                            aria-describedby="inputUsername"
                            class="form-control"
                            id="inputUsername"
                            type="text"
                            name="username"
                            value="{{ old("username") ?? $user->username }}"
                            placeholder="Username"
                        />
                        @error("username")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="inputEmail">Email</label>
                        <input
                            aria-describedby="inputEmail"
                            class="form-control"
                            id="inputEmail"
                            type="email"
                            name="email"
                            value="{{ old("email") ?? $user->email}}"
                            placeholder="Email"
                        />
                        @error("email")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="inputPassword">
                            Password
                        </label>
                        <div class="input-group">
                            <input
                                type="password"
                                id="password"
                                class="form-control"
                                placeholder="Masukkan Password Baru"
                                aria-label="Password"
                                aria-describedby="togglePassword"
                                name="password"
                                value="{{ old("password") }}"
                            />
                            <button
                                class="btn btn-dark"
                                type="button"
                                id="togglePassword"
                            >
                                <i class="ti ti-eye-off"></i>
                            </button>
                        </div>
                        <small class="text-muted">Isi jika anda ingin mengganti password baru</small>

                        @error("password")
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 row">
                        <div class="col-6">
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
                        <div class="col-6">
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
                                        {{ old("pos_id") == $pos->id ? "selected" : "" }}
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

                    <div class="d-flex justify-content-end gap-2">
                        <a
                            class="btn btn-outline-dark col-6 col-sm-4 col-md-3"
                            href="/konfigurasi-user"
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
            let selectedWilayah = {{ $user->pos->wilayah_id }};
            let selectedPos = {{ $user->pos_id }};

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

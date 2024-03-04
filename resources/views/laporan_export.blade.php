<table class="table text-nowrap mb-0 align-middle">
    <thead class="text-dark fs-4 bg-primary border-bottom">
        <tr>
            <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">No</h6>
            </th>
            <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Tanggal Laporan</h6>
            </th>
            <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Lokasi Pos / Penjaga Pos</h6>
            </th>
            <th class="border-bottom-0">
                <h6 class="fw-semibold mb-0">Rentang Waktu</h6>
            </th>
            <th class="border-bottom-0 text-center">
                <h6 class="fw-semibold mb-0">Curah Hujan</h6>
            </th>
            <th class="border-bottom-0 text-center">
                <h6 class="fw-semibold mb-0">Tinggi Muka Air</h6>
            </th>
            <th class="border-bottom-0 text-center">
                <h6 class="fw-semibold mb-0">Klimatologi</h6>
            </th>
            <th class="border-bottom-0 text-center">
                <h6 class="fw-semibold mb-0">Kualitas Air</h6>
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
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">
                        {{ $item->curah_hujan }}
                    </h6>
                </td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">
                        {{ $item->tinggi_muka_air }}
                    </h6>
                </td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">
                        {{ $item->klimatologi }}
                    </h6>
                </td>
                <td class="border-bottom-0">
                    <h6 class="fw-semibold mb-0">
                        {{ $item->kualitas_air }}
                    </h6>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\KonfigurasiWaktu;
use App\Models\Laporan;
use App\Models\Pos;
use App\Models\User;
use App\Models\Wilayah;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $wilayah = [
            'Natuna', 'Lingga', 'Kep. Anambas', 'Batam', 'Karimun', 'Bintan'
        ];
        $pos = [
            [
                "nama" => "Batubi",
                "wilayah_id" => 1
            ],
            [
                "nama" => "Dabo",
                "wilayah_id" => 2
            ],
            [
                "nama" => "Daik",
                "wilayah_id" => 2
            ],
            [
                "nama" => "Jemaja Timur",
                "wilayah_id" => 3
            ],
            [
                "nama" => "Pal Matak",
                "wilayah_id" => 3
            ],
            [
                "nama" => "Piayu",
                "wilayah_id" => 4
            ],
            [
                "nama" => "WTP I Rintis",
                "wilayah_id" => 3
            ],
            [
                "nama" => "Sagulung",
                "wilayah_id" => 4
            ],
            [
                "nama" => "Sawang",
                "wilayah_id" => 5
            ],
            [
                "nama" => "Sei Jago",
                "wilayah_id" => 6
            ],
            [
                "nama" => "Sei Raya",
                "wilayah_id" => 5
            ],
            [
                "nama" => "Sekanak II",
                "wilayah_id" => 4
            ],
            [
                "nama" => "Teluk Radang",
                "wilayah_id" => 5
            ]
        ];
        $konfigurasi_waktu = [
            "00:00-06:00",
            "06:15-12:00",
            "12:15-18:00",
            "18:15-23:45"
        ];
        $laporan = [
            [
                "tanggal" => Carbon::createFromDate(2024, 03, 01),
                "user_id" => 2,
                "pos_id" => 1,
                "waktu_id" => 1,
                "curah_hujan" => 40,
                "tinggi_muka_air" => 50,
                "klimatologi" => 76,
                "kualitas_air" => 78
            ],
            [
                "tanggal" => Carbon::createFromDate(2024, 03, 01),
                "user_id" => 2,
                "pos_id" => 1,
                "waktu_id" => 2,
                "curah_hujan" => 50,
                "tinggi_muka_air" => 52,
                "klimatologi" => 73,
                "kualitas_air" => 60
            ],
            [
                "tanggal" => Carbon::createFromDate(2024, 03, 01),
                "user_id" => 2,
                "pos_id" => 1,
                "waktu_id" => 3,
                "curah_hujan" => 55,
                "tinggi_muka_air" => 52,
                "klimatologi" => 73,
                "kualitas_air" => 60
            ],
            [
                "tanggal" => Carbon::createFromDate(2024, 03, 01),
                "user_id" => 2,
                "pos_id" => 2,
                "waktu_id" => 2,
                "curah_hujan" => 80,
                "tinggi_muka_air" => 52,
                "klimatologi" => 73,
                "kualitas_air" => 40
            ]
        ];

        foreach ($wilayah as $item) {
            Wilayah::create(['nama' => $item]);
        }

        foreach ($pos as $item) {
            Pos::create($item);
        }

        foreach ($konfigurasi_waktu as $item) {
            KonfigurasiWaktu::create(['nama' => $item]);
        }

        // Admin Account Test
        User::create([
            'name' => "Super Admin",
            'username' => 'superadmin',
            'is_admin' => 1,
            'email' => "bwws@gmail.com",
            'password' => Hash::make("superadmin"),
        ]);

        // Pengaja Pos Account Test
        User::create([
            'name' => "Jeremia Daniel Silitonga",
            'username' => 'jerdasi',
            'email' => "jerdasi@gmail.com",
            'pos_id' => 1,
            'password' => Hash::make("jerdasi"),
        ]);

        foreach ($laporan as $item) {
            Laporan::create($item);
        }
    }
}

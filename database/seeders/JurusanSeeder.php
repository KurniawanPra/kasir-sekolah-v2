<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jurusans = [
            [
                'kode_jurusan' => 'RPL',
                'nama_jurusan' => 'Rekayasa Perangkat Lunak',
                'keterangan' => 'Kompetensi keahlian yang mempelajari pengembangan perangkat lunak, pemrograman web dan mobile.',
                'status' => 'aktif',
            ],
            [
                'kode_jurusan' => 'TKJ',
                'nama_jurusan' => 'Teknik Komputer dan Jaringan',
                'keterangan' => 'Kompetensi keahlian yang mempelajari perakitan komputer, instalasi jaringan, dan administrasi server.',
                'status' => 'aktif',
            ],
            [
                'kode_jurusan' => 'AKL',
                'nama_jurusan' => 'Akuntansi dan Keuangan Lembaga',
                'keterangan' => 'Kompetensi keahlian yang mendalami pencatatan transaksi keuangan dan pembukuan akuntansi.',
                'status' => 'aktif',
            ],
            [
                'kode_jurusan' => 'MPLB',
                'nama_jurusan' => 'Manajemen Perkantoran dan Layanan Bisnis',
                'keterangan' => 'Kompetensi keahlian administrasi perkantoran, kearsipan digital, dan korespondensi bisnis.',
                'status' => 'aktif',
            ],
            [
                'kode_jurusan' => 'DKV',
                'nama_jurusan' => 'Desain Komunikasi Visual',
                'keterangan' => 'Kompetensi keahlian desain grafis, ilustrasi, animasi, dan multimedia interaktif.',
                'status' => 'aktif',
            ],
        ];

        foreach ($jurusans as $item) {
            Jurusan::firstOrCreate(
                ['kode_jurusan' => $item['kode_jurusan']],
                $item
            );
        }
    }
}

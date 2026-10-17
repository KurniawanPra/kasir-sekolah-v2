<?php

namespace Database\Factories;

use App\Models\Jurusan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Jurusan>
 */
class JurusanFactory extends Factory
{
    protected $model = Jurusan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jurusanList = [
            ['kode' => 'RPL', 'nama' => 'Rekayasa Perangkat Lunak'],
            ['kode' => 'TKJ', 'nama' => 'Teknik Komputer dan Jaringan'],
            ['kode' => 'AKL', 'nama' => 'Akuntansi dan Keuangan Lembaga'],
            ['kode' => 'MPLB', 'nama' => 'Manajemen Perkantoran dan Layanan Bisnis'],
            ['kode' => 'BDP', 'nama' => 'Bisnis Daring dan Pemasaran'],
            ['kode' => 'DKV', 'nama' => 'Desain Komunikasi Visual'],
            ['kode' => 'TKR', 'nama' => 'Teknik Kendaraan Ringan'],
            ['kode' => 'TBSM', 'nama' => 'Teknik dan Bisnis Sepeda Motor'],
            ['kode' => 'TBG', 'nama' => 'Tata Boga'],
            ['kode' => 'TBS', 'nama' => 'Tata Busana'],
        ];

        $selected = fake()->randomElement($jurusanList);
        $uniqueSuffix = fake()->unique()->numberBetween(10, 999);

        return [
            'kode_jurusan' => $selected['kode'].'-'.$uniqueSuffix,
            'nama_jurusan' => $selected['nama'].' '.$uniqueSuffix,
            'keterangan' => fake()->sentence(),
            'status' => 'aktif',
        ];
    }

    /**
     * Indicate that the jurusan is tidak aktif.
     */
    public function tidakAktif(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'tidak aktif',
        ]);
    }
}

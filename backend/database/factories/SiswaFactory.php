<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenis_kelamin = $this->faker->randomElement(['laki-laki', 'perempuan']);

        $agama = $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu']);

        $jurusan = $this->faker->randomElement(['Rekayasa Perangkat Lunak', 'Administrasi Perkantoran', 'Perawatan Sosial', 'Akuntansi dan Keuangan']);

        return [
            'username' => "@" . $this->faker->unique()->userName(),
            'nama' => $this->faker->firstName($jenis_kelamin),
            'nisn' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'nis' => $this->faker->unique()->numberBetween(100000000000, 999999999999),
            'tempat_tgl_lahir' => $this->faker->city . ', ' . $this->faker->dateTimeBetween('-30 years', '-15 years')->format('Y-m-d'),
            'alamat' => $this->faker->address,
            'jurusan' => $jurusan,
            'jenis_kelamin' => $jenis_kelamin,
            'agama' => $agama,
        ];
    }
}

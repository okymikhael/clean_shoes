<?php

namespace Database\Factories;

use App\Models\Aktifitas;
use Illuminate\Database\Eloquent\Factories\Factory;

class AktifitasFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aktifitas::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_buku' => $this->faker->randomElement([1, 2, 3, 4]),
            'id_siswa' => $this->faker->randomElement([1, 2, 3, 4]),
            'id_admin' => $this->faker->randomElement([1, 2, 3, 4]),
            'status' => $this->faker->randomElement(['pinjam', 'kembali']),
            'tenggat_waktu' => $this->faker->dateTime('now'),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Guru;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuruFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Guru::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => '000'.$this->faker->numberBetween(2000000, 8000000),
            'nama_guru' => $this->faker->nama_guru,
            'jenis_ptk' => $this->faker->jenis_ptk,
            'wali_kelas' => $this->faker->wali_kelas,
        ];
    }
}

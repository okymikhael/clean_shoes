<?php

namespace Database\Factories;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Siswa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nisn' => '000'.$this->faker->numberBetween(2000000, 8000000),
            'name' => $this->faker->name,
            'gender' => $this->faker->randomElement(['m', 'f']),
            'address' => $this->faker->address,
            'class' => $this->faker->randomElement(['X-A', 'X-B', 'XI-A', 'XI-B', 'XII-A', 'XII-B']),
        ];
    }
}

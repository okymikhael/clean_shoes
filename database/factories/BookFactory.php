<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul_buku' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'pengarang' => $this->faker->name,
            'tahun' => $this->faker->dateTime('now'),
            'jenis_buku' => $this->faker->randomElement(['pelajaran', 'bacaan', 'jurnal',]),
            'jumlah' => '000'.$this->faker->numberBetween(2000000, 8000000),
        ];
    }
}

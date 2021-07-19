<?php

namespace Database\Factories\DynamicWeb;

use App\Models\DynamicWeb\Book;
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
           'title' => 'Executive Orders',
           'published_at' => '1996',
            'isbn' => '0-425-15863-2'
        ];
        //todo: 41 Grafik
    }
}

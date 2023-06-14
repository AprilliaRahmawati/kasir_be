<?php

namespace Database\Factories;

use App\Models\Transaction;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        return [
            'number' => 'TRX' . $faker->unique()->randomNumber(4),
            'total' => $faker->numberBetween(1000, 100000),
            'nama' => $faker->name,
            'bayar' => $faker->numberBetween(1000, 100000),
            'kembali' => $faker->numberBetween(0, 50000),
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\DetailTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailTransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DetailTransaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'price' => $this->faker->numberBetween(1000, 10000),
            'quantity' => $this->faker->numberBetween(1, 10),
            'total' => $this->faker->numberBetween(1000, 10000),
        ];
    }

    /**
     * Indicate the associated transaction for the detail transaction.
     *
     * @param  int  $transactionId
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withTransaction($transactionId)
    {
        return $this->state(function (array $attributes) use ($transactionId) {
            return [
                'transaction_id' => $transactionId,
            ];
        });
    }

    /**
     * Indicate the associated product for the detail transaction.
     *
     * @param  int  $productId
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function withProduct($productId)
    {
        return $this->state(function (array $attributes) use ($productId) {
            return [
                'product_id' => $productId,
            ];
        });
    }
}

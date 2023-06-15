<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailTransaction;
use Database\Factories\DetailTransactionFactory;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        $transactions = \App\Models\Transaction::pluck('id');
        $products = \App\Models\Product::pluck('id');

        foreach ($transactions as $transactionId) {
            foreach ($products as $productId) {
                DetailTransactionFactory::new()
                    ->withTransaction($transactionId)
                    ->withProduct($productId)
                    ->create();
            }
        }
    }
}


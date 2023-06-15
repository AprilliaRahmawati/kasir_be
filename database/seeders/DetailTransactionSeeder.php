<?php

namespace Database\Seeders;

use App\Models\DetailTransaction;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        $transactions = Transaction::pluck('id');
        $products = Product::pluck('id');

        foreach ($transactions as $transactionId) {
            foreach ($products as $productId) {
                DetailTransaction::factory()
                    ->withTransaction($transactionId)
                    ->withProduct($productId)
                    ->create();
            }
        }
    }
}


<?php

namespace Database\Seeders;

use App\Models\DetailTransaction;
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
        DetailTransaction::factory()->count(10)->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Spending;
use Illuminate\Database\Seeder;

class SpendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Spending::factory(50)->create();
    }
}
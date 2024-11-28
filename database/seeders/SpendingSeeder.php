<?php

namespace Database\Seeders;

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
        $spendings = [
            [
                'category_id' => 2,
                'created_by' => 1,
                'name' => 'Mua tài liệu ôn thi',
                'amount' => 50000,
                'used_date' => '2024-09-10 12:00:00',
                'note' => 'in phao quay cóp',
            ],
            [
                'category_id' => 3,
                'created_by' => 1,
                'name' => 'Mua quần áo đá bóng',
                'amount' => 125000,
                'used_date' => '2024-09-11 8:00:00',
                'note' => 'đồ đá bóng giải',
            ],
            [
                'category_id' => 5,
                'created_by' => 2,
                'name' => 'Mua vape để trải nghiệm',
                'amount' => 500000,
                'used_date' => '2024-01-10 15:30:00',
                'note' => 'thuốc lá điện tử',
            ]
        ];

        foreach ($spendings as $spending) {
            Spending::create($spending);
        }
        // Spending::factory(50)->create();
    }
}

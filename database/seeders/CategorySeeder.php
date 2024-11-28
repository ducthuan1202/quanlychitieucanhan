<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Sinh Hoạt Thiết Yếu', 'short_desc' => 'Sinh Hoạt Thiết Yếu'],
            ['name' => 'Giáo Dục - Học Tập', 'short_desc' => 'Giáo Dục - Học Tập'],
            ['name' => 'Mua Sắm', 'short_desc' => 'Mua Sắm'],
            ['name' => 'Đầu Tư', 'short_desc' => 'Đầu Tư'],
            ['name' => 'Giải Trí', 'short_desc' => 'Giải Trí'],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // các tham số truyền vào hàm create chính là thuộc tính ghi đè khi tạo mới 
        // chẳng hạn, như ở đây, 3 field này sẽ ghi đè cho giá trị bên trng UserFactory
        User::factory()->create();
    }
}

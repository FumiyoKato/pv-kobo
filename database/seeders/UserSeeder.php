<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // テストデータを10件作成
        User::factory()->count(10)->create();

        // 未検証のユーザーを5件作成（必要に応じて使用）
        // User::factory()->count(5)->unverified()->create();
    }
}
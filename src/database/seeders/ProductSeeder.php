<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'キウイ',
            'price' => 800,
            'description' => 'キウイは甘みと酸味のバランスが絶妙なフルーツです。',
            'image' => 'kiwi.png',
            'season_id' => 1, // 春 とか、表の指定に合わせる
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'description' => '大人から子供まで人気のストロベリー。',
            'image' => 'strawberry.png',
            'season_id' => 2,
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'description' => '大人から子供まで人気のストロベリー。',
            'image' => 'strawberry.png',
            'season_id' => 2,
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'description' => '大人から子供まで人気のストロベリー。',
            'image' => 'strawberry.png',
            'season_id' => 2,
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'description' => '大人から子供まで人気のストロベリー。',
            'image' => 'strawberry.png',
            'season_id' => 2,
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'description' => '大人から子供まで人気のストロベリー。',
            'image' => 'strawberry.png',
            'season_id' => 2,
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'description' => '大人から子供まで人気のストロベリー。',
            'image' => 'strawberry.png',
            'season_id' => 2,
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'description' => '大人から子供まで人気のストロベリー。',
            'image' => 'strawberry.png',
            'season_id' => 2,
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'description' => '大人から子供まで人気のストロベリー。',
            'image' => 'strawberry.png',
            'season_id' => 2,
        ]);

        Product::create([
            'name' => 'ストロベリー',
            'price' => 1200,
            'description' => '大人から子供まで人気のストロベリー。',
            'image' => 'strawberry.png',
            'season_id' => 2,
        ]);

    }
}
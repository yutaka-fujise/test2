<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Season;

class SeasonSeeder extends Seeder
{
    public function run()
    {
        foreach (['春','夏','秋','冬'] as $name) {
            Season::create(['name' => $name]);
        }
    }
}

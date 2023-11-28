<?php

namespace Database\Seeders;

use App\Models\Filho;
use Illuminate\Database\Seeder;

class FilhoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Filho::factory()
            ->count(5)
            ->create();
    }
}

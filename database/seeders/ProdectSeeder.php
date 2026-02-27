<?php

namespace Database\Seeders;

use App\Models\Prodect;
use Illuminate\Database\Seeder;

class ProdectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodect::factory(100)->create();
    }
}

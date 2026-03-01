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
        $targetCount = 100;
        $currentCount = Prodect::count();
        $missing = max(0, $targetCount - $currentCount);

        if ($missing > 0) {
            Prodect::factory($missing)->create();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Prodect;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BackfillProdectImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $diskPath = storage_path('app/public/prodects');

        if (! File::exists($diskPath)) {
            File::makeDirectory($diskPath, 0755, true);
        }

        Prodect::query()
            ->whereNull('image')
            ->orWhere('image', '')
            ->chunkById(100, function ($prodects) use ($diskPath): void {
                foreach ($prodects as $prodect) {
                    $fileName = Str::uuid() . '.svg';
                    $relativePath = 'prodects/' . $fileName;
                    $fullPath = $diskPath . DIRECTORY_SEPARATOR . $fileName;
                    $label = Str::upper(Str::substr(Str::slug($prodect->name, '') ?: 'PRD', 0, 6));
                    $bgColor = sprintf('#%06X', mt_rand(0, 0xFFFFFF));

                    $svg = "<svg xmlns='http://www.w3.org/2000/svg' width='600' height='400'>"
                        . "<rect width='100%' height='100%' fill='{$bgColor}'/>"
                        . "<text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' "
                        . "font-family='Arial, sans-serif' font-size='48' fill='white'>{$label}</text>"
                        . '</svg>';

                    File::put($fullPath, $svg);
                    $prodect->update(['image' => $relativePath]);
                }
            });
    }
}

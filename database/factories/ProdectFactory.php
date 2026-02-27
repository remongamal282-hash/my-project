<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prodect>
 */
class ProdectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $diskPath = storage_path('app/public/prodects');

        if (! File::exists($diskPath)) {
            File::makeDirectory($diskPath, 0755, true);
        }

        $fileName = Str::uuid() . '.svg';
        $relativePath = 'prodects/' . $fileName;
        $fullPath = $diskPath . DIRECTORY_SEPARATOR . $fileName;
        $label = Str::upper(Str::substr(Str::slug(fake()->words(2, true), ''), 0, 6));
        $bgColor = fake()->hexColor();

        $svg = "<svg xmlns='http://www.w3.org/2000/svg' width='600' height='400'>"
            . "<rect width='100%' height='100%' fill='{$bgColor}'/>"
            . "<text x='50%' y='50%' dominant-baseline='middle' text-anchor='middle' "
            . "font-family='Arial, sans-serif' font-size='48' fill='white'>{$label}</text>"
            . '</svg>';

        File::put($fullPath, $svg);

        return [
            'name' => fake()->words(3, true),
            'descripshin' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 1, 9999),
            'image' => $relativePath,
        ];
    }
}

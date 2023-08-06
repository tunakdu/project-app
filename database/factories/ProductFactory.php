<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        $products = [
            'Süt',
            'Yoğurt',
            'Peynir',
            'Domates',
            'Salatalık',
            'Biber',
            'Soğan',
            'Maydanoz',
            'Dereotu',
            'Roka',
            'Limon',
            'Portakal',
            'Elma',
            'Muz',
            'Üzüm',
            'Havuç',
            'Patates',
            'Kabak',
            'Kereviz',
            'Ispanak',
            'Mantar',
            'Sarımsak',
            'Zeytin',
            'Salam',
            'Sosis',
            'Sucuk',
            'Pastırma',
            'Tavuk Göğsü',
            'Tavuk But',
            'Dana Eti',
            'Balık',
            'Yumurta',
            'Reçel',
            'Zeytin Yağı',
            'Sıvı Yağ',
            'Soda',
            'Maden Suyu',
            'Ayran',
            'Kola',
            'Soda',
            'Meyve Suyu',
            'Ketçap',
            'Mayonez',
            'Hardal',
            'Tereyağı',
            'Yogurt',
            'Krem Şanti',
            'Margarin'
        ];

        return [
            'name' => $this->faker->unique()->randomElement($products),
            'image_url' => 'https://example.com/images/' . strtolower($this->faker->unique()->randomElement($products)) . '.jpg',
            'type' => $this->faker->randomElement(['adet','miktar']),
        ];
    }
}

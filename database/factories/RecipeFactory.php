<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titles = [
            'Yoğurtlu Cacık',
            'Ton Balıklı Sandviç',
            'Patates Salatası',
            'Mevsim Salatası',
            'Omlet',
            'Makarna Salatası',
            'Kremalı Mantar Çorbası',
            'Ton Balıklı Makarna',
            'Sade Omlet',
            'Patates Kızartması',
        ];

        $descriptions = [
            'Salatalık ve yoğurdun harika uyumu!',
            'Lezzetli ton balığı sandviçi.',
            'Serinletici patates salatası.',
            'Taze sebzelerle enfes bir salata.',
            'Lezzetli ve pratik omlet tarifi.',
            'Hafif ve renkli makarna salatası.',
            'Yoğun lezzetli mantar çorbası.',
            'Ton balıklı nefis makarna.',
            'Basit ve lezzetli sade omlet.',
            'Mis gibi kızarmış patatesler.',
        ];

        $ingredients = [
            ['Yoğurt', 'Salatalık', 'Sarımsak', 'Nane', 'Zeytinyağı', 'Tuz'],
            ['Ton Balığı', 'Mayonez', 'Doğranmış Soğan', 'Turşu Dilimleri', 'Ekmek Dilimleri'],
            ['Patates', 'Mayonez', 'Hardal', 'Tuz', 'Karabiber', 'Dereotu'],
            ['Domates', 'Salatalık', 'Biber', 'Soğan', 'Zeytinyağı', 'Limon Suyu', 'Tuz'],
            ['Yumurta', 'Süt', 'Peynir', 'Doğranmış Sebzeler', 'Tuz', 'Karabiber'],
            ['Makarna', 'Haşlanmış Sebzeler', 'Zeytin', 'Turşu', 'Mayonez', 'Tuz', 'Karabiber'],
            ['Mantar', 'Soğan', 'Tereyağı', 'Un', 'Süt', 'Su', 'Tuz', 'Karabiber'],
            ['Makarna', 'Ton Balığı', 'Domates Sosu', 'Rendelenmiş Kaşar Peyniri', 'Tuz', 'Karabiber'],
            ['Yumurta', 'Tuz', 'Karabiber', 'Tereyağı'],
            ['Patates', 'Zeytinyağı', 'Tuz', 'Karabiber'],
        ];

        return [
            'title' => $this->faker->randomElement($titles),
            'description' => $this->faker->randomElement($descriptions),
            'products' => json_encode($this->faker->randomElement($ingredients),true),
        ];
    }
}

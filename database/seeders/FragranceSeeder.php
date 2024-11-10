<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FragranceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fragrances')->insert([
            'name' => 'No. 5',
            'brand' => 'Chanel',
            'scent_type' => 'Floral',
            'description' => 'A bold and fresh scent with notes of bergamot, pepper, and amberwood, perfect for a modern and confident personality.',
            'price' => 89.99,
        ]);

        DB::table('fragrances')->insert([
            'name' => 'Oud Wood',
            'brand' => 'Tom Ford',
            'scent_type' => 'Woody',
            'description' => 'A luxurious blend of oud, sandalwood, and cardamom, creating a warm and mysterious scent for a bold personality.',
            'price' => 220,
        ]);

        DB::table('fragrances')->insert([
            'name' => 'English Pear & Freesia',
            'brand' => 'Jo Malone',
            'scent_type' => 'Fruity',
            'description' => 'A light and refreshing scent with notes of ripe pear and delicate freesia, perfect for a fresh, natural allure.',
            'price' => 220,
        ]);

        DB::table('fragrances')->insert([
            'name' => 'Black Opium',
            'brand' => 'Yves Saint Laurent',
            'scent_type' => 'Oriental',
            'description' => 'A seductive blend of black coffee, vanilla, and white flowers, ideal for those who love bold and captivating fragrances.',
            'price' => 99,
        ]);

        DB::table('fragrances')->insert([
            'name' => 'Santal 33',
            'brand' => 'Le Labo',
            'scent_type' => 'Woody',
            'description' => 'A unique, smoky fragrance with notes of sandalwood, cedar, and cardamom, evoking a sense of warmth and timeless allure. Perfect for those who enjoy an earthy, sensual scent.',
            'price' => 192,
        ]);
    }
}

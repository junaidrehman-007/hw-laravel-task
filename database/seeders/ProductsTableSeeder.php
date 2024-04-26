<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Apple AirPods Pro',
                'price' => 100,
                'description' => 'Apple AirPods Pro feature Active Noise Cancellation for immersive sound, Transparency mode for hearing the world around you, and a customizable fit for all-day comfort.'
            ],
            [
                'name' => 'Samsung Galaxy Watch Active2',
                'price' => 200,
                'description' => 'The Samsung Galaxy Watch Active2 helps you keep up with your fitness goals with its advanced health monitoring features, including ECG and heart rate tracking, along with a sleek design and customizable watch faces.'
            ],
            [
                'name' => 'Apple WH-1000XM4 Wireless',
                'price' => 300,
                'description' => 'Apple WH-1000XM4 headphones deliver industry-leading noise cancellation, exceptional sound quality, and up to 30 hours of battery life. They also feature touch controls and support for virtual assistants.'
            ],
            [
                'name' => 'Instant Pot Duo 7-in-1 Electric Pressure Cooker',
                'price' => 400,
                'description' => 'The Instant Pot Duo is a versatile kitchen appliance that combines seven functions in one, including pressure cooker, slow cooker, rice cooker, steamer, sauté pan, yogurt maker, and warmer, making meal preparation quick and easy.'
            ],
            [
                'name' => 'Fitbit Charge 5 Fitness and Activity Tracker',
                'price' => 200,
                'description' => 'The Fitbit Charge 5 is an advanced fitness and activity tracker that monitors your heart rate, tracks your workouts, provides insights into your sleep patterns, and offers features like built-in GPS and stress management tools.'
            ],
           
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Image;
use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Category::factory()->create([
            'name'=>'Sea',
            'slug' =>'fa-ship'
        ]);

        Category::factory()->create([
            'name'=>'Beach',
            'slug' =>'fa-umbrella-beach'
        ]);

        Category::factory()->create([
            'name'=>'Mountain',
            'slug' =>'fa-mountain'
        ]);





        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

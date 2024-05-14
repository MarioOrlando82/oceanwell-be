<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\ArticleCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'phone_number' => '+621234567890',
            'dob' => '1945-08-17',
            'password' => bcrypt('admin'),
            'is_admin' => 1,
        ]);

        User::create([
            'first_name' => 'user',
            'last_name' => 'user',
            'email' => 'user@user.com',
            'phone_number' => '+620987654321',
            'dob' => '1998-05-21',
            'password' => bcrypt('user'),
        ]);

        foreach (ArticleCategory::$categoryList as $category) {
            ArticleCategory::create([
                'name' => $category,
            ]);
        }

        $this->call([
            DonationSeeder::class,
            VolunteerSeeder::class,
            ArticleSeeder::class,
        ]);
    }
}

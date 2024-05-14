<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donation>
 */
class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => "Paus Terdampar Penuh Sampah",
            'Fundraiser' => "PT OceanHero",
            'Total' => 0,
            'Limit' => 2000000,
            'Image' => 'paus.png',
            'Description' => "Mari bergabung dalam upaya penyelamatan yang
            mendesak untuk para paus yang terdampar di lautan kita,
            terhimpit oleh gelombang limbah plastik dan sampah laut
            yang terus bertambah.
            "
        ];
    }
}

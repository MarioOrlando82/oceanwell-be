<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Volunteer>
 */
class VolunteerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => "Membersihkan Sampah di Pantai
            Kuta",
            'Fundraiser' => "PT BeachClean",
            'Total' => 0,
            'People' => 25,
            'Image' => 'orang.png',
            'Description' => "Kami mengundang Anda untuk bergabung dalam acara
            sukarelawan yang menginspirasi ini. Bersama-sama,
            kita akan melakukan langkah nyata untuk membersihkan
            salah satu pantai terindah di dunia.
            "
        ];
    }
}

<?php

namespace Database\Seeders;
use App\Models\Trainer;
use Illuminate\Database\Seeder;

class TrainerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trainer::create([
            'name' => 'Abdallah Mohsen',
            'spec' => 'web development',
            'img' => '1.png'
        ]);

        Trainer::create([
            'name' => 'Mohamed Mohsen',
            'spec' => 'web development',
            'img' => '2.png'
        ]);

        Trainer::create([
            'name' => 'Omar Mohsen',
            'spec' => 'dentist',
            'img' => '3.png'
        ]);

        Trainer::create([
            'name' => 'zenab Mohsen',
            'spec' => 'doctor',
            'img' => '4.png'
        ]);

        Trainer::create([
            'name' => 'magdy ibrahim',
            'spec' => 'englich techer',
            'img' => '5.png'
        ]);
    }
}

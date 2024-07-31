<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologiesData = [
            [
                "name" => "HTML",
                "color" => "#E34F26"
            ],
            [
                "name" => "CSS",
                "color" => "#1572B6"
            ],
            [
                "name" => "JavaScript",
                "color" => "#F7DF1E"
            ],
            [
                "name" => "Vue.js",
                "color" => "#4FC08D"
            ],
            [
                "name" => "PHP",
                "color" => "#777BB4"
            ],
            [
                "name" => "Laravel",
                "color" => "#FF2D20"
            ]
        ];

        foreach ($technologiesData as $technologyData) {
            Technology::create($technologyData);
        }
    }
}

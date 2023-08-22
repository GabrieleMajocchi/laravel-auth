<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Faker\Generator as Faker;

class ProjectsSeeder extends Seeder
{
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) {
            $newProject = new Project();
            $newProject->title = $faker->sentence(2);
            $newProject->description = $faker->paragraph(5);
            $newProject->lang = $faker->randomElement(['PHP', 'JavaScript', 'Vue', 'Laravel']);
            $newProject->link = $faker->url();
            $newProject->date = $faker->dateTimeBetween('2023-03-01', 'now');
            $newProject->save();
        }
    }
}

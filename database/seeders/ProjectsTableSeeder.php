<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $types = Type::all();
        $projects = Project::all();

        for ($i = 0; $i < 50; $i++) {
            $project = Project::create([
                'name' => 'Progetto fichissimo ' . $faker->numberBetween(4, 99),
                'description' => $faker->realText(400),
                'cover_img' => $projects->random()->cover_img,
                'github_link' => 'https://github.com/gab-che/' . $faker->word(),
                'type_id' => $types->random()->id,
            ]);
        }
    }
}

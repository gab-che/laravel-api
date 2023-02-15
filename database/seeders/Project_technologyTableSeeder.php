<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Project_technologyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = Technology::all();
        $projects = Project::all();
        $total_tech = Technology::all()->count();

        foreach ($projects as $project) {
            $rand = rand(1, $total_tech);
            $assoc = [];
            for ($i = 0; $i < $rand; $i++) {
                $new_tech = $technologies->random()->id;
                if (!in_array($new_tech, $assoc)) {
                    array_push($assoc, $new_tech);
                }
            }
            $project->technologies()->attach($assoc);
            $assoc = [];
        }
    }
}

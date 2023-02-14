<?php

namespace Database\Seeders;

use App\Http\Controllers\Admin\ProjectController;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = ['html', 'css', 'sass', 'javascript', 'vuejs', 'php', 'laravel', 'mysql'];
        // $project = app(ProjectController::class);
        // $project->detachTechnologies();

        Technology::truncate();
        foreach ($technologies as $tech) {
            Technology::create([
                'name' => $tech,
                'description' => 'Descrizione super utile e lunga di ' . $tech,
            ]);
        }
    }
}

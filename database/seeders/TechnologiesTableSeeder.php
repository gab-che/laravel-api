<?php

namespace Database\Seeders;

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
        foreach ($technologies as $tech) {
            $new_tech = new Technology();
            $new_tech->name = $tech;
            $new_tech->save();
        }
    }
}

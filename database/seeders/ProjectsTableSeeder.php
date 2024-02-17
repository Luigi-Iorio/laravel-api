<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = config('projects_db');

        DB::statement('SET FOREIGN_KEY_CHECKS=0'); // disabilita chiavi esterne
        DB::table('projects')->truncate(); // elimina i dati nella tabella projects
        DB::table('project_technology')->truncate(); // elimina le associazioni
        DB::statement('SET FOREIGN_KEY_CHECKS=1'); // riabilita chiavi esterne

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->title = $project['title'];
            $newProject->slug = Str::of($newProject->title)->slug('-');
            $newProject->stack = $project['stack'];
            $newProject->description = $project['description'];
            $newProject->type_id = $project['type_id'];
            $newProject->save();
        }
    }
}

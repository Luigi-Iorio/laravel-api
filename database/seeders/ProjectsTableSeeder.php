<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Spotify Clone',
                'slug' => '',
                'stack' => 'html - css',
                'description' => 'L\'obiettivo principale di questo progetto era creare una web app con un layout responsivo che assicurasse che il contenuto della pagina rimanesse all\'interno della viewport.',
            ],
            [
                'title' => 'Discord Clone',
                'slug' => '',
                'stack' => 'html - css',
                'description' => 'L\'obiettivo principale di questo progetto è riprodurre un layout basato su uno screenshot fornito, cercando di essere il più fedeli possibile al design originale.',
            ],
            [
                'title' => 'Whatsapp Clone',
                'slug' => '',
                'stack' => 'html - css - js',
                'description' => 'L\'obiettivo era quello di replicare Whatsapp-Web',
            ]
        ];

        foreach ($projects as $project) {
            $newProject = new Project();
            $newProject->title = $project['title'];
            $newProject->slug = Str::of($newProject->title)->slug('-');
            $newProject->stack = $project['stack'];
            $newProject->description = $project['description'];
            $newProject->save();
        }
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        if (request()->key) {
            $projects = Project::where('title', 'LIKE', '%' . request()->key . '%')->paginate(2); // tutti i progetti con il titolo ricercato
        } else {
            $projects = Project::with('type', 'technologies')->paginate(2); // tutti i progetti con relazioni type e technologies
        }

        return response()->json([
            'status' => true,
            'results' => $projects
        ]);
    }

    public function show(string $slug)
    {
        $project = Project::where('slug', $slug)->with('type', 'technologies')->first();

        return response()->json([
            'status' => true,
            'results' => $project
        ]);
    }
}

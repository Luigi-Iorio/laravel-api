<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $newProject = new Project();
        if (isset($data['img_project'])) {
            $newProject->img_project = Storage::put('uploads', $data['img_project']);
        }
        $newProject->title = $data['title'];
        $newProject->slug = Str::of($newProject->title)->slug('-');
        $newProject->stack = $data['stack'];
        $newProject->description = $data['description'];
        $newProject->type_id = $data['type_id'];

        $newProject->save();

        if (isset($data['technologies'])) {
            $newProject->technologies()->sync($data['technologies']);
        }

        return redirect()->route('admin.projects.index')->with('message', 'Il nuovo progetto è stato inserito correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->slug = Str::of($data['title'])->slug('-');

        if ($request->hasFile('img_project')) { // se è presente un'immagine 
            if ($project->img_project) {
                Storage::delete($project->img_project); // elimina immagine
            }

            $project->img_project = Storage::put('uploads', $data['img_project']); //salva la nuova immagine
        }

        $project->update($data);

        if (isset($data['technologies'])) {
            $project->technologies()->sync($data['technologies']);
        } else {
            $project->technologies()->sync([]);
        }

        return redirect()->route('admin.projects.index')->with('message', 'Il progetto è stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if ($project->img_project) {
            Storage::delete($project->img_project);
        }

        $project->technologies()->sync([]);

        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', 'Il progetto è stato eliminato correttamente');
    }
}

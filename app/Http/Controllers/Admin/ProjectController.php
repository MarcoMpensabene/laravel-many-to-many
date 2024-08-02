<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        // $projects = Project::where("user_id", Auth::id())->get(); // ! Mostra solo i post collegati all'account (grazie allo user_id )
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = new Project();
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('project', 'types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        $data = $request->validated();

        $img_path = Storage::put('uploads/projects', $data['image_url']);

        $data['user_id'] = Auth::user()->id;
        $data['image_url'] = $img_path;
        $newProject = Project::create($data);
        $newProject->technologies()->sync($data["technologies"]);
        return redirect()->route('admin.projects.show', $newProject);
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
        // dd($request->all());
        $data = $request->validated(); //richiedo tutti i dati
        $project->update($data); // modifico i dati del singolo Projecte attraverso il mio form con i value già presenti
        $project->technologies()->sync($data["technologies"]);
        return redirect()->route('admin.projects.show', $project)->with('message', $project->title . " Has Been Edited");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {

        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', "N:" . $project->id . " " . $project->title . " Has Been Deleted");
    }

    public function deletedIndex()
    {
        $projects = Project::onlyTrashed()->get();
        return view('admin.projects.deleted-index', compact('projects'));
    }

    public function restore(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->restore();
        return redirect()->route('admin.projects.deleted-index')->with('message', $project->title . " Has Been Restored");
    }

    public function permanentDelete(string $id)
    {
        $project = Project::onlyTrashed()->findOrFail($id);
        $project->technologies()->detach();
        $project->forceDelete();
        return redirect()->route('admin.projects.deleted-index')->with('message', $project->title . " Has Been Permanently Removed");
    }
}

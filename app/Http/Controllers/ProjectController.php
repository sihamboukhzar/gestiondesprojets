<?php
 namespace App\Http\Controllers;
use App\Http\Requests\StoreProjectRequest;
use App\Models\equipe;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProjectRequest;
 use App\Models\Project;
 use App\Models\material;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    
    function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    { 
        $projects = Project::with(['materials', 'chef_dequipe'])->get();

        return view('dashboard.projects.index', compact('projects'));
       
        
    }
   
    
    public function create()
    {
        $materials = Material::pluck('nom_material', 'id');
        $chefequipe = User::pluck('email', 'id')->prepend('pleaseSelect');
     
        return view('dashboard.projects.create', compact('materials','chefequipe'));
    }
 
   
    public function store(StoreProjectRequest $request)
    {
        $this->validate($request, [
            'nom_projet' => 'required|unique:projects,nom_projet',
            
        ]);
        $project = Project::create($request->all());
        $project->materials()->sync($request->input('materials', []));
        return redirect('Project')->with('flash_message', 'Student Addedd!');  
    }
 
  
    
    public function show($id)
    {   $material = material::all();
        $student = Project::find($id);
        return view('dashboard.projects.show')->with('Projects', $student)
                           ->with('material', $material);

    }
 
    
    public function edit(Project $project,$id)
    {    
        $project = Project::find($id);
        $materials = Material::pluck('nom_material', 'id');
        $chef_dequipes = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');
        $project->load('materials', 'chef_dequipe');
        
        return view('dashboard.projects.edit', compact('chef_dequipes','materials', 'project'));
    }
 
  
    public function update(UpdateProjectRequest $request, Project $project,$id)
    {
        $project = Project::find($id);
        $project->update($request->all());
        $project->materials()->sync($request->input('materials', []));
      

        return redirect('Project')->with('flash_message', 'Project Updated!');  
    }
 
   
    public function destroy($id)
    {
        Project::destroy($id);
        return redirect('Project')->with('flash_message', 'Project deleted!');  
    }
}
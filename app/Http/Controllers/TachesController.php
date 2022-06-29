<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTacheRequest;
use App\Http\Requests\UpdateTacheRequest;

use App\Models\Tache;
use App\Models\Project;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;


class TachesController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:tache-list|project-create|tache-edit|tache-delete', ['only' => ['index','show']]);
         $this->middleware('permission:tache-create', ['only' => ['create','store']]);
         $this->middleware('permission:tache-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:tache-delete', ['only' => ['destroy']]);
    }

    public function index()
    {     
         $taches = Tache::with(['participants', 'nom_projet'])->get();

        return view('dashboard.Taches.index', compact('taches'));
        
    }
  
    
    public function create()
    {     
           $participants = User::pluck('email', 'id');
           $nom_projets = Project::pluck('nom_projet', 'id')->prepend(trans('global.pleaseSelect'), '');
        return view('dashboard.Taches.create', compact('participants','nom_projets'));
    }
 
    public function store(StoreTacheRequest $request)
    {
        $tach = Tache::create($request->all());
        $tach->participants()->sync($request->input('participants', []));

        return redirect('Tache')->with('flash_message', 'material Addedd!'); 
    }

  
    
    public function show(Tache $tache,$id)
    {
        
        $tache->load('participants','nom_projet');
        $tache = Tache::find($id);
        return view('dashboard.taches.show', compact('tache'));
    }
    public function edit(Tache $tache,$id)
    {
        
        $participants = User::pluck('email', 'id');

        $nom_projet = Project::pluck('nom_projet', 'id')->prepend(trans('global.pleaseSelect'), '');
        $tache->load('participants','nom_projet');
        $tache = Tache::find($id);
        return view('dashboard.taches.edit', compact('participants', 'tache','nom_projet'));
    }
 
  
    public function update(UpdateTacheRequest $request, Tache $tache,$id)
    {
        $tache = Tache::find($id);
        $tache->update($request->all());
        $tache->participants()->sync($request->input('participants', []));

        return redirect('Tache')->with('flash_message', 'material Addedd!'); 
    }
   
    public function destroy($id)
    {
        Tache::destroy($id);
        return redirect('Tache')->with('flash_message', 'Project deleted!');  
    }
    public function downloadPDF() {
        // retreive all records from db
        $taches = Tache::all();
        $pdf = PDF::loadView('dashboard.taches', $taches);
        // download PDF file with download method
        return $pdf->download('show.pdf');
      }
}


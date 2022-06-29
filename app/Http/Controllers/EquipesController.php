<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreEquipeRequest;
use App\Http\Requests\UpdateEquipeRequest;
use App\Models\equipe;
use App\Models\Project;
use App\Models\User;
class EquipesController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:equipe-list|equipe-create|equipe-edit|equipe-delete', ['only' => ['index','show']]);
         $this->middleware('permission:equipe-create', ['only' => ['create','store']]);
         $this->middleware('permission:equipe-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:equipe-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        
        $equipes = Equipe::with(['chefequipe', 'membres', 'nom_projets'])->get();
        return view ('dashboard.equipe.index', compact('equipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $chefequipes = User::pluck('email', 'id')->prepend(trans('global.pleaseSelect'), '');

        $membres = User::pluck('email', 'id');

        $nom_projets = Project::pluck('nom_projet', 'id');
        
        return view('dashboard.equipe.create', compact('chefequipes', 'membres', 'nom_projets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipeRequest $request)
    {
       
        $equipe = Equipe::create($request->all());
        $equipe->membres()->sync($request->input('membres', []));
        $equipe->nom_projets()->sync($request->input('nom_projets', []));
        return redirect('Equipe')->with('flash_message', 'equipes Addedd!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $equipe = Equipe::find($id);
        return view('dashboard.equipe.show')->with('equipe', $equipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe,$id)
    {
        
        $equipe = Equipe::find($id);  
        $chefequipes = User::pluck('email', 'id')->prepend(trans('pleaseSelect'), '');

        $membres = User::pluck('email', 'id');

        $nom_projets = Project::pluck('nom_projet', 'id');
$i="";
        $equipe->load('chefequipe', 'membres', 'nom_projets');     
        return view('dashboard.equipe.edit', compact('i','chefequipes', 'equipe', 'membres', 'nom_projets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipeRequest $request, Equipe $equipe, $id)
    {
        $equipe = Equipe::find($id);
        $equipe->update($request->all());
        $equipe->membres()->sync($request->input('membres', []));
        $equipe->nom_projets()->sync($request->input('nom_projets', []));
        return redirect('Equipe')->with('flash_message', 'material Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Equipe::destroy($id);
        return redirect('Equipe')->with('flash_message', 'material deleted!');  
    }
}

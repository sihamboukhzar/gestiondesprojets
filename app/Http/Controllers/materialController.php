<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreMaterialRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Material;
use App\Models\Project;
class materialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:material-list|material-create|material-edit|material-delete', ['only' => ['index','show']]);
         $this->middleware('permission:material-create', ['only' => ['create','store']]);
         $this->middleware('permission:material-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:material-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $materials = Material::with(['nom_projets'])->get();

        return view ('dashboard.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nom_projets = Project::pluck('nom_projet', 'id');
        
        return view('dashboard.materials.create', compact('nom_projets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMaterialRequest $request)
    {
        //
        
        $material = Material::create($request->all());
        $material->nom_projets()->sync($request->input('nom_projets', []));
        return redirect('material')->with('flash_message', 'material Addedd!');  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
        $student = material::find($id);
        return view('dashboard.materials.show')->with('material', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $material = material::find($id);
        return view('dashboard.materials.edit')->with('material', $material);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $material = material::find($id);
        $input = $request->all();
        $material->update($input);
        return redirect('material')->with('flash_message', 'material Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        material::destroy($id);
        return redirect('material')->with('flash_message', 'material deleted!');  
    }
    public function downloadPDF($id) {
        $material = material::find($id);
        $pdf = PDF::loadView('materials.index', compact('material'));
        
        return $pdf->download('material.pdf');
}
}

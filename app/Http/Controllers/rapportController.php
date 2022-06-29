<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\material;
use App\Models\User;
class rapportController extends Controller
{
    
   
    public function index()
    { 
        $projectencours = Project::with(['materials', 'chef_dequipe'])->where('etatprojet','en cours')->get();
        $projectenpause = Project::with(['materials', 'chef_dequipe'])->where('etatprojet','en pause')->get();
        $projectdone = Project::with(['materials', 'chef_dequipe'])->where('etatprojet','fait')->get();
       
        return view('dashboard.main', compact('projectencours','projectenpause','projectdone'));
       
        
    }
  
    
  
   
   
    

  
 
}

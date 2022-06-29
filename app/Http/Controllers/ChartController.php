<?php

namespace App\Http\Controllers;
use App\Models\Tache;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Project;
class ChartController extends Controller
{
    public function index()
    {     
         $Tacheenpause = Tache::with(['participants', 'nom_projet'])->where('etat','enpause')->count();
         $Tacheencours = Tache::with(['participants', 'nom_projet'])->where('etat','encours')->count();
         $Tacheenfait = Tache::with(['participants', 'nom_projet'])->where('etat','fait')->count();
         $projectencours = Project::with(['materials', 'chef_dequipe'])->where('etatprojet','en cours')->count();
         $projectenpause = Project::with(['materials', 'chef_dequipe'])->where('etatprojet','en pause')->count();
         $projectdone = Project::with(['materials', 'chef_dequipe'])->where('etatprojet','fait')->count();
         $projects = Project::with(['materials', 'chef_dequipe'])->select("SELECT * FROM `projects` ,`taches` WHERE projects.id=taches.id");
         $resultat = DB::select(DB::raw("SELECT projects.nom_projet as nom_projet , COALESCE(projects.nbrenpause, 0) as nbrenpause ,COALESCE( taches.nbrfait, 0)as nbrfait,COALESCE(tache.nbrencours, 0) as nbrencours 
         FROM 
         (SELECT nom_projet  ,COUNT(nom_tache) AS nbrenpause FROM taches,projects WHERE taches.nom_projet_id =projects.id AND taches.etat='enpause' GROUP BY nom_projet) projects 
         LEFT JOIN 
         (SELECT nom_projet as nom_projet, COUNT(nom_tache) as nbrfait FROM taches,projects WHERE taches.nom_projet_id =projects.id AND taches.etat='fait' GROUP BY nom_projet) taches ON (taches.nom_projet =projects.nom_projet ) 
         LEFT JOIN 
         (SELECT nom_projet as nom_projet, COUNT(nom_tache) as nbrencours FROM taches,projects WHERE taches.nom_projet_id =projects.id AND taches.etat='encours' GROUP BY nom_projet) tache ON (tache.nom_projet =projects.nom_projet )"));
        
        $taches = Tache::with(['participants', 'nom_projet'])->get();
     
         
         
        return view('dashboard.charts', compact('Tacheenpause','Tacheenpause','Tacheenpause','projectencours','projectenpause','projectdone','projects','taches','resultat'));
        
    }
}

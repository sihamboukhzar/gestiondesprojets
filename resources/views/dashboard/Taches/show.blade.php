@extends('layouts.layout')
@section('content')
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
 
<div class="card">
  <div class="card-header"> taches</div>
  <div class="card-body">
  <div class="d-flex justify-content-end mb-4">
            <a class="btn btn-primary" href="{{ URL::to('/Tache/createPDF') }}">Export to PDF</a>
          </div>
 
        <div class="card-body">
        <h5 class="card-title">nom tache : {{ $tache->nom_tache }}</h5>
        <p class="card-text">participants  :   @foreach($tache->participants as $key => $participant)
                                <span class="label label-info">{{ $participant->email }}</span>
                            @endforeach
        </p>
        <p class="card-text">l'etat : {{ App\Models\Tache::ETAT_SELECT[$tache->etat] ?? '' }}</p>
        <p class="card-text">degree de priorite  : 
                            <input type="checkbox" disabled="disabled" {{ $tache->dgree_priorite ? 'checked' : '' }}>
                            <label for="dgree_priorite">important</label>
                          </p>
 
        <p class="card-text">l'etat : {{ $tache->date_debut }}</p>
        <p class="card-text">participants  : {{ $tache->date_fin }}</p>
        <p class="card-text">nom projet  :  {{ $tache->nom_projet->nom_projet ?? '' }}</p>
        
       
        
  </div>
       
    </hr>
  
  </div>
</div>
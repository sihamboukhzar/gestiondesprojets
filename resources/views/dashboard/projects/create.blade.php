@extends('layouts.layout')
@section('content')
<div class="card">
  <div class="card-header"style="font-family: fantasy;font-size: large; background-color:#88cfa0;color:#fff">Créer votre projet </div>
  <div class="card-body"style="border-style:solid;border-color: #0b1f3b;">
      
      <form action="{{ url('Project') }}" method="post" >
        {!! csrf_field() !!}
        <label >nom projet</label></br>
        <input type="text" name="nom_projet" id="nom_projet" class="form-control btn-lg" required></br>
        @error('nom_projet')
    <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        <label>budget</label></br>
        <input type="text" name="budget" id="budget" class="form-control btn-lg"></br>
        <label>date debut </label></br>
        <input type="date" name="datedebut" id="datedebut" class="form-control btn-lg" required></br>
        <label>date fin </label></br>
        <input type="date" name="datefin" id="datefin" class="form-control btn-lg" required></br>
        <div class="form-group" >
          
                <label for="nom_user_id" >nom chef d'equipe</label>
               
                <select class="form-control js-example-basic-multiple {{ $errors->has('email') ? 'is-invalid' : '' }}" name="chef_dequipe_id" id="chef_dequipe_id" required>
                    @foreach($chefequipe as $id => $entry)
                   
                        <option value="{{ $id }}" {{ old('chef_dequipe_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        
                        @endforeach
                </select>
               
                @if($errors->has('nom_projet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_projet') }}
                    </div>
                @endif
            </div><label>l'etat de projet </label></br>
         <select class="form-control {{ $errors->has('etatprojet') ? 'is-invalid' : '' }}" name="etatprojet" id="etatprojet" >
                    <option value disabled {{ old('etatprojet', null) === null ? 'selected' : '' }}>pleaseSelect</option>
                    @foreach(App\Models\Project::ETAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('etatprojet', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                </br>
        
        <label> commantaire </label></br>
        <input type="text" name="commantaire" id="commantaire" class="form-control"></br>
      
        <input type="submit" value="Save" class="btn btn-success btn-lg  btn-rounded"style="background-color:#88cfa0;"></br>
    </form>
   
  </div>
</div>
 
@stop
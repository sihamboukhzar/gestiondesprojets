@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header"style="font-family: Helvetica;font-size: large; background-color: #4197d9;color:#fff">edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('Project/' .$project->id) }}" method="post">
         @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nom_projet">nom projet</label>
                <input class="form-control {{ $errors->has('nom_projet') ? 'is-invalid' : '' }}" type="text" name="nom_projet" id="nom_projet" value="{{ old('nom_projet', $project->nom_projet) }}"required>
                @if($errors->has('nom_projet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_projet') }}
                    </div>
                @endif
              </div><div class="form-group">
                <label for="budget">budget </label>
                <input class="form-control {{ $errors->has('budget') ? 'is-invalid' : '' }}" type="number" name="budget" id="budget" value="{{ old('budget', $project->budget) }}" step="0.01"required>
                @if($errors->has('budget'))
                    <div class="invalid-feedback">
                        {{ $errors->first('budget') }}
                    </div>
                @endif
              </div><label>date debut </label></br>
        <input type="date" name="datedebut" id="datedebut" value="{{$project->datedebut}}" class="form-control"required></br>
        <label>date fin</label></br>
        <input type="date" name="datefin" id="datefin" value="{{$project->datefin}}" class="form-control"required></br>
        <div class="form-group">
                <label for="chef_dequipe_id">chef_dequipe</label>
                <select class="form-control select2 {{ $errors->has('chef_dequipe') ? 'is-invalid' : '' }}" name="chef_dequipe_id" id="chef_dequipe_id"required>
                    @foreach($chef_dequipes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('chef_dequipe_id') ? old('chef_dequipe_id') : $project->chef_dequipe->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('chef_dequipe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chef_dequipe') }}
                    </div>
                @endif</div>
                <div class="form-group">
                <label>l'etat</label>
                <select class="form-control {{ $errors->has('etatprojet') ? 'is-invalid' : '' }}" name="etatprojet" id="etatprojet"required>
                    <option value disabled {{ old('etat', null) === null ? 'selected' : '' }}>pleaseSelect</option>
                    @foreach(App\Models\Project::ETAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('etat', $project->etatprojet) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('etat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('etat') }}
                    </div>
                @endif
               </div><div class="form-group">
                <label for="materials">material</label>
                
                <select class="form-control js-example-basic-multiple {{ $errors->has('materials') ? 'is-invalid' : '' }}" name="materials[]" id="materials" multiple required>
                    @foreach($materials as $id => $material)
                        <option value="{{ $id }}" {{ (in_array($id, old('materials', [])) || $project->materials->contains($id)) ? 'selected' : '' }}>{{ $material }}</option>
                    @endforeach
                </select>
                @if($errors->has('materials'))
                    <div class="invalid-feedback">
                        {{ $errors->first('materials') }}
                    </div>
                @endif
            </div>
            <label>commantaire</label></br>
        <input type="text" name="commantaire" id="commantaire" value="{{$project->commantaire}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
 
           </form>
   
  </div>
</div>
 
@stop
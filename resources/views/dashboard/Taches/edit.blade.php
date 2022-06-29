@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header"style="font-family: Helvetica;font-size: large; background-color:#4197d9;color:#fff">Modifier une tache</div>
  <div class="card-body">
      
      <form action="{{ url('Tache/' .$tache->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$tache->id}}" id="id" />
        
        <label>nom tache</label></br>
        <input type="text" name="nom_tache" id="nom_tache"value="{{$tache->nom_tache}}" class="form-control"required></br>
        <div class="form-group">
                <label for="participants">participant</label>
                <select class="form-control js-example-basic-multiple {{ $errors->has('participants') ? 'is-invalid' : '' }}" name="participants[]" id="participants" multiple="multiple" required>
                    @foreach($participants as $id => $participant)
                        <option value="{{ $id }}" {{ (in_array($id, old('participants', [])) || $tache->participants->contains($id)) ? 'selected' : '' }}>{{ $participant }}</option>
                    @endforeach
                </select>
                @if($errors->has('participants'))
                    <div class="invalid-feedback">
                        {{ $errors->first('participants') }}
                    </div>
                @endif
               </div>
               <div class="form-group">
                <label>l'etat</label>
                <select class="form-control {{ $errors->has('etat') ? 'is-invalid' : '' }}" name="etat" id="etat" required>
                    <option value disabled {{ old('etat', null) === null ? 'selected' : '' }}>please Select</option>
                    @foreach(App\Models\Tache::ETAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('etat', $tache->etat) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('etat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('etat') }}
                    </div>
                @endif
               </div>
               <div class="form-group">
               <label class="form-check-label" for="dgree_priorite">dgree drpriorite</label>
               
                <div class="form-check {{ $errors->has('dgree_priorite') ? 'is-invalid' : '' }}">
               
                    <input type="hidden" name="dgree_priorite" value="0"><label for="dgree_priorite">important</label>
                    <input class="form-check-input" type="checkbox" name="dgree_priorite" id="dgree_priorite" value="1" {{ $tache->dgree_priorite || old('dgree_priorite', 0) === 1 ? 'checked' : '' }}>
                    </div>
                @if($errors->has('dgree_priorite'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dgree_priorite') }}
                    </div>
                @endif
               </div>
        <label>date_debut</label></br>
        <input type="date" name="date_debut" id="date_debut"value="{{$tache->date_debut}}" class="form-control"required></br>
        <label>date fin </label></br>
        <input type="date" name="date_fin" id="date_fin" value="{{$tache->date_fin}}"class="form-control"required></br>
        <div class="form-group">
                <label for="nom_projet_id">nom_projet</label>
                <select class="form-control select2 {{ $errors->has('nom_projet') ? 'is-invalid' : '' }}" name="nom_projet_id" id="nom_projet_id"required>
                    @foreach($nom_projet as $id => $entry)
                        <option value="{{ $id }}" {{ (old('nom_projet_id') ? old('nom_projet_id') : $tache->nom_projet->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('nom_projet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_projet') }}
                    </div>
                @endif
              </div>
              
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
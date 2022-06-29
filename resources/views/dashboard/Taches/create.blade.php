@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header"style="font-family: fantasy;font-size: large; background-color: #88cfa0;color:#fff">les Taches</div>
  <div class="card-body">
      <form action="{{ url('Tache') }}" method="post" >
      @csrf
            <div class="form-group" >
                <label for="nom_tache">nom de la tache <span class="text-danger">*</span></label>
                <input class="form-control {{ $errors->has('nom_tache') ? 'is-invalid' : '' }}" type="text" name="nom_tache" id="nom_tache" value="{{ old('nom_tache', '') }}"required>
               <span class="text-danger"></span>
                @if($errors->has('nom_tache'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_tache') }}
                    </div>
                @endif </div>
            <div class="form-group">
                <label for="participants">les participants<span class="text-danger">*</span></label>
                
                <select class="form-control js-example-basic-multiple {{ $errors->has('participants') ? 'is-invalid' : '' }}" name="participants[]" id="participants" multiple="multiple"required>
                    @foreach($participants as $id => $participant)
                        <option value="{{ $id }}" {{ in_array($id, old('participants', [])) ? 'selected' : '' }}>{{ $participant }}</option>
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
                <select class="form-control {{ $errors->has('etat') ? 'is-invalid' : '' }}" name="etat" id="etat" >
                    <option value disabled {{ old('etat', null) === null ? 'selected' : '' }}>pleaseSelect</option>
                    @foreach(App\Models\Tache::ETAT_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('etat', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('etat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('etat') }}
                    </div>
                @endif
               </div>
            <div class="form-group">
            <label class="form-check-label" for="dgree_priorite">dgree_priorite</label>
               
                <div class="form-check {{ $errors->has('dgree_priorite') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="dgree_priorite" value="0"> <label for="dgree_priorite">important</label>
                    <input class="form-check-input" type="checkbox" name="dgree_priorite" id="dgree_priorite" value="1" {{ old('dgree_priorite', 0) == 1 ? 'checked' : '' }}>
                     </div>
                @if($errors->has('dgree_priorite'))
                    <div class="invalid-feedback">
                        {{ $errors->first('dgree_priorite') }}
                    </div>
                @endif

              </div>
            <div class="form-group">
                <label for="date_debut">date_debut<span class="text-danger">*</span></label>
                <input class="form-control date {{ $errors->has('date_debut') ? 'is-invalid' : '' }}" type="date" name="date_debut" id="date_debut" value="{{ old('date_debut') }}"required>
                @if($errors->has('date_debut'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_debut') }}
                    </div>
                @endif
                </div>
            <div class="form-group">
                <label for="date_fin">date_fin<span class="text-danger">*</span></label>
                <input class="form-control date {{ $errors->has('date_fin') ? 'is-invalid' : '' }}" type="date" name="date_fin" id="date_fin" value="{{ old('date_fin') }}"required>
                @if($errors->has('date_fin'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_fin') }}
                    </div>
                @endif
                 </div>
                 <div class="form-group" >
                <label for="nom_projet_id" >nom_projet<span class="text-danger">*</span></label>
                <select class="form-control js-example-basic-multiple {{ $errors->has('nom_projet') ? 'is-invalid' : '' }}" name="nom_projet_id" id="nom_projet_id" required>
                    @foreach($nom_projets as $id => $entry)
                        <option value="{{ $id }}" {{ old('nom_projet_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('nom_projet'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_projet') }}
                    </div>
                @endif
            </div>
            
                 
        <input type="submit" value="Save" class="btn btn-success btn-lg  btn-rounded"style="background-color: #88cfa0;"></br>
  
        </form>
    </div>
</div>
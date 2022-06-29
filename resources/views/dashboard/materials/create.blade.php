@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header"style="font-family: fantasy;font-size: large; background-color:#88cfa0;color:#fff">Material Page</div>
  <div class="card-body">
      <form action="{{ url('material') }}" method="post">
      @csrf
            <div class="form-group">
                <label for="nom_material">nom de material</label>
                <input class="form-control {{ $errors->has('nom_material') ? 'is-invalid' : '' }}" type="text" name="nom_material" id="nom_material" value="{{ old('nom_material', '') }}">
                @if($errors->has('nom_material'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_material') }}
                    </div>
                @endif
               </div>
            <div class="form-group">
                <label for="type_marterial">type de marterial</label>
                <input class="form-control {{ $errors->has('type_marterial') ? 'is-invalid' : '' }}" type="text" name="type_marterial" id="type_marterial" value="{{ old('type_marterial', '') }}">
                @if($errors->has('type_marterial'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type_marterial') }}
                    </div>
                @endif </div>
            <div class="form-group">
                <label for="cout">cout</label>
                <input class="form-control {{ $errors->has('cout') ? 'is-invalid' : '' }}" type="number" name="cout" id="cout" value="{{ old('cout', '') }}" step="0.01">
                @if($errors->has('cout'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cout') }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="date_achat">date d'achat</label>
                <input class="form-control date {{ $errors->has('date_achat') ? 'is-invalid' : '' }}" type="date" name="date_achat" id="date_achat" value="{{ old('date_achat') }}">
                @if($errors->has('date_achat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_achat') }}
                    </div>
                @endif
             </div>
            <div class="form-group">
                <label for="etat">l'etat</label>
                <input  class="form-control {{ $errors->has('etat') ? 'is-invalid' : '' }}" type="text" name="etat" id="etat" value="{{ old('etat', '') }}">
                @if($errors->has('etat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('etat') }}
                    </div>
                @endif </div>
            <div class="form-group">
                <label for="nom_projets">nom_projet</label>
               
                <select class="form-control js-example-basic-multiple {{ $errors->has('nom_projets') ? 'is-invalid' : '' }}" name="nom_projets[]" id="nom_projets" multiple="multiple">
                    @foreach($nom_projets as $id => $nom_projet)
                        <option value="{{ $id }}" {{ in_array($id, old('nom_projets', [])) ? 'selected' : '' }}>{{ $nom_projet }}</option>
                    @endforeach
                </select>
                 </br>
        
                @if($errors->has('nom_projets'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_projets') }}
                    </div>
                @endif
           </div>
        <input type="submit" value="Save" class="btn btn-success btn-lg  btn-rounded"style="background-color: #88cfa0;"></br>
  
         </form>
  </div>
</div>
 
@stop
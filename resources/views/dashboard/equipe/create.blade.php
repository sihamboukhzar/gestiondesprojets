@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header"style="font-family: fantasy;font-size: large; background-color: #88cfa0;color:#fff">ajoter l'equipe</div>
  <div class="card-body">
 

      <form action="{{ url('Equipe') }}" method="post">
        {!! csrf_field() !!}
            <div class="form-group">
                <label for="nomequipe">nom_equipe</label>
                <input class="form-control {{ $errors->has('nomequipe') ? 'is-invalid' : '' }}" type="text" name="nomequipe" id="nomequipe" value="{{ old('nomequipe', '') }}">
                @if($errors->has('nomequipe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomequipe') }}
                    </div>
                @endif
               </div>
            <div class="form-group">
                <label for="nombrequipe">nombre equipe</label>
                <input class="form-control {{ $errors->has('nombrequipe') ? 'is-invalid' : '' }}" type="number" name="nombrequipe" id="nombrequipe" value="{{ old('nombrequipe', '') }}" step="1">
                @if($errors->has('nombrequipe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nombrequipe') }}
                    </div>
                @endif
              </div>
            <div class="form-group">
                <label for="chefequipe_id">chef d'equipe</label>
                <select class="form-control js-example-basic-multiple {{ $errors->has('chefequipe') ? 'is-invalid' : '' }}" name="chefequipe_id" id="chefequipe_id">
                    @foreach($chefequipes as $id => $entry)
                        <option value="{{ $id }}" {{ old('chefequipe_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('chefequipe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chefequipe') }}
                    </div>
                @endif
              </div>
            <div class="form-group">
                <label for="membres">les membres</label>
                
                <select class="form-control js-example-basic-multiple {{ $errors->has('membres') ? 'is-invalid' : '' }}" name="membres[]" id="membres" multiple="multiple">
                    @foreach($membres as $id => $membre)
                        <option value="{{ $id }}" {{ in_array($id, old('membres', [])) ? 'selected' : '' }}>{{ $membre }}</option>
                    @endforeach
                </select>
                @if($errors->has('membres'))
                    <div class="invalid-feedback">
                        {{ $errors->first('membres') }}
                    </div>
                @endif
              </div>
            <div class="form-group">
                <label for="nom_projets">nom de projet</label>
               
                <select class="form-control js-example-basic-multiple {{ $errors->has('nom_projets') ? 'is-invalid' : '' }}" name="nom_projets[]" id="nom_projets" multiple="multiple">
                    @foreach($nom_projets as $id => $nom_projet)
                        <option value="{{ $id }}" {{ in_array($id, old('nom_projets', [])) ? 'selected' : '' }}>{{ $nom_projet }}</option>
                    @endforeach
                </select>
                @if($errors->has('nom_projets'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_projets') }}
                    </div>
                @endif
              </div> 
           
        <input type="submit" value="Save" class="btn btn-success btn-lg  btn-rounded"style="background-color:#88cfa0;"></br>
  
            </form>
   
  </div>
</div>
 
@stop
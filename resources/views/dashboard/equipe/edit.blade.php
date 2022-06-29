@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header"style="font-family: Helvetica;font-size: large; background-color:#89afcc;color:#fff">modifier votre equipe</div>
  <div class="card-body">
      
      <form action="{{ url('Equipe/' .$equipe->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$equipe->id}}" id="id" />
        
        <label>nom d'equipe</label></br>
        <input type="text" name="nomequipe" id="nomequipe"value="{{$equipe->nomequipe}}" class="form-control"required></br>
        <label>nombre membres </label></br>
        <input type="text" name="nombrequipe" id="nombrequipe"value="{{$equipe->nombrequipe}}" class="form-control"required></br>
        <div class="form-group">
                <label for="chefequipe_id">chefequipe</label>
                <select class="form-control js-example-basic-multiple {{ $errors->has('chefequipe') ? 'is-invalid' : '' }}" name="chefequipe_id" id="chefequipe_id"required>
                    @foreach($chefequipes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('chefequipe_id') ? old('chefequipe_id') : $equipe->chefequipe->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('chefequipe'))
                    <div class="invalid-feedback">
                        {{ $errors->first('chefequipe') }}
                    </div>
                @endif
              </div>
            <div class="form-group">
                <label for="membres">membre</label>
                
                <select class="form-control js-example-basic-multiple {{ $errors->has('membres') ? 'is-invalid' : '' }}" name="membres[]" id="membres" multiple required>
                    @foreach($membres as $id => $membre)
                        <option value="{{ $id }}" {{ (in_array($id, old('membres', [])) || $equipe->membres->contains($id)) ? 'selected' : '' }}>{{ $membre }}</option>
                    @endforeach
                </select>
                @if($errors->has('membres'))
                    <div class="invalid-feedback">
                        {{ $errors->first('membres') }}
                    </div>
                @endif
              </div>
<div class="form-group">
                <label for="nom_projets">nom_projet</label>
              
                <select class="form-control js-example-basic-multiple {{ $errors->has('nom_projets') ? 'is-invalid' : '' }}" name="nom_projets[]" id="nom_projets" multiple required>
                    @foreach($nom_projets as $id => $nom_projet)
                        <option value="{{ $id }}" {{ (in_array($id, old('nom_projets', [])) || $equipe->nom_projets->contains($id)) ? 'selected' : '' }}>{{ $nom_projet }}</option>
                    @endforeach
                </select>
                @if($errors->has('nom_projets'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_projets') }}
                    </div>
                @endif
                </div>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
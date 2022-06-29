@extends('layouts.layout')
@section('content')
 
<div class="card">
  <div class="card-header"style="font-family: Helvetica;font-size: large; background-color: #97bfde;color:#fff">modifier le material</div>
  <div class="card-body">
      
      <form action="{{ url('material/' .$material->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$material->id}}" id="id" required/>
        
        <label>nom de Material</label></br>
        <input type="text" name="nom_material" id="nom_material"value="{{$material->nom_material}}" class="form-control"required></br>
        <label>type de Material</label></br>
        <input type="text" name="typeMarterial" id="typeMarterial"value="{{$material->typeMarterial}}" class="form-control"required></br>
        <label>Cout</label></br>
        <input type="text" name="cout" id="cout"value="{{$material->cout}}" class="form-control"required></br>
        <label>date d'achat </label></br>
        <input type="date" name="dateAchat" id="dateAchat" value="{{$material->dateAchat}}"class="form-control"required></br>
        <label>L'état</label></br>
        <input type="text" name="etat" id="etat" value="{{$material->etat}}"class="form-control"required></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
   
  </div>
</div>
 
@stop
@extends('layouts.layout')
@section('content')
 
 
<div class="card">
<div id='sectionAimprimer'>
  <div class="card-header">matrerial page</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Chef De Projet : {{ $equipe->nomequipe }}</h5>
        <p class="card-text">membre  : {{ $equipe->nombrequipe }}</p>
      
        
        
  </div>
       
    </hr>
  
  </div>
</div>
</div>
<button type="button"  class="btn btn-warning btn-lg float-sm-end" id="load2" style="color:white;" data-loading-text=" Processing Order"><i class='fa fa-spinner fa-spin text-light '></i><a href="#" onClick="imprimer('sectionAimprimer')" class="btn btn-sm ms-2">Imprimer</a>
  <script>
function imprimer(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>

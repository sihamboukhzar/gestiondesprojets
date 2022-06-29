@extends('layouts.layout')
@section('content')
 
 
<div class="container-fluid mb-5 ">

  <div style="font-family: fantasy;font-size: x-large;">votre projet </div>
  <div id='sectionAimprimer'>
  <div class="card-body">
  
  <div class="card-body" style="padding:  50px;border-style:solid;margin-left:2.5em">
           <ul>
          <li> <h5 style="font-family: fantasy;font-size: large;width : 200px;">  nom projet &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; &nbsp;{{ $Projects->nom_projet }}</h5> <br>
      </li>
               <li> <p  style="font-family: fantasy;font-size: large;"> budget &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp; {{ $Projects->budget }}</p>  <br>
       </li>
               <li><p  style="font-family: fantasy;font-size: large;">date fin&nbsp; &nbsp;:&nbsp; &nbsp; &nbsp;   {{ $Projects->datefin }} </p>   <br>
       </li>
              <li><p  style="font-family: fantasy;font-size: large;"> chef d'equipe &nbsp; &nbsp;: &nbsp; &nbsp; &nbsp;           {{ $Projects->equipe }}  </p> <br>
        </li>
        <li>      <p  style="font-family: fantasy;font-size: large;">les materiaux &nbsp; &nbsp;: </p>   &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;            
       <ul>
        @foreach($material as $item)
        <li>&nbsp; &nbsp;<span class="label label-info">{{ $item->nom_material }} </span> </li>&nbsp; &nbsp;
        @endforeach
        </ul>
        
        </p></li>
        <li>
        <p  style="font-family: fantasy;font-size: large;">commantaire   &nbsp; &nbsp;: </p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;            {{ $Projects->commantaire }}

        </li>
</ul>
   
          
      
    </hr>
    </div>
 
 </div>
  </div>
 
</div>
<button type="button"  class="btn btn-info btn-lg float-sm-end" style="color:white;">
<i class='fa fa-spinner fa-spin text-light '></i>
<a href="#" onClick="imprimer('sectionAimprimer')" class="btn btn-sm ms-2">Imprimer</a>
  <script>
   function imprimer(divName) {
      var printContents = document.getElementById(divName).innerHTML;    
   var originalContents = document.body.innerHTML;      
   document.body.innerHTML = printContents;     
   window.print();     
   document.body.innerHTML = originalContents;
   }
</script>
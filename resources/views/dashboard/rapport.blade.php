@extends('layouts.layout')
@section('content')
      <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <div class="container">
                                     <div class="row">
                                     <div class="card">
                                     <div class="card-header">
                                         <h2>les projets actual </h2>
                                        </div>
                                    <table class=" table table-striped  align-middle mb-0 bg-white">
                                     <thead class=" bg-light">
                                    <tr>
                                       
                                        <th>nom projet</th>
                                      
                                        <th>date debut</th>
                                        <th>date fin </th>
                                        <th>chef d'equipe </th>
                                        <th>statut </th>
                                        <th>Commantaire </th>
                                        
                                        <th></th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($projectencours as $key => $project)
                                     <tr data-entry-id="{{ $project->id }}">
                       
                                       
                                       <td>
                                              {{ $project->nom_projet ?? '' }}
                                          </td>
                                          
                                             <td>
                                              {{ $project->datedebut ?? '' }}
                                          </td>
                                          <td>
                                               {{ $project->datefin ?? '' }}
                                            </td>
                                            <td>
                                            {{ $project->chef_dequipe->email ?? '' }}
                                            </td>
                                            <td>
                                            <span class="badge badge-warning rounded-pill d-inline"  > {{ $project->etatprojet ?? '' }}</span >
                                              
                                            </td>
                                        <td>
                                                   {{ $project->commantaire ?? '' }}
                                         </td>
                                        
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                       
                                        </tr>
                                    </tfoot>
                            </table>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                   
                                </div>
                            </div>
                        </div>




                        
                         
    @endsection
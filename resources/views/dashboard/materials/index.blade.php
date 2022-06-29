@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2>LES MATERIAILS</h2>
                    </div>
                  
  
                    <div class="card-body">
                    @can('materail-create')
                        <a href="{{ url('/material/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                     @endcan
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-striped  align-middle mb-0 bg-white">
                                <thead class=" bg-light">
                                    <tr>
                                        <th>#</th>
                                       
                                        <th> nom material</th>
                                        <th> Type de Marterial</th>
                                        <th>Cout</th>
                                        <th>Date d'Achat</th>
                                        <th>L'état </th>
                                        <th>nom projet</th>
                                        <th>gerer vos materials </th>
                                        <th></th> 
                                    </tr>
                                </thead>
                                <tbody>
     @foreach($materials as $key => $material)
                        <tr data-entry-id="{{ $material->id }}">
                            
                            <td>
                                {{ $material->id ?? '' }}
                            </td>
                            <td>
                                {{ $material->nom_material ?? '' }}
                            </td>
                            <td>
                                {{ $material->type_marterial ?? '' }}
                            </td>
                            <td>
                                {{ $material->cout ?? '' }}
                            </td>
                            <td>
                                {{ $material->date_achat ?? '' }}
                            </td>
                            <td>
                                {{ $material->etat ?? '' }}
                            </td>
                            <td>
                                @foreach($material->nom_projets as $key => $item)
                                    <span class="badge badge-info">{{ $item->nom_projet }}</span>
                                @endforeach
                            </td>
                                        <td>
                                     
                                            <a href="{{ url('/material/' . $material->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                          
                                            @can('material-edit')
                                            <a href="{{ url('/material/' . $material->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                           @endcan
                                            <form method="POST" action="{{ url('/material' . '/' . $material->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                @can('material-delete')  
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('are You Sure');"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                           @endcan
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
 
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2>LES EQUIPES </h2>
                    </div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
</div>
@endif
                    <div class="card-body">
                    @can('equipe-create')
                        <a href="{{ url('/Equipe/create') }}" class="btn btn-success btn-sm" title="Add New Student">
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
                                        <th> nom d'quipe</th>
                                        <th>chef d'equipe</th>
                                        <th> les membres</th>
                                        <th>nom projet </th>
                                        
                                        <th></th> 
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($equipes as $key => $equipe)
                                    <tr data-entry-id="{{ $equipe->id }}">
                                   <td>
                                          {{ $equipe->id ?? '' }}
                                      </td>
                                    <td>
                                {{ $equipe->nomequipe ?? '' }}
                                     </td>
                                    
                                       <td>{{ $equipe->chefequipe->email ?? '' }}</td>
                                       <td>
                                @foreach($equipe->membres as $key => $item)

                                    <span class="badge badge-info">{{ $item->email }}</span>
                                  
                                @endforeach
                                        </td>
                                         <td>
                                @foreach($equipe->nom_projets as $key => $item)
                                    <span class="badge badge-info">{{ $item->nom_projet }}</span>
                                   
                                @endforeach
                                         </td>
                                        
 
                                        <td>
                                       
                                            <a href="{{ url('/Equipe/' . $equipe->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                           
                                            @can('equipe-edit')
                                            <a href="{{ url('/Equipe/' . $equipe->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endcan
                                            <form method="POST" action="{{ url('/Equipe' . '/' . $equipe->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                @can('equipe-delete')
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
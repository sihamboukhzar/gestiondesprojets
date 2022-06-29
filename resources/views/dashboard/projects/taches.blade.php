@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2>ajouter une tache </h2>
                    </div>
                    <div class="card-body">
                    @can('tache-create')
                        <a href="{{ url('/Tache/create') }}" class="btn btn-success btn-sm" title="ajouter une tachet">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        @endcan
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class=" table table-striped  align-middle mb-0 bg-white">
                            <thead class=" bg-light">
                    <tr>
                        <th width="10">

                        </th>
                        
                        <th>
                          nom_tache
                        </th>
                        <th>
                            participants
                          </th>
                        <th>
                            l'etat </th>
                        <th>
                            dgree de priorite </th>
                        <th>
                            date debut
                        
                        </th>
                        <th>
                            date fin
                            
                        </th>
                        <th>
                            nom_projet
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                       @foreach($taches as $key => $tache)
                                  <tr data-entry-id="{{ $tache->id }}">
                                    <td>
                                {{ $tache->id ?? '' }}
                            </td>
                            <td>
                                {{ $tache->nom_tache ?? '' }}
                            </td>
                            <td>
                                @foreach($tache->participants as $key => $item)
                                    <span class="badge badge-info">{{ $item->email }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ App\Models\Tache::ETAT_SELECT[$tache->etat] ?? '' }}
                            </td>
                            <td>
                                <span style="display:none">{{ $tache->dgree_priorite ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $tache->dgree_priorite ? 'checked' : '' }}>
                                <label for="dgree_priorite">important</label>
                            </td>
                            <td>
                                {{ $tache->date_debut ?? '' }}
                            </td>
                            <td>
                                {{ $tache->date_fin ?? '' }}
                            </td>
                            <td>
                                {{ $tache->nom_projet->nom_projet ?? '' }}
                            </td>
                            <td>
                                 <a href="{{ url('/Tache/' . $tache->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                 @can('tache-edit') <a href="{{ url('/Tache/' . $tache->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>  @endcan
 
                                 @can('tache-delete') <form method="POST" action="{{ url('/Tache' . '/' . $tache->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Student" onclick="return confirm('are You Sure');"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                 @endcan
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
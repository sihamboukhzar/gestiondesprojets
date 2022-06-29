<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="{{ url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ url('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="{{url('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
    <div class="container">
        <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h2>GERER LES TACHES </h2>
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
                            <table class=" table table-striped  align-middle mb-0 bg-white" id="dataTable">
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
<!-- Bootstrap core JavaScript-->
<script src="{{url('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{url('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{url('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{url('js/demo/datatables-demo.js')}}"></script>

</body>

</html>
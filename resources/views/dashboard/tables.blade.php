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

    <!-- Page Wrapper -->
   

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                   
                    <!-- DataTales Example -->

                    <a class="d-none d-sm-inline-block btn btn-sm btn-primary " href="/dashboard/ajouter">ajouter</a>
                    <div class="card shadow mb-4">
                    
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
         
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>nom projet</th>
                                        <th>budget</th>
                                        <th>date debut</th>
                                        <th>date fin </th>
                                        <th>chef d'equipe </th>
                                        <th>etatprojet </th>
                                        <th>Commantaire </th>
                                        <th>materials</th>
                                        <th>#</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <th>#</th>
                                        <th>nom projet</th>
                                        <th>budget</th>
                                        <th>date debut</th>
                                        <th>date fin </th>
                                        <th>chef d'equipe </th>
                                        <th>etatprojet </th>
                                        <th>Commantaire </th>
                                        <th>materials</th>
                                        <th>#</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    @foreach($projects as $key => $project)
                                     <tr data-entry-id="{{ $project->id }}">
                       
                                        <td>
                                            {{ $project->id ?? '' }}
                                        </td>
                                       <td>
                                              {{ $project->nom_projet ?? '' }}
                                          </td>
                                           <td>
                                                 {{ $project->budget ?? '' }}
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
                                        <td>
                                                @foreach($project->materials as $key => $item)
                                                                <span class="badge badge-info">{{ $item->nom_material }}</span>
                                                 @endforeach                       
                                        </td>
                                        <td>

                                         <a href="{{ url('/Project/' . $project->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            @can('project-edit')

                                            <a href="{{ url('/Project/' . $project->id . '/edit') }}" title="Edit Student"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            @endcan
                                            <form method="POST" action="{{ url('/Project' . '/' . $project->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                @can('project-delete')

                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Projets" onclick="return confirm('are You Sure');"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>customerCreate</title>

    <!-- Custom fonts for this template-->
    <link href="{{ url('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="{{ url('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">
<br>
      <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add project
                                <a href="{{url('/dashboard/tables')}}" class="float-right btn btn-success btn-sm">View All</a>
                            </h6>
                        </div>
                        <div class="card-body">

                            @if($errors->any())
                                @foreach($errors->all() as $error)
                                    <p class="text-danger">{{$error}}</p>
                                @endforeach
                            @endif

                            @if(Session::has('success'))
                            <p class="text-success">{{session('success')}}</p>
                            @endif
                            <div class="table-responsive">
                                <form method="post" enctype="multipart/form-data" action="{{url('admin/customer')}}">
                                    @csrf
                                    <table class="table table-bordered" >
                                        <tr>
                                            <th>nom projet  <span class="text-danger">*</span></th>
                                            <td><input name="first_name" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>L'equipe <span class="text-danger">*</span></th>
                                            <td><input name="last_name" type="text" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>material <span class="text-danger">*</span></th>
                                            <td><input name="email" type="texte" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>budget<span class="text-danger">*</span></th>
                                            <td><input name="password" type="text" class="form-control" /></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>date de début  <span class="text-danger">*</span></th>
                                            <td><input name="phone" type="date" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th>date de fin  <span class="text-danger">*</span></th>
                                            <td><input name="phone" type="date" class="form-control" /></td>
                                        </tr>
                                        <tr>
                                            <th> commantaire </th>
                                            <td><textarea name="adresse" class="form-control"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <input type="submit" class="btn btn-primary" />
                                            </td> 
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>


            <!-- End of Main Content -->

   

    <!-- Bootstrap core JavaScript-->
    <script src="{{ url('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ url('js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{ url('vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{ url('js/demo/chart-pie-demo.js')}}"></script>

</body>

</html>
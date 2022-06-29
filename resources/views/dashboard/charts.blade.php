<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Charts</title>

    <!-- Custom fonts for this template-->
    <link href="{{('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ url('css/sb-admin-2.min.css')}}" rel="stylesheet">
<style>
    
</style>
</head>

<body id="page-top">

    <!-- Page Wrapper************************************************************ -->
   

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">des diagramme déscriptives</h1>
  

                    <!-- Content Row -->

                    

                        
                        
                            <!-- Bar Chart -->
                            <div class="col"> 
                              <div class="card h-100 shadow-sm"> 
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">suivre les status des taches </h6>
                                </div>
                                <div class="card-body">
                                  <div id="columnchart_material" style="width: 900px; height: 500px; margin-left: 100px;"></div>
                                   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
                                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                    <script type="text/javascript">
                                       google.charts.load('current', {'packages':['bar']});
                                       google.charts.setOnLoadCallback(drawChart);

                                       function drawChart() {
                                       var data = google.visualization.arrayToDataTable([
                                        
                                       ['projects', 'les taches finie', 'les taches bloque ','les taches en cours'],
                                        <?php
                                         foreach($resultat as $project){
                                         echo"['".$project->nom_projet."' ,".$project->nbrfait.", ". $project->nbrenpause.",".$project->nbrencours."],";
                                              }
                                         ?>
                                        ]);
                                     var options = {
                                    chart: {
                                title: 'la distribution des  taches finie, des taches bloqué,et des taches en cours pour chaque un des  projets',
                               
                                }
                                 };

                                    var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                     chart.draw(data, google.charts.Bar.convertOptions(options));
                                         }
                                  </script>
                                 
                                </div>
                            </div>

                            </div>
                            </div>
<br> <br>
                        <!-- Donut Chart -->
                        <div class="col"style="width: 1000px;margin-left: 150px;"> 
                              <div class="card h-60 shadow-sm"> 
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">suivre vos les status des projets</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div id="donutchart" style="width: 900px; height: 500px;"></div>

                                    <script> 
                                       google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'les projets'],
          
          ['les projets fini',      <?php echo $projectdone ; ?>],
          ['les projets bloqué',  <?php echo $projectenpause ; ?>],
          ['les projets en cours', <?php echo $projectencours ; ?>],
         
        ]);

        var options = {
          title: 'la distribution  des projets selon leurs état',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
                                   </script>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

 </div>
<!-- /.container-fluid -->

 

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
    <script src="{{url('vendor/chart.js/Chart.min.js')}}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Page level custom scripts -->
    <script src="{{url('js/demo/chart-area-demo.js')}}"></script>
    <script src="{{url('js/demo/chart-pie-demo.js')}}"></script>
    <script src="{{url('js/demo/chart-bar-demo.js')}}"></script>

</body>

</html>
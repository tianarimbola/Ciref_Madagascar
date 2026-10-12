<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CIREF</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/datatables/datatables.min.css')}}"> -->
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link  rel="stylesheet"  href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
    <style type="text/css">/* Chart.js */
    
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
</style>
    <link rel="stylesheet" href="{{ asset('css/professional.css') }}">
</head>
<body>
    <div class="main">
    @include('menubar/menu')     
      <div class="body">
      <div style="background-color: #f2f2f2;padding: 10px 20px;">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Left navbar links -->
  <!-- <ul class="navbar-nav"> -->
    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
     <button class="nav-link">fdsfdsf</button>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul> -->

  <h3 class="collapse navbar-collapse justify-content-center ">
    <!-- <li class="nav-item d-none d-sm-inline-block"> -->
        ACCUEIL
    <!-- </li> -->
  </h3>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
   
  </ul>
 </nav>
<!-- /.navbar -->  
</div>
       <div class="row">
<div class="col-lg-3 col-6">

<div class="small-box bg-info">
<div class="inner">
@foreach($totalE as $key => $valE)
<h3>{{$valE->total}}</h3>
@endforeach
<p>Exploitants</p>
</div>
<div class="icon">
<i class="ion ion-bag"></i>
</div>

</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-success">
<div class="inner">
@foreach($data_dispo as $key => $val_dispo)
<h3>{{$val_dispo->total_dispo}}</h3>
@endforeach
<p>Autorisation de coupe en cours</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>

</div>
</div>

<div class="col-lg-3 col-6">

<div class="small-box bg-danger">
<div class="inner">
@foreach($data_expire as $key => $val_expire)
<h3>{{$val_expire->total_expire}}</h3>
@endforeach
<p>Autorisation de coupe expirée</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>

</div>
</div>

<div class="col-lg-3 col-6">
<div class="small-box bg-warning">
<div class="inner">
    @foreach($data_transport as $key => $val_transport)
    <h3>{{$val_transport->total_transport}}</h3>
    @endforeach
   <p>Autorisation de transport</p>
</div>
<div class="icon">
<i class="ion ion-person-add"></i>
</div>

</div>
</div>

</div>
 <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bilan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                    <div class="chart-responsive">
                      <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                          <div class="">

                          </div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                          <div class="">

                          </div>
                        </div>
                      </div>
                      <canvas id="myChart" height="300" width="300" style="display: block; height: 300px; width: 300px;" class="chartjs-render-monitor"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                 
                  <!-- /.col -->
                
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.footer -->
            </div>
    </div> 

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
  <script srdc="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.min.js"></script>
  <script type="text/javascript">
    function confirmdeconnecter(ev)
    {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');
            
        console.log(urlToRedirect)

        Swal.fire({
            
            title:"Voulez vous vraiment deconnecter ?",

            icon:"warning",

            confirmButtonText: 'OK',
             
            showCancelButton: true,

            cancelButtonText: 'Annuler' ,

            dangerMode : true,


        }).then((result)=>
        {
            if(result.isConfirmed){
                window.location.href = urlToRedirect;
            }
        });
    }
</script>

<script>
  // Initialisez le graphique en secteurs avec des données de test
  var exploitants = <?php echo json_encode($valE->total); ?>;
  var expire = <?php echo json_encode($val_expire->total_expire); ?>;
  var dispo = <?php echo json_encode($val_dispo->total_dispo); ?>;
  var transport = <?php echo json_encode($val_transport->total_transport); ?>;
  var ctx = document.getElementById('myChart').getContext('2d');
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['autorisation de coupe en cours', 'autorisation de coupe expiré','autorisation de transport','exploitants'],
      datasets: [{
        data: [dispo, expire, transport, exploitants],
        backgroundColor: ['green', 'red', 'yellow','blue']
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false // Nécessaire pour rendre le graphique réactif
    }
  });
</script>

  
</body>
</html>
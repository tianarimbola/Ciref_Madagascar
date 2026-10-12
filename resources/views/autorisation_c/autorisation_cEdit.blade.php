<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/autorisation_c/autorisation_c.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('autorisation_c/menu.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/datatables/datatables.min.css')}}"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <title>Document</title>
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
  <ul class="navbar-nav">
    <li class="d-none d-sm-inline-block">
      <a href="#" class="nav-link menu-item" id="nav-link-act">Tous</a>
    </li>
    <li class="d-none d-sm-inline-block">
      <a href="#" class="nav-link menu-item active" id="nav-link-acd">AC en cours</a>
    </li>
    <li class="d-none d-sm-inline-block">
      <a href="#" class="nav-link menu-item" id="nav-link-ace">AC expiré</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
     <button type="button" class="btn btn-primary" id="show-popup"> 
     <i class="fa fa-user-plus fa-xs"></i>
        ajouter
     </button>
    </li>
  </ul>

  
  <ul class="collapse navbar-collapse justify-content-center ">
    <li class="nav-item d-none d-sm-inline-block">
        Accueil
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
       <a href="#"><button type="button" class="btn btn-danger"><i class="fa fa-sign-out-alt"></i> Deconnecter</button></a>
    </li>
    <!-- Notifications Dropdown Menu -->
  </ul>
 </nav>
<!-- /.navbar -->  
</div>

        <!-- pop up modif -->
        <div class="popup1">
        <a href="{{route('autorisation_c')}}"><div class="close-btn1">&times;</div></a>
        
         <form action="{{route('autorisation_c.edita')}}" method="post">
           @foreach($dataedit as $key => $valac)
            @csrf
            @method('PUT')
         <div class="form">
            <h2>Modification d'une autorisation de transport </h2>
            <div class="row">
            
                <div class="col-md-6">
                    <div class="form-element ">
                        <label for="cin">Numero autorisation</label>
                        <input type="number" name="numero" placeholder="Numero" value="{{$valac->numero}}" required >
                    </div>       
                    <div class="form-element">
                        <label for="lieu">Date de signature</label>
                        <input type="text" id="datepicker" name="date_signature" class= "form-control" placeholder="date de signature" value="{{$valac->date_signature1}}" required>
                    </div> 
                    <div class="form-element">
                        <label for="lieu">Date d'expiration</label>
                        <input type="text" id="datepicker1" name="date_expiration" class= "form-control" placeholder="date d'expiration" value="{{$valac->date_expiration1}}" required>
                    </div> 
                    <div class="form-element">
                        <label for="lieu">Localisation</label>
                        <input type="text" name="localisation_geo" placeholder="localisation" value="{{$valac->localisation_geo}}" required >
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-element">
                        <label for="lieu">Surface</label>
                        <input type="text" name="surface" placeholder="surface" value="{{$valac->surface}}" required>
                    </div> 
                    <div class="form-element">
                        <label for="lieu">Commune</label>
                        <input type="text" name="commune" placeholder="commune" value="{{$valac->commune}}" required>
                    </div> 
                    <div class="form-element">
                        <label for="lieu">Produit</label>
                        <select name="produit_id" id="custom-select" class="form-select form-select-lg mb-3">
                            <option value="{{$valac->pd}}" selected>{{ $valac->produit_nom }}</option>
                            @foreach($produit as $produits)
                            <option value="{{ $produits->produit_id }}">{{ $produits->produit_nom }}</option>
                            @endforeach
                        </select>
                    </div> 
                    <div class="form-element">
                        <label for="lieu">quantite</label>
                        <input type="text" name="quantite" placeholder="quantite" value="{{ $valac->quantite }}" required>
                    </div> 
                    <input type="hidden" name="id" placeholder="quantite" value="{{ $valac->autorisation_c_id }}" required>
                </div>
               
                <div class="form-element">
                        <button>Modifier</button>
                </div>
               
            </div>
       
        </div>
        
        </form>
        @endforeach
       </div>
       <br>
       <!-- pop up edit -->

      
        <div class="mytable">
        @if(session('success'))
       <div class = "alert alert-success auto-close">{{session('success')}}</div>
        @endif
        @if(session('error'))
       <div class = "alert alert-warning auto-close">{{session('error')}}</div>
        @endif
       <table id="example" class="table table-striped" style="width:100%">
        <thead>
     
            <tr>
                <th>Numero</th>
                <th>Nom exploitant</th>
                <th>date de signature</th>
                <th>date d'expiration</th>
                <th>localisation</th>
                <th>surface</th>
                <th>commune</th>
                <th>quantite</th>
                <th>produit</th>
                <th>action</th>
                
            </tr>
        </thead>
        <tbody>

            @foreach($data as $key => $val)
            <tr>
                <td>{{$val->numero}}</td>
                <td>{{$val->exploitant_nom}}</td>
                <td>{{$val->date_signature1}}</td>
                <td>{{$val->date_expiration1}}</td>
                <td>{{$val->localisation_geo}}</td>
                <td>{{$val->surface}}</td>
                <td>{{$val->commune}}</td>
                <td>{{$val->quantite}} {{$val->unite}} </td>
                <td>{{$val->produit_nom}}</td>
                
                <td class="flex-container">
                    <a href="#"><button type="button" class="btn btn-warning"><i class="fa fa-file-pen"></i></button></a>
                    <a href="#"><button type="button" class="btn btn-danger"><i class="fa fa-trash-can"></i></button></a>
                    <a href="#"><button type="button" class="btn btn-primary"><i class="fa-solid fa-circle-info"></i></button></a>
                </td>
                
            @endforeach
            </tr>
            
        </tbody>

        </table>   
       </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
     $(document).ready(function() {
    $('#example').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
        }
    });
});
    </script>
    
    <!-- add -->
    <script>
    document.querySelector("#show-popup").addEventListener("click", function(){
        document.querySelector(".popup").classList.add("active");
    });
    document.querySelector(".close-btn").addEventListener("click", function(){
        document.querySelector(".popup").classList.remove("active");
    });  
    </script>
    <!-- edit -->
    <!-- <script>
    document.querySelector("#show-popup1").addEventListener("click", function(){
        document.querySelector(".popup1").classList.add("active1");
    });
    document.querySelector(".close-btn1").addEventListener("click", function(){
        document.querySelector(".popup1").classList.remove("active1");
    });  
    </script> -->
<script>
    // Sélectionnez l'élément avec la classe 'auto-close' et masquez-le après 5 secondes
    setTimeout(function() {
        var autoCloseElement = document.querySelector('.auto-close');
        if(autoCloseElement) {
            autoCloseElement.style.display = 'none';
        }
    }, 5000); // 5000 millisecondes = 5 secondes
</script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script>
    $(document).ready(function(){
       $.datepicker.setDefaults($.datepicker.regional['fr']);
       $('#datepicker').datepicker({
        dateFormat:'dd-mm-yy',
        changeMonth: true,
        changeDay: true,
        changeYear: true,
       });
       $('#datepicker1').datepicker({
        dateFormat:'dd-mm-yy',
        changeMonth: true,
        changeDay: true,
        changeYear: true,
       });
    });
</script>
</body>
</html>
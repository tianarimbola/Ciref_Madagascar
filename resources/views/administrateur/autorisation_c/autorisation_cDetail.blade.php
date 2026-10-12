<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/autorisation_c/autorisation_c.css')}}">
    <link rel="stylesheet" href="{{asset('css/autorisation_c/menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <!-- <link rel="stylesheet" href="{{asset('css/datatables/datatables.min.css')}}"> -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link  rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/professional.css') }}">
</head>
    <body>
    <div class="popup2">
<div class="close-btn2">&times;</div>
<form action="{{route('autorisation_t.store')}}" method="post">
   @csrf
<div class="form">
   <h2>ajout d'une autorisation de transport </h2>
   <div class="row">
   @foreach($data as $key => $val)
           <input type="hidden" name="idc" value ="{{$val->autorisation_c_id}}" required >
           <div class="form-element">
               <label for="nom">Numero autorisation transport</label>
               <input type="number" name="numero_at" placeholder="numero laissez passer" required >
           </div>
           <div class="form-element">
               <label for="nom">Numero laissez passser</label>
               <input type="number" name="numero" placeholder="numero laissez passer" required >
           </div>
           <div class="form-element">
               <label for="cin">Quantité</label>
               <input type="number" name="quantite" placeholder="quantite" required >
           </div>       
           <div class="form-element">
               <label for="lieu">date de transport</label>
               <input type="date" id="datepicker" name="date_transport" class= "form-control" placeholder="date de transport" required>
           </div>   

       <div class="form-element">
               <button>Ajouter</button>
       </div>
   </div>
</div>

</form>
</div>

      <div class="main">
      @include('administrateur/menubar/menu')
      <div class="body">

      <div style="background-color: #f2f2f2;padding: 10px 20px;">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item d-none d-sm-inline-block">
     <button type="button" class="btn btn-primary" id="show-popup2"> 
     <i class="fa fa-user-plus fa-xs"></i>
        ajouter
     </button>
    </li>
  </ul>
  <ul class="navbar-nav">
  <a href="{{route('admin.print_ac',$val->autorisation_c_id)}}">
       <button  type="button" class="btn btn-success"> 
       <i class="fa fa-solid fa-print"></i>
        imprimer la fiche d'apurment
        </button>
    </a>
    </ul>
  
  <ul class="collapse navbar-collapse justify-content-center ">
    <li class="nav-item d-none d-sm-inline-block">
        LISTE DES AUTORISATIONS DE TRANSPORT 
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->

  </ul>
 </nav>
<!-- /.navbar -->  
</div>

      @if(session('success'))
       <div class = "alert alert-success auto-close">{{session('success')}}</div>
        @endif
        @if(session('error'))
       <div class = "alert alert-warning auto-close">{{session('error')}}</div>
        @endif


<!-- component -->
<iv class="card m-3 ">

                <div class='card-header'>
                    <h6 class="text-center ">information de l'autorisation de coupe </h6>
                    <div class="row justify-content-center mx-4">
                        <div class="col-3  m-0">
                        
                            <p>Nom de l'exploitant  : <strong> {{$val->exploitant_nom}} </strong></p>
                            <p>Numero autorisation de coupe  : <strong>{{$val->numero}}</strong></p>
                        </div>
                       <div class="col-3  m-0">
                            <p>A été fait le  : <strong>{{$val->date_signature1}} </strong></p>
                            <p>Date d'expiration  : <strong>{{$val->date_expiration1}}</strong></p>
                        </div>
                        <div class="col-3  m-0">
                            <p>nom du produit  : <strong> {{$val->produit_nom}} </strong></p>
                            <p>quantite  : <strong>  {{$val->quantite}} </strong></p>
                        </div>
                        <div class="col-3 m-0">
                            <p>Commune : <strong>  {{$val->commune}} </strong></p>
                            <p>localisation geographique  : <strong>{{$val->localisation_geo}}</strong></p>
                        </div>
                    </div> 
                </div>
                @endforeach

       
       <br><br>
       
    
      
        <br>
       <div class="mytable">
       <table id="example" class="table table-hover" style="width:100%">
        <thead>
     
            <tr>
                <th>Numero autoriation transport</th>
                <th>Numero laissez passer</th>
                <th>date de transport</th>
                <th>quantite</th>
                <th>reste</th>
                
             
                
            </tr>
        </thead>
        <tbody>

            @foreach($datat as $key => $val1)
            <tr>
                <td>{{$val1->numero}}</td>
                <td>{{$val1->num_laissez_passer}}</td>
                <td>{{$val1->date_transport1}}</td>
                <td>{{$val1->quantite_t}}</td>
                <td>{{$val1->reste}}</td>
            @endforeach
            </tr>
            
        </tbody>

        </table>   
       </div>
       <!-- fin principal table -->

        </div>
      </div> 

      <script>
    document.querySelector("#show-popup2").addEventListener("click", function(){
        document.querySelector(".popup2").classList.add("active2");
    });
    document.querySelector(".close-btn2").addEventListener("click", function(){
        document.querySelector(".popup2").classList.remove("active2");
    });  
    </script> 
    <script>
    $(document).ready(function(){
       $.datepicker.setDefaults($.datepicker.regional['fr']);
       $('#datepicker').datepicker({
        dateFormat:'dd-mm-yy',
        changeMonth: true,
        changeDay: true,
        changeYear: true,
       });
    });
    </script>
    <script>
    // Sélectionnez l'élément avec la classe 'auto-close' et masquez-le après 5 secondes
    setTimeout(function() {
        var autoCloseElement = document.querySelector('.auto-close');
        if(autoCloseElement) {
            autoCloseElement.style.display = 'none';
        }
    }, 5000); // 5000 millisecondes = 5 secondes
</script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script>
     $(document).ready(function() {
    $('#example').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
        }
    });   
});
    </script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" ></script>
    </body>
</html>
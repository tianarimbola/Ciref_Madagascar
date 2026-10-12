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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/professional.css') }}">
</head>
<body>
<div class="main">
@include('administrateur/menubar/menu')
    <div class="body">
    <div style="background-color: #f2f2f2;padding: 10px 20px;">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <h3 class="collapse navbar-collapse justify-content-center ">
                GERER AUTORISATION DE COUPE
            </h3>
            <ul class="navbar-nav">
                <li class="d-none d-sm-inline-block">
                    <a href="#" class="nav-link menu-item active" id="nav-link-act">TouTes</a>
                </li>
                <li class="d-none d-sm-inline-block">
                    <a href="#" class="nav-link menu-item" id="nav-link-acd">En cours</a>
                </li>
                <li class="d-none d-sm-inline-block">
                    <a href="#" class="nav-link menu-item" id="nav-link-ace">Expirées</a>
                </li>
            </ul>
        </nav>
        
    </div>
    @if(session('success'))
    <div class = "alert alert-success auto-close">
        {{session('success')}}
    </div>
        @endif
        @if(session('error'))
    <div class = "alert alert-warning auto-close">
        {{session('error')}}
    </div>
        @endif
        <!-- pop up ajout -->
    <div class="popup">
         <div class="close-btn">&times;</div>
        <form action="{{route('autorisation_c.store')}}" method="post">
            @csrf
            <div class="form">
                <h2>Ajout d'ajout</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-element">
                            <label for="nom">Nom de l'exploitant</label>
                            <input type="text" name="exploitant_nom" placeholder="Nom" required >
                        </div>
                        <div class="form-element">
                            <label for="cin">Numero</label>
                            <input type="number" name="numero" placeholder="Numero" required >
                        </div>       
                        <div class="form-element">
                            <label for="lieu">Date de signature</label>
                            <input type="date" id="datepicker" name="date_signature" class= "form-control" placeholder="date de signature" required>
                        </div> 
                        <div class="form-element">
                            <label for="lieu">Date d'expiration</label>
                            <input type="date" id="datepicker1" name="date_expiration" class= "form-control" placeholder="date d'expiration" required>
                        </div> 
                        <div class="form-element">
                            <label for="lieu">Localisation</label>
                            <input type="text" name="localisation_geo" placeholder="localisation" required >
                        </div> 
                    </div>
                    <div class="col-md-6">
                        <div class="form-element">
                            <label for="lieu">Surface</label>
                            <input type="text" name="surface" placeholder="surface" required>
                        </div> 
                        <div class="form-element">
                            <label for="lieu">Commune</label>
                            <input type="text" name="commune" placeholder="commune" required>
                        </div> 
                        <div class="form-element">
                            <label for="lieu">Produit</label>
                            <select name="produit_id" class="form-select" aria-label="Default select example">
                                <option selected disabled>Sélectionner</option>
                                @foreach($produit as $produits)
                                <option value="{{ $produits->produit_id }}">{{ $produits->produit_nom }}</option>
                                @endforeach
                            </select>
                        </div> 
                        <div class="form-element">
                            <label for="lieu">quantite</label>
                            <input type="text" name="quantite" placeholder="quantite" required>
                        </div> 
                    </div>
                    <div class="form-element">
                            <button>Ajouter</button>
                    </div>
                </div>
            </div>
        </form>
       </div>
        <br>

         <!-- principal table -->
        <div class="mytable">
        <table id="example" class="table table-hover" style="width:100%">
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
                    <td>{{$val->quantite}} {{$val->unite}}</td>
                    <td>{{$val->produit_nom}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>   
       </div>
       <!-- fin principal table -->

       <!-- table dispo -->

     <div class="table-dispo">
        <div class="d-flex justify-content-center shadow my-2">
            <button type="button" class="btn btn-primary form-control" id="show-popup"> 
                <i class="fa fa-user-plus fa-xs"></i>
                Ajouter
            </button>
         </div>
       <table id="example-dispo" class="table table-hover" style="width:100%">
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

            @foreach($data_dispo as $key => $vald)
            <tr>
                <td>{{$vald->numero}}</td>
                <td>{{$vald->exploitant_nom}}</td>
                <td>{{$vald->date_signature1}}</td>
                <td>{{$vald->date_expiration1}}</td>
                <td>{{$vald->localisation_geo}}</td>
                <td>{{$vald->surface}}</td>
                <td>{{$vald->commune}}</td>
                <td>{{$vald->quantite}} {{$vald->unite}} </td>
                <td>{{$vald->produit_nom}}</td>
                
                <td  class="flex-container">
                    <a href="{{route('admin.autorisation_c.editPage',$vald->autorisation_c_id)}}"><button type="button" id="show-popup1" class="btn btn-warning"><i class="fa fa-file-pen"></i></button></a>
                    <a href="{{route('autorisation_c.delete',$vald->autorisation_c_id)}}" onclick="confirmationdelete(event)"><button type="button" class="btn btn-danger"><i class="fa fa-trash-can"></i></button></a>
                    <a href="{{route('admin.autorisation_c.detail',$vald->autorisation_c_id)}}"><button type="button" class="btn btn-primary"><i class="fa-solid fa-truck"></i></button></a>
                </td>
            @endforeach
            </tr>
        
        </tbody>

        </table>   
       </div>
  
       <!-- fin principal dispo -->

       <!-- table expire -->

     <div class="table-expire">
       <table id="example-expire" class="table table-hover" style="width:100%">
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

            @foreach($data_expire as $key => $vale)
            <tr>
                <td>{{$vale->numero}}</td>
                <td>{{$vale->exploitant_nom}}</td>
                <td>{{$vale->date_signature1}}</td>
                <td>{{$vale->date_expiration1}}</td>
                <td>{{$vale->localisation_geo}}</td>
                <td>{{$vale->surface}}</td>
                <td>{{$vale->commune}}</td>
                <td>{{$vale->quantite}} {{$vale->unite}} </td>
                <td>{{$vale->produit_nom}}</td>
                
                <td class="flex-container">
                  <a href="{{route('autorisation_c.delete',$vale->autorisation_c_id)}}" onclick="confirmationdelete(event)"  class="lien-bouton"><button type="button" class="btn btn-danger"><i class="fa fa-trash-can"></i></button></a>
                </td>
            @endforeach
            </tr>
            
        </tbody>

        </table>   
     </div>
  
       <!-- fin principal expire -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
     $(document).ready(function() {
    $('#example').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
        }
    });
    $('#example-dispo').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json'
        }
    });
    $('#example-expire').DataTable({
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
<script>
    // Sélectionnez tous les éléments de menu
const menuItems = document.querySelectorAll('.menu-item');

// Parcourez chaque élément de menu
menuItems.forEach(item => {
    // Ajoutez un écouteur d'événements au clic
    item.addEventListener('click', function() {
        // Supprimez la classe active de tous les éléments de menu
        menuItems.forEach(menuItem => {
            menuItem.classList.remove('active');
        });
        
        // Ajoutez la classe active à l'élément de menu cliqué
        item.classList.add('active');
    });
});

</script>
<script>
    $(document).ready(function(){
    // Show the div when the "Show Div" button is clicked
    $(".table-expire").hide();
    $(".table-dispo").hide();
    $("#nav-link-ace").click(function(){
        $(".mytable").hide();
        $(".table-dispo").hide();
        $(".table-expire").show();
    });

    $("#nav-link-acd").click(function(){
        $(".table-expire").hide();
        $(".mytable").hide();
        $(".table-dispo").show();
    });

    $("#nav-link-act").click(function(){
        $(".table-expire").hide();
        $(".table-dispo").hide();
        $(".mytable").show();
        
    });

    // Hide the div when the "Hide Div" button is clicked
   
});

</script>
<script type="text/javascript">
    function confirmationdelete(ev)
    {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');
            
        console.log(urlToRedirect)

        Swal.fire({
            
            title:"Voulez vous vraiment supprimer",

            text:"you won't be able revert this delete",

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

</body>
</html>
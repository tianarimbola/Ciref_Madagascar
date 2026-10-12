<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/exploitant/exploitant.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul class="navbar-nav">
                <li class="nav-item d-none d-sm-inline-block">
                        <button type="button" class="btn btn-primary" id="show-popup"> 
                            <i class="fa fa-user-plus fa-xs"></i>
                            Ajouter
                        </button>
                </li>
                </ul>
                <h3 class="collapse navbar-collapse justify-content-center ">
                  PRODUITS
                </h3>
                <ul class="navbar-nav ml-auto">
                    
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
            <form action="{{route('produit')}}" method ="post">
            @csrf
                <div class="form">
                    <h2>Formulaire d'ajout</h2>
                    <div class="form-element">
                        <label for="nom">Nom du produit</label>
                        <input type="text" name="produit_nom" placeholder="nom" required>
                    </div>
                    <div class="form-element">
                        <label for="cin">Unité</label>
                        <input type="text" name="produit_unite" placeholder="unite"  required>
                    </div>       
                    <div class="form-element">
                        <button>Ajouter</button>
                    </div>
                </div>
            </form>
       </div>
       <br>
       <div class="mytable" style="width:50%, justify-content:center">
            <table id="example" class="table table-hover" style="width:100%">
                <thead >
                    <tr style="text-align:center">
                        <th>Nom</th>
                        <th>unite</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $val)
                    <tr>
                        <td>{{$val->produit_nom}}</td>
                        <td>{{$val->unite}}</td>
                        <td>
                            <a href="{{route('produit',$val->produit_id)}}" ><button type="button" id="show-popup1" class="btn btn-warning"><i class="fa fa-file-pen"></i></button></a>
                            <a href="{{route('produit',$val->produit_id)}}" onclick="confirmation(event)"><button type="button" class="btn btn-danger"><i class="fa fa-trash-can"></i></button>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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



<script type="text/javascript">

    function confirmation(ev)
    {
        ev.preventDefault();

        var urlToRedirect = ev.currentTarget.getAttribute('href');
            
        console.log(urlToRedirect)

       const result = Swal.fire({
            
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
<script>
    $(document).ready(function(){
    // Show the div when the "Show Div" button is clicked
    $("#showBtn").click(function(){
        $("#myDiv").show();
    });

    // Hide the div when the "Hide Div" button is clicked
    $("#hideBtn").click(function(){
        $("#myDiv").hide();
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
</body>
</html>
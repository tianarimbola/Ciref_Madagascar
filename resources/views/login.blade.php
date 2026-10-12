<!doctype html>
<html lang="fr">
  <head>
  	<title>Connexion | CIREF</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- 
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet"> -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('css/login.css')}}">
    <link rel="stylesheet" href="{{ asset('css/professional.css') }}">
	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				
				<div class="col-md-7 col-lg-5">
				@if(session('error'))
				<div class="alert alert-warning auto-close">{{session('error')}}</div>
				@endif		
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Se connecter</h3>
				<form action="{{route('login')}}" class="login-form" method="POST">
				@csrf			
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" name="utilisateur_nom" placeholder="Nom d'utilisateur" required>
		      		</div>
                
	            <div class="form-group">
	              <input type="password" class="form-control rounded-left" name="utilisateur_password" placeholder="Mot de passe" required>
	            </div>
	            <div class="form-group d-md-flex">
							<div class="w-50">
								    <label class="checkbox-wrap checkbox-primary">administrateur
									<input
                                            type="radio"
                                           
                                            id="admin"
                                            name="role"
                                            value="administrateur"
                                        /> 
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50">
								<label class="checkbox-wrap checkbox-primary">utilisateur
								<input
                                            type="radio"

                                            name="role"
											id="user"
                                            value="utilisateur"
                                           
                                />
									  <span class="checkmark"></span>
									</label>
								</div>
	            </div>
				<div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Se connecter</button>
	            </div>
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<!-- <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script> -->
  <!-- <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->
  <script>
    // Sélectionnez l'élément avec la classe 'auto-close' et masquez-le après 5 secondes
    setTimeout(function() {
        var autoCloseElement = document.querySelector('.auto-close');
        if(autoCloseElement) {
            autoCloseElement.style.display = 'none';
        }
    }, 4000); // 5000 millisecondes = 5 secondes
</script>
<script>
    // Obtenez les références des cases à cocher
    var administrateur = document.getElementById("administrateur");
    var utilisateur = document.getElementById("utilisateur");

    // Ajoutez des écouteurs d'événements pour détecter les changements
    administrateur.addEventListener("change", function() {
      if (administrateur.checked) {
        utilisateur.style.display = "none";
      } else {
        utilisateur.style.display = "inline-block"; // ou utilisez "block" selon la mise en page souhaitée
      }
    });

    utilisateur.addEventListener("change", function() {
      if (utilisateur.checked) {
        administrateur.style.display = "none";
      } else {
        administrateur.style.display = "inline-block"; // ou utilisez "block" selon la mise en page souhaitée
      }
    });
  </script>
  <script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
  <script>
    $(document).ready(function () {
        $('input[type=radio][name=role]').change(function () {
            if (this.value === 'admin') {
                $('#user').prop('checked', false);
            } else if (this.value === 'user') {
                $('#admin').prop('checked', false);
            }
        });
    });
</script>
	</body>
</html>

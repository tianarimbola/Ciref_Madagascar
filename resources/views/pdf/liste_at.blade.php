<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/fiche.css')}}">
    <title>Fiche d'apurement</title>
</head>
<body>
        <header class=" text-center py-4">
        <img id="logo" src="{{asset('image/mada.PNG')}" alt="Logo de l'entreprise">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset('image/logo.PNG')}" alt="Logo de gauche" class="img-fluid mb-3">
                        <p class="mb-0 text-decoration-underline">SECRETARIAT GENERAL</p>
                        <p>DERECTION REGIONALE DE L'ENVIRONNEMENT ET DU DEVELOPPEMENT DURABLE</p>
                        <p class="mb-0 text-decoration-underline">ALAOTRA MANGORO</p>
                        <p>CIRCONSCRIPTION REGIONALE DE L'ENVIRONNEMENT ET DES FORETS</p>
                        <p class="mb-0 text-decoration-underline">MORAMANGA</p>
                    </div>
                    <div class="col-md-6 p-4 ">
                        <div class="">
                            <br><br>
                            <p>Moramanga le : [Insérer la date]</p>
                            <p>FICHE D'APUREMENT</p>
                            <p>(PRODUITS)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <section>
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <th>Titulaire du permis</th>
                        <th>N CONVENTION</th>
                        <th>CR</th>
                        <th colSpan=3 >Sortie</th>
                        <!-- <th>Colonne 5</th>
                        <th>Colonne 6</th> -->
                        <th>Reste</th>
                        <th>Visa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td rowSpan=2>{exploitant}</td>
                        <td>{numero}</td>
                        <td rowSpan=2>{Commune}</td>
                        <td>N LP</td>
                        <td>Date d'operation</td>
                        <td>Nombre</td>
                        <td>Data 8</td>
                        <td>{Date}</td>

                    </tr>
                    <tr>
                        <td></td>
                        <td>{Date}</td>
                        <td></td>
                        <td></td>
                        <td>Date</td>
                        <td></td>
                        <td>{initial}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2023-12-03</td>
                        <td>Description 3</td>
                        <td>200</td>
                        <td>Data 4</td>
                        <td>Data 5</td>
                        <td>Data 6</td>
                        <td>Data 7</td>
                        <td>Data 8</td>
                    </tr>
                    <!-- Ajouter plus de lignes si nécessaire -->
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    
    <title>Fiche d'apurement</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        header {
            text-align: center;
            /* height: 40px; */
            max-height: 10px;
            padding: 20px 0;
        }

        #logo {
            /* max-width: 100%; */
            max-width: 50%;
            height: auto;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <header>
        <img id="logo" src="image/mada.PNG" alt="Logo de l'entreprise">
        <div class="container">
        <div class="row">
            <div style="width: 50%; float: left;">
                <img src="image/logo.png" alt="Logo de gauche" style="max-width: 50%; height: auto; margin-bottom: 10px;">
                <p style="font-size: 14px;text-align:center;text-decoration:underline">SECRETARIAT GENERAL</p>
                <p style="font-size: 14px;text-align:start">DERECTION REGIONALE DE L'ENVIRONNEMENT ET DU DEVELOPPEMENT DURABLE</p>
                <p style="font-size: 14px;text-align:center;text-decoration:underline">ALAOTRA MANGORO</p>
                <p style="font-size: 14px;text-align:start">CIRCONSCRIPTION REGIONALE DE L'ENVIRONNEMENT ET DES FORETS</p>
                <p style="font-size: 14px;text-align:center;text-decoration:underline">MORAMANGA</p>
            </div>
            <div style="width: 50%; float: left; margin-top: 40px; padding-top: 40px; justify-content:start;">
                <p>Moramanga le : </p>
                <p>FICHE D'APUREMENT</p>
                @foreach($data as $key => $val)
                <p>(PRODUITS)</p>
                <div style="justify-content:start; float:right;text-align:start;">
                        <h5>Titulaire du Permis : {{$val->exploitant_nom}}</h5>
                        <h5>Numero AC : {{$val->numero}}</h5>
                        <h5>Commune: {{$val->commune}}</h5>   
                </div>
                @endforeach
            </div>
            <!-- <//div> -->
        </div>
    </header>
    <div style="clear: both;"></div>

<div style="margin: 20px auto; overflow-x: auto; width: 100%;">
    <!-- Table -->
    <table style="width:100%; border-collapse: collapse; border: 1px solid black;">
        <thead>
            <tr>
                <th style="border: 1px solid black;">Numero laissez passer</th>
                <th style="border: 1px solid black;">Date d'operation</th>
                <th style="border: 1px solid black;">Quantité</th>
                <th style="border: 1px solid black;">Reste</th>
     
            </tr>
        </thead>
        <tbody>
               
                @foreach($datat as $key => $val1)
                <tr>
                    <td style="border: 1px solid black;">{{$val1->num_laissez_passer}}</td>
                    <td style="border: 1px solid black;">{{$val1->date_transport1}}</td>
                    <td style="border: 1px solid black;">{{$val1->quantite_t}}</td>
                    <td style="border: 1px solid black;">{{$val1->reste}}</td>
                </tr>
                @endforeach
                <!-- Ajouter plus de lignes si nécessaire -->
            </tbody>
    </table>
</div>
</body>
</html>
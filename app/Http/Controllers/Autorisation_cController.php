<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use App\Http\Requests\Autorisation_cStore;
use App\Http\Requests\Autorisation_cEdit;
use Illuminate\Http\Request;
use App\Models\Autorisation_c; 
use App\Models\Autorisation_t;
use App\Models\Exploitant; 


class Autorisation_cController extends Controller
{
    public function index()
    {
      $data = DB::select("SELECT autorisation_c_id, exploitant_nom, numero, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id ");
    
      $data_dispo = DB::select("SELECT autorisation_c_id, exploitant_nom, numero, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration >= CURRENT_DATE");

      $data_expire = DB::select("SELECT autorisation_c_id, exploitant_nom, numero, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration < CURRENT_DATE");

      $produit = DB::select('SELECT  *FROM produit');

      return view('autorisation_c.autorisation_c',compact('data','produit','data_dispo','data_expire')); 
    }

    public function index1()
    {
      $data = DB::select("SELECT autorisation_c_id, exploitant_nom, numero, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id ");
    
      $data_dispo = DB::select("SELECT autorisation_c_id, exploitant_nom, numero, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration >= CURRENT_DATE");

      $data_expire = DB::select("SELECT autorisation_c_id, exploitant_nom, numero, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration < CURRENT_DATE");

      $produit = DB::select('SELECT  *FROM produit');

      return view('administrateur.autorisation_c.autorisation_c',compact('data','produit','data_dispo','data_expire')); 
    }

    public function store(Autorisation_cStore $request)
    {
            // $input = new Exploitant;
            $exploitant_nom = $request->input('exploitant_nom');
            $numero = $request->input('numero');
            $date_signature = $request->input('date_signature');
            $date_expiration = $request->input('date_expiration');
            $localisation_geo = $request->input('localisation_geo');       
            $surface = $request->input('surface');
            $commune = $request->input('commune');
            $quantite = $request->input('quantite');
            $produit_id = $request->input('produit_id');
          
            $exploitant = Exploitant::where('exploitant_nom', $exploitant_nom)->first();
            $autorisation = Autorisation_c::where('numero', $numero)->first();
            if ($exploitant) {
                $exploitant_id = $exploitant->id;
                  if ($autorisation){

                    return redirect()->back()->withError('le numero de compte existe deja');

                    }
                  else{

                   

                    DB::insert("INSERT INTO public.autorisation_c(
                      exploitant_id, numero, date_signature, date_expiration, localisation_geo, surface, commune, quantite, produit_id) 
                      VALUES (?,?,?,?,?,?,?,?,?)", [$exploitant_id, $numero,$date_signature, $date_expiration, $localisation_geo, $surface,$commune, $quantite, $produit_id]);
  
                       return redirect()->back()->withSuccess('autorisation de coupe ajouté avec succès');

                  }
            }
            else{

                return redirect()->back()->withError("Exploitant n'existe pas");

            }

            
    }

    public function delete($id)
    {
      $dataEdit = DB::delete("DELETE from public.autorisation_c where
      autorisation_c_id = $id");
      return redirect()->back()->withSuccess('suppression avec succès');
    }

    public function editPage($id)
    {
      $dataedit = DB::select("SELECT autorisation_c_id, numero, exploitant_nom, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite,autorisation_c.produit_id as pd
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id = autorisation_c.produit_id
      and autorisation_c_id = $id");

      $data = DB::select("SELECT autorisation_c_id, exploitant_nom, numero, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration >= CURRENT_DATE");
      $produit = DB::select('SELECT *FROM produit');
      return view('autorisation_c.autorisation_cEdit',compact('dataedit','data','produit'));
    }

    public function editPage1($id)
    {
      $dataedit = DB::select("SELECT autorisation_c_id, numero, exploitant_nom, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite,autorisation_c.produit_id as pd
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id = autorisation_c.produit_id
      and autorisation_c_id = $id");

      $data = DB::select("SELECT autorisation_c_id, exploitant_nom, numero, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration >= CURRENT_DATE");
      $produit = DB::select('SELECT *FROM produit');
      return view('administrateur.autorisation_c.autorisation_cEdit',compact('dataedit','data','produit'));
    }

    public function edit(Autorisation_cEdit $request)
    {
            $id = $request->input('id');
            $numero = $request->input('numero');
            $date_signature = $request->input('date_signature');
            $date_expiration = $request->input('date_expiration');
            $localisation_geo = $request->input('localisation_geo');
            $surface = $request->input('surface');
            $commune = $request->input('commune');
            $quantite = $request->input('quantite');
            $produit_id = $request->input('produit_id');

             DB::update("UPDATE public.autorisation_c
            SET  numero=?, date_signature= ?, date_expiration=?, localisation_geo=?, surface= ?, commune=?,quantite=?, produit_id= ?
            WHERE autorisation_c_id =?",[$numero, $date_signature, $date_expiration,  $localisation_geo, $surface, $commune, $quantite, $produit_id, $id ]);
            
            return redirect()->route('autorisation_c')->withSuccess('Modification reussie');
    }

    public function edit1(Autorisation_cEdit $request)
    {
            $id = $request->input('id');
            $numero = $request->input('numero');
            $date_signature = $request->input('date_signature');
            $date_expiration = $request->input('date_expiration');
            $localisation_geo = $request->input('localisation_geo');
            $surface = $request->input('surface');
            $commune = $request->input('commune');
            $quantite = $request->input('quantite');
            $produit_id = $request->input('produit_id');

             DB::update("UPDATE public.autorisation_c
            SET  numero=?, date_signature= ?, date_expiration=?, localisation_geo=?, surface= ?, commune=?,quantite=?, produit_id= ?
            WHERE autorisation_c_id =?",[$numero, $date_signature, $date_expiration,  $localisation_geo, $surface, $commune, $quantite, $produit_id, $id ]);
            
            return redirect()->route('administrateur.autorisation_c')->withSuccess('Modification reussie');
    }

    public function detailPage($id)
    {
      $data = DB::select("SELECT autorisation_c_id, numero, exploitant_nom, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id
      and autorisation_c_id = $id");

     

     

 
    //  session(['quantite' => $quantite]);
    //  $quantite = session('quantite');

      $datat = DB::select("SELECT numero, num_laissez_passer, TO_CHAR(date_transport, 'DD-MM-YYYY') as date_transport1, quantite_t, reste FROM autorisation_t
      where autorisation_c_id = $id ORDER BY date_transport1 ASC");
   
      return view('autorisation_c.autorisation_cDetail',compact('data','datat'));
    }
    public function detailPage1($id)
    {
      $data = DB::select("SELECT autorisation_c_id, numero, exploitant_nom, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
      TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
      FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id
      and autorisation_c_id = $id");

     

     

 
    //  session(['quantite' => $quantite]);
    //  $quantite = session('quantite');

      $datat = DB::select("SELECT numero, num_laissez_passer, TO_CHAR(date_transport, 'DD-MM-YYYY') as date_transport1, quantite_t, reste FROM autorisation_t
      where autorisation_c_id = $id ORDER BY date_transport1 ASC");
   
      return view('administrateur.autorisation_c.autorisation_cDetail',compact('data','datat'));
    }
    
}

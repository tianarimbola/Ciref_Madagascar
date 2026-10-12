<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use App\Models\Administrateur;
use Illuminate\Support\Facades\DB;

class UtilisateurController extends Controller
{
    public function login(Request $request)
    {
        $nom = $request->input('utilisateur_nom');
        $password = $request->input('utilisateur_password');
        $role = $request->input('role');
        if ($role == 'utilisateur'){
            $data= DB::select("SELECT *from public.utilisateur
                where utilisateur_nom=? and utilisateur_password=?", [$nom,$password]);
            
            if ($data){
                return redirect()->route('accueil'); 
            }
            else{
                return redirect()->back()->withError("not exist");
            }
        } 
       elseif ($role == 'administrateur'){
        $data= DB::select("SELECT *from public.administrateur
                where administrateur_nom=? and administrateur_password=?", [$nom,$password]);
            
            if ($data){
                return redirect()->route('admin.accueil'); 
            }
            else{
                return redirect()->back()->withError("not exist");
            }
       }
    }

    public function store(Request $request)
    {
        $nom = $request->input('utilisateur_nom');
        $password = $request->input('mdp');
       
        DB::insert("INSERT INTO public.utilisateur(
            utilisateur_nom, utilisateur_password) 
            VALUES (?,?)", [$nom,$password]);
        return redirect()->back()->withSuccess("produit ajoué avec succès");
    }

    public function index()
    {
        $data= DB::select("SELECT  *from utilisateur ");
        return view('administrateur.utilisateur.utilisateur',compact('data'));
    }
}

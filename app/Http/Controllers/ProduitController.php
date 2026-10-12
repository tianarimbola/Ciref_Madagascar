<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Http\Requests\ExploitantStore;
// use App\Http\Requests\ExploitantEdit;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function index()
    {
        $data= DB::select("SELECT  *from produit ");
        return view('produit.produit',compact('data'));
    }
    public function index1()
    {
        $data= DB::select("SELECT  *from produit ");
        return view('administrateur.produit.produit',compact('data'));
    }
    public function store(Request $request)
    {
        $produit_nom = $request->input('produit_nom');
        $unite = $request->input('produit_unite');

        DB::insert("INSERT INTO public.produit(
            produit_nom, unite) 
            VALUES (?,?)", [$produit_nom,$unite]);
        return redirect()->back()->withSuccess("produit ajoué avec succès");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Autorisation_tStore;
use App\Models\Autorisation_t; 
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Response;

class Autorisation_tController extends Controller
{
    public function store(Autorisation_tStore $request)
    {

            
            // $input = new Exploitant;
            $autorisation_c_id = $request->input('idc');
            $numero = $request->input('numero');
            $quantite = $request->input('quantite');
            $date_transport = $request->input('date_transport');
            $numero_at = $request->input('numero_at');
          
            $quantitei=DB::select("SELECT quantite FROM autorisation_c where 
            autorisation_c_id = $autorisation_c_id");
            $quantitei = $quantitei[0]->quantite;

            $sommeqte=DB::select("SELECT sum(quantite_t) as sommeqte from autorisation_t where autorisation_c_id=$autorisation_c_id");
            $sommeqte = $sommeqte[0]->sommeqte;
            $condition = $quantitei - ($quantite + $sommeqte);

            if($condition >= 0){
                DB::insert("INSERT INTO public.autorisation_t(
                    autorisation_c_id, quantite_t, num_laissez_passer, date_transport,numero,reste) 
                    VALUES (?,?,?,?,?,?)", [$autorisation_c_id,$quantite, $numero, $date_transport, $numero_at,$condition]);
                     return redirect()->back()->withSuccess('autorisation de transport ajouté avec succès');     
            }
            else{
                return redirect()->back()->withError('quantite insuffisante');
            }
            
    }

    private function generateJsPDF($view, $data)
    {
        // Get the rendered content of the view with the passed data
        $content = View::make($view, $data)->render();

        // Output the PDF
        return $content;
    }

    public function print($id) {

        $data = DB::select("SELECT autorisation_c_id, numero, exploitant_nom, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
        TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
        FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id
        and autorisation_c_id = $id");
  
        $datat = DB::select("SELECT numero, num_laissez_passer, TO_CHAR(date_transport, 'DD-MM-YYYY') as date_transport1, quantite_t, reste FROM autorisation_t
        where autorisation_c_id = $id ORDER BY date_transport1 ASC");
        $pdf = Pdf::loadView('pdf.index', compact('data', 'datat'))->setPaper('A4');

        // Set paper size and orientation
      

        return $pdf->download('document.pdf');
    
 }

 public function print1($id) {

    $data = DB::select("SELECT autorisation_c_id, numero, exploitant_nom, TO_CHAR(date_signature, 'DD-MM-YYYY') AS date_signature1,
    TO_CHAR(date_expiration, 'DD-MM-YYYY') AS date_expiration1, localisation_geo, surface, commune, quantite, produit_nom,unite
    FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id
    and autorisation_c_id = $id");

    $datat = DB::select("SELECT numero, num_laissez_passer, TO_CHAR(date_transport, 'DD-MM-YYYY') as date_transport1, quantite_t, reste FROM autorisation_t
    where autorisation_c_id = $id ORDER BY date_transport1 ASC");
    $pdf = Pdf::loadView('pdf.index', compact('data', 'datat'))->setPaper('A4');

    // Set paper size and orientation
  

    return $pdf->download('document.pdf');

}
}

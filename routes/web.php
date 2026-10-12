<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\ExploitantController;
use App\Http\Controllers\Autorisation_cController;
use App\Http\Controllers\Autorisation_tController;
use App\Http\Controllers\ProduitController;
use App\Models\Exploitant;
use App\Models\Autorisation_c;
use App\Models\Produit;
use App\Models\Utilisateur;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['allow-guest'])->group(function () {
Route::post('/login',[UtilisateurController::class,'login'])->name('login');
});

Route::get('/admin',function () { return view('administrateur/admin');})->name('exploitant');
Route::get('/', function () { return view('login');})->name('log');
Route::get('/i', function () { return view('pdf.index');})->name('i');

Route::get('/accueil', function () {
           $produits = DB::select("SELECT commune, sum(quantite_t) as totalq from public.autorisation_t, autorisation_c where autorisation_t.autorisation_c_id = autorisation_c.autorisation_c_id group by commune ");
           $totalE = DB::select("SELECT count(exploitant_nom) as total from public.exploitant");
           $totalC = DB::select("SELECT count(numero) as totalc from public.autorisation_c");
           $data_dispo = DB::select("SELECT count(numero) as total_dispo
            FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration >= CURRENT_DATE");
            $data_expire = DB::select("SELECT count(autorisation_c_id) as total_expire
            FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration < CURRENT_DATE");
            $data_transport= DB::select("SELECT count(autorisation_t_id) as total_transport FROM public.autorisation_t");
    return view('index',compact('produits','totalE','totalC','data_dispo','data_expire','data_transport'));
})->name('accueil');

Route::get('/admin_accueil', function () {
    $produits = DB::select("SELECT commune, sum(quantite_t) as totalq from public.autorisation_t, autorisation_c where autorisation_t.autorisation_c_id = autorisation_c.autorisation_c_id group by commune ");
    $totalE = DB::select("SELECT count(exploitant_nom) as total from public.exploitant");
    $totalC = DB::select("SELECT count(numero) as totalc from public.autorisation_c");
    $data_dispo = DB::select("SELECT count(numero) as total_dispo
     FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration >= CURRENT_DATE");
     $data_expire = DB::select("SELECT count(autorisation_c_id) as total_expire
     FROM exploitant, produit, autorisation_c where exploitant.id = autorisation_c.exploitant_id and produit.produit_id= autorisation_c.produit_id and date_expiration < CURRENT_DATE");
     $data_transport= DB::select("SELECT count(autorisation_t_id) as total_transport FROM public.autorisation_t");
return view('administrateur.index',compact('produits','totalE','totalC','data_dispo','data_expire','data_transport'));
})->name('admin.accueil');


Route::get('/utilisateur',[UtilisateurController::class,'index'])->name('utilisateur');
Route::post('/utilisateur_store',[UtilisateurController::class,'store'])->name('utilisateur.store');

Route::get('/exploitant_index_admin',[ExploitantController::class, 'index1'])->name('admin.exploitant');
Route::get('/exploitant_index',[ExploitantController::class, 'index'])->name('exploitant');
Route::post('/exploitant_store',[ExploitantController::class,'store'])->name('exploitant.store');
Route::get('/exploitant_delete/{id}',[ExploitantController::class,'delete'])->name('exploitant.delete');
Route::get('/exploitant_edit_page/{id}', [ExploitantController::class, 'editPage'])->name('exploitant.editPage');
Route::put('/exploitant_edit', [ExploitantController::class, 'edit'])->name('exploitant.edit');

Route::get('/autorisation_c_index_admin', [Autorisation_cController::class, 'index1'])->name('admin.autorisation_c');
Route::get('/autorisation_c_index', [Autorisation_cController::class, 'index'])->name('autorisation_c');
Route::post('/autorisation_c_store',[Autorisation_cController::class,'store'])->name('autorisation_c.store');
Route::get('/autorisation_c_delete/{id}',[Autorisation_cController::class,'delete'])->name('autorisation_c.delete');
Route::get('/autorisation_c_edit_page/{id}', [Autorisation_cController::class, 'editPage'])->name('autorisation_c.editPage');
Route::get('/admin_autorisation_c_edit_page/{id}', [Autorisation_cController::class, 'editPage1'])->name('admin.autorisation_c.editPage');
Route::put('/autorisation_c_edit', [Autorisation_cController::class, 'edit'])->name('autorisation_c.edita');
Route::put('/admin_autorisation_c_edit', [Autorisation_cController::class, 'edit1'])->name('admin.autorisation_c.edita');
Route::get('/autorisation_c_detail/{id}', [Autorisation_cController::class, 'detailPage'])->name('autorisation_c.detail');
Route::get('/admin_autorisation_c_detail/{id}', [Autorisation_cController::class, 'detailPage1'])->name('admin.autorisation_c.detail');

Route::post('/autorisation_t_store',[Autorisation_tController::class,'store'])->name('autorisation_t.store');
Route::get('/imprimer/{id}',[Autorisation_tController::class,'print'])->name('print_ac');
Route::get('/admin_imprimer/{id}',[Autorisation_tController::class,'print1'])->name('admin.print_ac');

Route::get('/produit_index_admin',[ProduitController::class, 'index1'])->name('admin.produit');
Route::get('/produit_index',[ProduitController::class, 'index'])->name('produit');
Route::post('/produit_store',[ProduitController::class, 'store'])->name('produit.store');


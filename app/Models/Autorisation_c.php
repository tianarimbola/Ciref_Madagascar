<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorisation_c extends Model
{
    use HasFactory;
    protected $table = 'autorisation_c';

    protected $fillable = [
        'exploitant_id',
        'numero',
        'date_signature',
        'date_expiration',
        'localisation_geo',
        'surface',
        'commune',
        'quantite',
        'produit_id'

    ];
}

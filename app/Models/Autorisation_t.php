<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorisation_t extends Model
{
    use HasFactory;

    protected $table = 'autorisation_c';

    protected $fillable = [
        'autorisation_t_id',
        'quantite_t',
        'num_laissez_passser',
        'date_transport',
        'numero',
        'reste',
    ];
}

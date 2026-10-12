<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class utilisateur extends Model
{
    use HasFactory;
    protected $table = 'utilisateur';

    protected $fillable = [
        'utilisateur_nom',
        'utilisateur_password'
    ];
}

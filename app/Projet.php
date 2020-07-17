<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        "titre", "contenu", "photo1", "photo2", "photo3", "photo4"
    ];
}

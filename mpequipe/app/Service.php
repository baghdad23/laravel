<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [
        "categorie", "description", "disponible", "perimetre", "user_id"
    ];
}

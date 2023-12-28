<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreInscription extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'date_debut',
        'date_fin',
        'statut'
    ];

    public function filiere (){
        return $this->belongsTo(Filiere::class);
    }
}

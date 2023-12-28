<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Filiere extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'libelle',
        'image',
        'description'
    ];


    public function preInscriptions()
    {
        return $this->hasMany(PreInscription::class);
    }

    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }
}

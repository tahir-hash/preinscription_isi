<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Niveau extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'libelle'
    ];

    public function sousNiveau()
    {
        return $this->hasMany(SousNiveau::class);
    }

    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }
}

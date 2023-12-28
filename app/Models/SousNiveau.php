<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SousNiveau extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'libelle'
    ];

    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }

    public function demandes(){
        return $this->hasMany(Demande::class);
    }
}

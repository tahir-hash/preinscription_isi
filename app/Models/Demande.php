<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'statut',
        'documents',
        "documents_name"
    ];

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class); 
    }

    public function sousNiveau()
    {
        return $this->belongsTo(SousNiveau::class); 
    }
}

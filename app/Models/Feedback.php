<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'message',
        'user_id'
    ];
    protected $table =  'feedbacks';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;

class Profile extends Model
{



    protected $fillable = [
    'user_id',
    'titre',
    'formation',
    'experiences',
    'competences',
    'photo',
    ];


    public function user(){
    return $this->belongsTo(User::class);
    }
}

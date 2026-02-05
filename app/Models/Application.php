<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['user_id','job_offer_id','statut'];

    public function user(){
    return $this->belongsTo(User::class);
    }

    public function job_offer(){
        return $this->belongsTo(job_offer::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job_offer extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function applicants(){
        return $this->belongsToMany(User::class,'application','user_id','job_offer_id')
        ->withPivot('statut')
        ->withTimestamps();
    }

    protected $fillable = [
        'titre',
        'description',
        'type_contrat',
        'entreprise',
        'image',
        'status'
    ];


}

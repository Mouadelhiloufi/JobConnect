<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job_offer;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function store(Job_offer $job_offer){
        $application=Application::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'job_offer_id' => $job_offer->id,
            ],
            [
                'statut' => 'en attente'
            ]
        );

    }
}

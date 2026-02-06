<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job_offer;

class Job_offerController extends Controller
{
    
public function store(Request $request){
    $validatedData = $request->validate([
        'titre' => 'required|string|max:255',
        'description' => 'required|string',
        'type_contrat' => 'required|in:CDI,CDD,Freelance',
        'entreprise' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    $path=null;
    if($request->hasFile('image')){
        $path=$request->file('image')->store('job_offers','public');
    }
/** @var \App\Models\User $user */
        $user = Auth::user();
    
    $user->Job_offers()->create([
        'titre' => $validatedData['titre'],
        'description' => $validatedData['description'],
        'type_contrat' => $validatedData['type_contrat'],
        'entreprise' => $validatedData['entreprise'],
        'image' => $path,
    ]);
    return redirect()->route('recruteur.dashboard');


}


public function myOffers()
{
    // On récupère uniquement les offres où user_id est l'ID de la personne connectée
    $offres = auth()->user()->job_offers()->latest()->get();

    return view('job_offers.my_offers', compact('offres'));
}

public function fermerOffre(Job_offer $job_offer)
{


    $job_offer->update(['status' => 'fermé']);
    
    return redirect()->route('job_offers.my_offers');
}

public function show_offers(){
        $offres=Job_offer::where('status','ouvert')->latest()->get();
        return view('chercheur.chercheur',compact('offres'));
}

public function show_detail(Job_offer $job_offer){
    return view('job_offers.show', compact('job_offer'));
}

public function page_postulation(){
    $offres=Job_offer::where('user_id',auth()->id())->with('applicants')->get();
    return view('recruteur.recruteur',compact('offres'));
}




}

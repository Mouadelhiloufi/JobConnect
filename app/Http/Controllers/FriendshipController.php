<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class FriendshipController extends Controller
{
    public function addFriend(User $friend)
    {
        $user = auth()->user();

        // Sécurité : pas soi-même et pas de doublon
        if ($user->id === $friend->id) return back();
        
        // On attache l'ami avec le statut 'en attente'
        $user->friends()->attach($friend->id, ['status' => 'en attente']);

        return back()->with('success', 'Demande envoyée !');
    }


    public function acceptFriend(User $friend)
    {
        $user = auth()->user();
        
        // On cherche la ligne où l'autre nous a ajouté et on change le statut
        $user->friendOf()->updateExistingPivot($friend->id, ['status' => 'accepté']);

        return back()->with('success', 'Vous êtes maintenant amis !');
    }

    public function rejectFriend(User $friend)
    {
        $user = auth()->user();
        // On supprime simplement la ligne dans la table pivot
        $user->friendOf()->detach($friend->id);
        
        return back()->with('info', 'Demande refusée.');
    }


}

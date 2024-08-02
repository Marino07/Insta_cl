<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    public function store(User $user){
        auth()->user()->following()->toggle($user->profile);
    }
    public function status(User $user)
    {
        /*
        $userId = auth()->id(); // ID trenutnog prijavljenog korisnika

        if (!$userId) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Provjera postoji li veza praćenja
        $follows = auth()->user()->following()->where('profile_id', $user->id)->exists();

        return response()->json(['follows' => $follows]);
        */
        $follows = '';
        return response()->json(['follows' => $follows]);

    }


}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::findOrFail($user);


        return view('profiles.index', [
            'user' => $user
        ]);

    }

    public function dashboard()
    {
        // Preuzmi trenutno prijavljenog korisnika
        $user = Auth::user();

        return view('profiles.index', [
            'user' => $user
        ]);
    }

}


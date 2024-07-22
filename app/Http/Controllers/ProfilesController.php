<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $user = User::find($user);

        if (!$user) {
            abort(404, 'User not found');
        }

        return view('dashboard', [
            'user' => $user
        ]);

    }

    public function dashboard()
    {
        // Preuzmi trenutno prijavljenog korisnika
        $user = Auth::user();

        return view('dashboard', [
            'user' => $user
        ]);
    }

}


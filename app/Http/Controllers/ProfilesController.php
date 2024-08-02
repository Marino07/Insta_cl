<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;

class ProfilesController extends Controller
{
    public function index( \App\Models\User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        //dd($follows);
       // \App\Models\User ili $user = User::findOrFail($user);
        return view('profiles.index', compact('user','follows'));

    }

    public function dashboard()
    {
        // Preuzmi trenutno prijavljenog korisnika
        $user = Auth::user();
        return view('welcome', [
            'user' => $user
        ]);
    }
    public function edit(\App\Models\User $user){
        //$user = User::findOrFail($user); OR IN PARAM NAMESPACE


        return view('profiles.edit', [
            'user' => $user // OR USE compact($user)
        ]);

    }
    public function update(\App\Models\User $user){
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
            'image' => ''
        ]);

        //auth()->

        if(request('image')){
            $imagePath = request()->file('image')->store('profile', 'public');

            $image = ImageManager::imagick()->read("storage/{$imagePath}");
            $image->resize(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];

        }
        $user->profile()->update(array_merge(
            $data,
            $imageArray ?? [],
        ));


        return redirect("/profile/{$user->id}"); // php {} blade {{}}




    }

}


<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostsController extends Controller
{

    public function create(){
        return view('posts.create');
    }
    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = (request('image')->store('uploads','public'));


        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }
}

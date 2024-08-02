<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;

use Intervention\Image\Laravel\Facades\Image;

class PostsController extends Controller
{
    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->orderBy('created_at','DESC')->get();
        return view('posts.index',compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'caption' => 'required',
            'image' => 'required|image'
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        $image = ImageManager::imagick()->read("storage/{$imagePath}");
        $image->resize(1200, 800);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Models\Post $post){

        return view('posts.show',[
            'post' => $post // or instead ['post0 => $post ] use compact($post)
        ]);
    }

}

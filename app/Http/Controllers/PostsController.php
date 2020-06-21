<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profils.user_id');

        $posts = Post::whereIn('user_id', $users)->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $data = request()->validate([
            'legende' => 'required',
            'description' => 'required',
            'image' => ['required', 'image']
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'legende' => $data['legende'],
            'description' => $data['description'],
            'image' => $imagePath,
        ]);

        return redirect('/profil/' .auth()->user()->id);
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(User $user) {
        $this->authorize('update', $user->post);
        return view('posts.edit', compact('post'));
    }

    // public function update(User $user)
    // {
    //     $this->authorize('update', $user->post);
    //     $data = request()->validate([
    //         'legende' => 'required',
    //         'description' => 'required',
    //         'image' => ['required', 'image']
    //     ]);

    //     if (request('image')) {
    //         $imagePath = request('image')->store('post', 'public');

    //         $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
    //         $image->save();

    //         $imageArray = ['image' => $imagePath];
    //     }

    //     auth()->user()->post->update(array_merge(
    //         $data,
    //         $imageArray ?? []        
    //     ));        
    //     return redirect('/profil/' .auth()->user()->id);
    // }

    public function destroy(Post $post)
    {
        $post->delete();
        
        return redirect('/profil/' .auth()->user()->id);
    }
}

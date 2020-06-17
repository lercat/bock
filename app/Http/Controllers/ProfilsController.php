<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilsController extends Controller
{
    public function index(User $user)
    {
        return view('profils.index', compact('user'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profil); //rajout ds policy et ici

        return view('profils.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profil);
        
        $data = request()->validate([
            'title' => 'required',
            'presentation' => 'required',
            'url' => 'url', //à essayer  'sometimes|required|url'
            'image' => ''
        ]);


        if(request('image')) {
            $imagePath = request('image')->store('profil', 'public');

            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }
        
        auth()->user()->profil->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return back;
    }
}

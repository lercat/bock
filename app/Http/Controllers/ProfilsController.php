<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

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

        auth()->user()->profil->update($data);

        return redirect("/profil/{$user->id}");
    }
}

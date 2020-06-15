<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $guarded = [];

    // public function scopeStatus($query)
    // {
    //     return $query->where('status', 1)->get();
    // }
    public function profilImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profil/FBftYWupSsVbLmd1BdNSjcT7sfeIItRrMiqR2FBj.png';
        return '/storage/' . $imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

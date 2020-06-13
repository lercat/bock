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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

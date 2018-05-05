<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $fillable = [
      'phone_number', 'address', 'about', 'facebook', 'twitter'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

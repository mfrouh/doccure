<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }
    public function surgeries()
    {
        return $this->hasMany('App\Models\Surgery');
    }
    public function prescription()
    {
        return $this->hasMany('App\Models\Prescription');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function favourites()
    {
        return $this->hasMany('App\Models\Favourites');
    }

}

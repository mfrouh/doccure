<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function patients()
    {
        return $this->hasMany('App\Models\Patient');
    }

    public function surgeries()
    {
        return $this->hasMany('App\Models\Surgery');
    }

    public function prescriptions()
    {
        return $this->hasMany('App\Models\Prescription');
    }

    public function appointments()
    {
        return $this->hasMany('App\Models\Appointment');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function rates()
    {
        return $this->hasMany('App\Models\Rate');
    }

    public function favourites()
    {
        return $this->hasMany('App\Models\Favourites');
    }

    public function gallery()
    {
        return $this->morphMany('App\Models\Image','imageable');
    }



}

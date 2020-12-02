<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourites extends Model
{
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
}

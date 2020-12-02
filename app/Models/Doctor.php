<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function clinic()
    {
        return $this->hasOne('App\Models\Clinic');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function speciality()
    {
        return $this->belongsTo('App\Models\speciality');
    }
    public function social()
    {
        return $this->hasOne('App\Models\Social');
    }
    public function educations()
    {
        return $this->hasMany('App\Models\Education');
    }
    public function services()
    {
        return $this->hasMany('App\Models\Services');
    }
    public function experiences()
    {
        return $this->hasMany('App\Models\Experience');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id', 'latitude', 'longitude',
   ];

   public function clinic()
   {
       return $this->belongsTo('App\Models\Clinic');
   }
}

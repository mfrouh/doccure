<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    use HasFactory;
    public function appointment()
    {
        return $this->belongsTo('App\Models\Appointment');
    }
    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
}

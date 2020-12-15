<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    use HasFactory;
    protected $appends=[
        'patientimg','patientname','patientusername'
    ];
    public function appointment()
    {
        return $this->belongsTo('App\Models\Appointment');
    }
    public function getPatientimgAttribute()
    {
        return  asset($this->appointment->patient->user->image);
    }
    public function getPatientnameAttribute()
    {
        return $this->appointment->patient->user->name;
    }
    public function getPatientusernameAttribute()
    {
        return $this->appointment->patient->user->username;
    }

}

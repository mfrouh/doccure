<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'clinic_id',
        'day',
        'booking_day',
        'time',
        'booking_time',
        'id'
    ];
    protected $appends=[
        'patientimg','patientname'
    ];
    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }
    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic');
    }
    public function followups()
    {
        return $this->hasMany('App\Models\FollowUp');
    }
    public function prescription()
    {
        return $this->morphOne('App\Models\Prescription','prescriptionable');
    }
    public function surgeries()
    {
        return $this->morphMany('App\Models\Surgery','surgeryable');
    }

    public function getPatientimgAttribute()
    {
        return  asset($this->patient->user->image);
    }
    public function getPatientnameAttribute()
    {
        return $this->patient->user->name;
    }

}

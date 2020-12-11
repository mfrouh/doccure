<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;
    protected $fillable = [
        'clinic_id','patient_id','appointment_id'
     ];
    protected $appends=['patientname','patientimage'];
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
    public function getPatientimageAttribute()
    {
        return  asset($this->patient->user->image);
    }
    public function getPatientnameAttribute()
    {
        return $this->patient->user->name;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $fillable = [
       'clinic_id','patient_id','appointment_id',
    ];

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
    public function prescriptioncontent()
    {
        return $this->hasMany('App\Models\PrescriptionContent');
    }

}

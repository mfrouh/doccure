<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surgery extends Model
{
    use HasFactory;
    protected $fillable = [
        'clinic_id','patient_id','surgeryable_id','surgeryable_type',
     ];
    public function surgeryable()
    {
      return $this->morphTo();
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

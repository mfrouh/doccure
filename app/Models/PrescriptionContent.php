<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionContent extends Model
{
    use HasFactory;

    public function prescription()
    {
        return $this->belongsTo('App\Models\Prescription');
    }
}

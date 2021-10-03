<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class appointments extends Model
{
    protected $table="appointments";
    protected $fillable=['app_from','app_to','doctor_id'];
}

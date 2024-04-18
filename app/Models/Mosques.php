<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mosques extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'fajr_time',
        'dhuhr_time',
        'asr_time',
        'maghrib_time',
        'isha_time',
        'jummah_time',
        'user_id',
    ];


}

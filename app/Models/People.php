<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        'people_dni',
        'people_fname',
        'people_sname',
        'people_fsurname',
        'people_ssurname',
        'people_birth_at',
        'people_phone',
        'people_address',
        'people_email',
        'people_age',
    ];
}

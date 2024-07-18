<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_staff_profile extends Model
{
    use HasFactory;

    protected $table = 't_staff_profiles';
   

    protected $fillable = [
        'name',
        'designation',
        'description',
        'profile_image',
         'skills'
       
    ];
}

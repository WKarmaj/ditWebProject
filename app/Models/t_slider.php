<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_slider extends Model
{
    use HasFactory;

     protected $table = 't_sliders';
   

    protected $fillable = [
        'name',
        'description',
        'images',
    ];
}

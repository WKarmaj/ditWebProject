<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_about_us extends Model
{
    use HasFactory;

    protected $table = 't_about_us';

    protected $fillable = [
        'main_points',
        'description',
        'image',
    ];
}

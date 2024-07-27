<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_focus_area extends Model
{
    use HasFactory;

    protected $table = 't_focus_areas';

    protected $fillable = [
        'title',
        'image',
        'key_points'
    ];

    protected $casts = [
        'key_points' => 'array'
    ];
}

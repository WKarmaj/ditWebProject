<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_mission extends Model
{
    use HasFactory;
    protected $table = 't_missions';
    protected $fillable = ['keywords', 'description', 'images'];
}

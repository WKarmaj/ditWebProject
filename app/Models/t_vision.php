<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_vision extends Model
{
    use HasFactory;

    protected $table = 't_visions';
    protected $fillable = ['text', 'images'];
}

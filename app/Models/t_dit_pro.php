<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_dit_pro extends Model
{
    use HasFactory;

    protected $table = 't_dit_pros';
   

    protected $fillable = [
        'name',
        'total_students',
    ];
}

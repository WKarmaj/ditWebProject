<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_csn extends Model
{
    use HasFactory;

    protected $table = 't_csns'; // Your table name
    protected $fillable = ['title', 'authors', 'description', 'files'];

    protected $casts = [
        'files' => 'array',
    ];
}

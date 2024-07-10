<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_project_research extends Model
{
    use HasFactory;

    protected $table = 't_project_researches';
   

    protected $fillable = [
        'title',
        'authors',
        'description',
        
       
    ];
}

<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_staff_profile;

class HomeController extends Controller
{
    public function index()
    {
        $staff = t_staff_profile::all();
        return view('welcome',compact('staff'));
    }
    public function aboutUs()
    {
        
        return view('aboutus');
    }
}

<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_staff_profile;
use App\Models\t_slider;

class HomeController extends Controller
{
    public function index()
    {
        $staff = t_staff_profile::all();
        $slider = t_slider::all();
        return view('welcome',compact('staff','slider'));
    }
    public function aboutUs()
    {
        
        return view('aboutus');
    }
}

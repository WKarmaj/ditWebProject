<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_staff_profile;
use App\Models\t_slider;
use App\Models\t_vision;
use App\Models\t_mission;
use App\Models\t_event;

class HomeController extends Controller
{
    public function index()
    {
        $staff = t_staff_profile::all();
        $slider = t_slider::all();
        $events = t_event::orderBy('date','desc')->get();
        return view('welcome',compact('staff','slider','events'));
    }
    public function aboutUs()
    {

        $data = t_vision::all();
        $missions = t_mission::all();
        return view('aboutus',compact('data','missions'));
    }
    public function show($id)
    {   
        if ($id) {
            $event = t_event::find($id);
        } else {
            $event = t_event::latest()->first();
        }
    
        $recentEvents = t_event::latest()->take(5)->get();
    
        return view('blog_details', compact('event', 'recentEvents'));
    }

    public function viewFaculty()
    {
        return view('faculty.about_faculty');
    }
    
}

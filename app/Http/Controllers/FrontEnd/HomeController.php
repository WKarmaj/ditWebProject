<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\t_staff_profile;
use App\Models\t_slider;
use App\Models\t_vision;
use App\Models\t_mission;
use App\Models\t_event;
use App\Models\t_project_research;
use App\Models\t_socialmedia;
use App\Models\t_csn_descript;


class HomeController extends Controller
{
    public function index()
    {
        $staff = t_staff_profile::all();
        $slider = t_slider::all();
        $socialMediaLinks = t_socialmedia::all();
        $events = t_event::orderBy('date','desc')->get();
        return view('welcome',compact('staff','slider','events','socialMediaLinks'));
    }
    public function aboutUs()
    {

        $data = t_vision::all();
        $missions = t_mission::all();
        $socialMediaLinks = t_socialmedia::all();
        return view('aboutus',compact('data','missions','socialMediaLinks'));
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
        $hodStaff = t_staff_profile::where('role', 'HoD')->get();
        $facultyStaff = t_staff_profile::where('role', 'Faculty')->get();
        $socialMediaLinks = t_socialmedia::all();
        return view('faculty.about_faculty',compact('hodStaff','facultyStaff','socialMediaLinks'));
    }
    public function getEvent()
    {
        $events = t_event::orderBy('date', 'desc')->get()->map(function ($event) {
            $event->description = Str::words($event->description, 15);
            return $event;
        });

        $recentEvents = t_event::orderBy('date', 'desc')->take(7)->get();
        $socialMediaLinks = t_socialmedia::all();

        return view('event_grid', compact('events','recentEvents','socialMediaLinks'));
    }
    public function viewProjectStaff()
    {
        $projects = t_project_research::all();
        $socialMediaLinks = t_socialmedia::all();
        return view('faculty.project_research',compact('projects','socialMediaLinks'));
    }
    public function viewCSN()
    {
        $programmes = t_csn_descript::all();
        return view('dcsn.csn',compact('programmes'));
    }
}

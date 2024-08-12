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
use App\Models\t_focus_area;
use App\Models\t_dit_pro;
use App\Models\t_about_us;
use App\Models\t_dmaprogramme;
use App\Models\t_csn;


class HomeController extends Controller
{
    public function index()
    {
        $staff = t_staff_profile::all();
        $slider = t_slider::all();
        $socialMediaLinks = t_socialmedia::all();
        $aboutUs = t_about_us::first();
        $events = t_event::orderBy('date','desc')->get();

        $studentCount = t_dit_pro::sum('total_students');
        $projectCount = t_project_research::count();
        $staffCount = t_staff_profile::count();

        return view('welcome',compact('staff','slider','events','socialMediaLinks','studentCount', 'projectCount', 'staffCount','aboutUs'));
    }
    public function aboutUs()
    {

        $data = t_vision::all();
        $missions = t_mission::all();
        $aboutUs = t_about_us::first();
        $socialMediaLinks = t_socialmedia::all();
        $staffCount = t_staff_profile::count();
        $studentCount = t_dit_pro::sum('total_students');
        return view('aboutus',compact('data','missions','socialMediaLinks','aboutUs','staffCount','studentCount'));
    }
    public function show($id)
    {   
        if ($id) {
            $event = t_event::find($id);
        } else {
            $event = t_event::latest()->first();
        }
    
        $recentEvents = t_event::latest()->take(5)->get();
        $socialMediaLinks = t_socialmedia::all();
    
        return view('blog_details', compact('event', 'recentEvents','socialMediaLinks'));
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
        $programmes = t_csn_descript::first();
        $socialMediaLinks = t_socialmedia::all();
        return view('dcsn.csn',compact('programmes','socialMediaLinks'));
    }
    public function viewDMA()
    {
        $programmes = t_dmaprogramme::first();
        $socialMediaLinks = t_socialmedia::all();
        return view('DMA.dma',compact('socialMediaLinks','programmes'));
    }
    public function viewProjectCSN()
    {
        $csnproject = t_csn::all();
        $socialMediaLinks = t_socialmedia::all();
        return view('dcsn.csn_project',compact('csnproject','socialMediaLinks'));  
    }
}

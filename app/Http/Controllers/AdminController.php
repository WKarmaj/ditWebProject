<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewStaffPage()
    {
        return view('admin.staff_profile');
    }
}

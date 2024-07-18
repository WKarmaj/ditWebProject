<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_staff_profile;


class StaffController extends Controller
{
    public function viewStaffPage()
    {
        $staffs = t_staff_profile::all();
        return view('admin.staff_profile', compact('staffs'));
    }

    public function add_staff(Request $request)
    {
        $validatedData = $request->validate([
            'staffName' => 'required',
            'staffDesignation' => 'required',
            'staffDescription' => 'required',
            'staffPhoto' => 'required|image',
            'skills.*.name' => 'required_with:skills.*.image',
            'skills.*.image' => 'required_with:skills.*.name|image',
        ]);

        $staff = new t_staff_profile();
        $staff->name = $validatedData['staffName'];
        $staff->designation = $validatedData['staffDesignation'];
        $staff->description = $validatedData['staffDescription'];

        if ($request->hasFile('staffPhoto')) {
            $imagePath = $request->file('staffPhoto')->store('staff_photos', 'public');
            $staff->profile_image = $imagePath;
        }

        // Handle skills
        $skills = [];
        if ($request->has('skills')) {
            foreach ($request->skills as $skill) {
                $skillImage = $skill['image']->store('skills', 'public');
                $skills[] = [
                    'name' => $skill['name'],
                    'image' => $skillImage,
                ];
            }
        }
        $staff->skills = $skills;

        $staff->save();

        return redirect()->back()->with('message', ['Staff added successfully!', 'success']);
    }

    public function update(Request $request)
    {
        $staff = t_staff_profile::find($request->staffId);

        if ($staff) {
            $validatedData = $request->validate([
                'staffName' => 'required',
                'staffDesignation' => 'required',
                'staffDescription' => 'required',
                'staffPhoto' => 'image',
                'skills.*.name' => 'required_with:skills.*.image',
                'skills.*.image' => 'required_with:skills.*.name|image',
            ]);

            $staff->name = $validatedData['staffName'];
            $staff->designation = $validatedData['staffDesignation'];
            $staff->description = $validatedData['staffDescription'];

            if ($request->hasFile('staffPhoto')) {
                $path = $request->file('staffPhoto')->store('staff_photos', 'public');
                $staff->profile_image = $path;
            }

            // Handle skills
            $skills = [];
            if ($request->has('skills')) {
                foreach ($request->skills as $skill) {
                    $skillImage = $skill['image']->store('skills', 'public');
                    $skills[] = [
                        'name' => $skill['name'],
                        'image' => $skillImage,
                    ];
                }
            }
            $staff->skills = $skills;

            $staff->save();

            return redirect()->back()->with('message', ['Staff updated successfully!', 'success']);
        }

        return redirect()->back()->with('message', ['Staff not found!', 'danger']);
    }
    public function destroy($id)
    {
        $staff = t_staff_profile::find($id);
        if ($staff) {
            $staff->delete();
            return response()->json(['success' => true, 'message' => 'Staff deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Staff not found!']);
        }
    }
    
}

<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_about_us;

class AboutusController extends Controller
{
    public function viewAboutus()
    {
        $aboutUs = t_about_us::all();
        return view('admin.aboutus',compact('aboutUs'));
        
    }
    public function store(Request $request)
    {
        $request->validate([
            'mainPoints' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutUs = new t_about_us();
        $aboutUs->main_points = $request->mainPoints;
        $aboutUs->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('about_us_images', 'public');
            $aboutUs->image = $imagePath;
           
        }

        
        $aboutUs->save();

        return redirect()->back()->with('message', ['Data added successfully!', 'success']);
    }

    public function update(Request $request)
    {
        $request->validate([
            'mainPoints' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $aboutUs = t_about_us::find($request->aboutUsId);
        $aboutUs->main_points = $request->mainPoints;
        $aboutUs->description = $request->description;

        if ($request->hasFile('image')) {
            // Delete old image
            if ($aboutUs->image) {
                \Storage::disk('public')->delete($aboutUs->image);
            }
            $imagePath = $request->file('image')->store('about_us_images', 'public');
            $aboutUs->image = $imagePath;
        }

        $aboutUs->save();

        return redirect()->back()->with('message', ['Data updated successfully!', 'success']);
    }

    public function destroy($id)
    {
        $aboutUs = t_about_us::find($id);

        // Delete image from storage
        if ($aboutUs->image) {
            \Storage::disk('public')->delete($aboutUs->image);
        }

        $aboutUs->delete();

        return response()->json(['success' => true, 'message' => 'About Us entry deleted successfully!']);
    }
}

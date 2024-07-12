<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_slider;

class SliderController extends Controller
{
    public function viewSliderPage()
    {
        $sliders = t_slider::orderBy('created_at', 'desc')->get(); // Fetch sliders ordered by created_at descending
        
        return view('admin.home_slider', compact('sliders'));
    }

    public function saveSlider(Request $request)
    {
        $request->validate([
            'sliderName' => 'required',
            'sliderDescription' => 'required',
            'sliderImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate each image file
        ]);

        $slider = new t_slider();
        $slider->name = $request->input('sliderName');
        $slider->description = $request->input('sliderDescription');
        
        if ($request->hasFile('sliderImages')) {
            $images = [];
            foreach ($request->file('sliderImages') as $image) {
                $imageName = $image->store('sliders', 'public'); // Store image in storage/app/public/sliders directory
                $images[] = $imageName;
            }
            $slider->images = json_encode($images); // Store images as JSON string
        }

        $slider->save();

        return redirect()->back()->with([
            'message' => ['Slider saved successfully!', 'success']
        ]);
    }
    public function updateSlider(Request $request)
    {
        
        $validated = $request->validate([
            'sliderId' => 'required|integer',
            'sliderName' => 'required|string|max:255',
            'sliderDescription' => 'nullable|string',
            'sliderImages.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Find the slider by ID
        $slider = t_slider::findOrFail($validated['sliderId']);

        // Handle file uploads and update data
        $imagePaths = json_decode($slider->images, true) ?? [];

        if ($request->hasFile('sliderImages')) {
            foreach ($request->file('sliderImages') as $image) {
                $imagePath = $image->store('sliders', 'public');
                $imagePaths[] = $imagePath;
            }
            // Delete old images if exists
            foreach (json_decode($slider->images, true) as $oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
        }

        $slider->name = $validated['sliderName'];
        $slider->description = $validated['sliderDescription'];
        $slider->images = json_encode($imagePaths);
        $slider->save();

        return redirect()->back()->with('message', ['Slider updated successfully.', 'success']);
    }

    public function deleteSlider($id)
    {
        $slider = t_slider::findOrFail($id);
        
        // Delete images from storage before deleting slider
        $images = json_decode($slider->images, true);
        foreach ($images as $image) {
            \Storage::disk('public')->delete($image);
        }

        $slider->delete();

        return response()->json(['success' => true, 'message' => 'Slider deleted successfully']);
    }
}

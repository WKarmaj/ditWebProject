<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_event;

class EventController extends Controller
{
    public function viewEventPage()
    {   
        $events = t_event::orderBy('date','desc')->get();
        return view('admin.event_dashboard', compact('events'));
    }

    public function saveEvent(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'eventTitle' => 'required|string|max:255',
        'eventDescription' => 'required|string',
        'eventImages.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'eventDate' => 'required|date',
    ]);

    // Handle multiple image upload
    $imagePaths = [];
    if ($request->hasFile('eventImages')) {
        foreach ($request->file('eventImages') as $image) {
            $imagePath = $image->store('events', 'public');
            $imagePaths[] = $imagePath;
        }
    }

    // Create a new event instance
    $event = new t_event();
    $event->title = $validatedData['eventTitle'];
    $event->description = $validatedData['eventDescription'];
    $event->images = json_encode($imagePaths); // Store image paths as JSON array
    $event->date = $validatedData['eventDate'];
    $event->save();

    // Redirect back with success message
    return redirect()->back()->with('message', ['Event saved successfully.', 'success']);
}

public function updateEvent(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'eventTitle' => 'required|string|max:255',
        'eventDescription' => 'required|string',
        'eventImages.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'eventDate' => 'required|date',
    ]);

    $event = t_event::find($request->eventId);

    if ($event) {
        // Handle multiple image upload if provided
        $imagePaths = [];
        if ($request->hasFile('eventImages')) {
            foreach ($request->file('eventImages') as $image) {
                $imagePath = $image->store('events', 'public');
                $imagePaths[] = $imagePath;
            }
            // Delete old images if exists
            foreach (json_decode($event->images, true) as $oldImage) {
                \Storage::disk('public')->delete($oldImage);
            }
            $event->images = json_encode($imagePaths);
        }

        $event->title = $validatedData['eventTitle'];
        $event->description = $validatedData['eventDescription'];
        $event->date = $validatedData['eventDate'];
        $event->save();

        return redirect()->back()->with('message', ['Event updated successfully!', 'success']);
    }
    return redirect()->back()->with('message', ['Event not found!', 'danger']);
}

    public function deleteEvent($id)
    {
        // Find the event
        $event = t_event::find($id);

        if ($event) {
            // Delete associated image from storage
            if ($event->image) {
                \Storage::disk('public')->delete($event->image);
            }

            // Delete the event
            $event->delete();
            return response()->json(['success' => true, 'message' => 'Event deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Event not found!']);
        }
    }
}

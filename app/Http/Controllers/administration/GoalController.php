<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_vision;
use App\Models\t_mission;

class GoalController extends Controller
{
    public function viewGoalPage()
    {
        $visions = t_vision::all();
        $missions = t_mission::all();
        return view('admin.view_goals',compact('visions','missions'));
    }
    public function saveVision(Request $request)
    {
        $request->validate([
            'visionText' => 'required',
            'visionImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $vision = new t_vision();
        $vision->text = $request->input('visionText');

        if ($request->hasFile('visionImages')) {
            $images = [];
            foreach ($request->file('visionImages') as $image) {
                $imageName = $image->store('visions', 'public');
                $images[] = $imageName;
            }
            $vision->images = json_encode($images);
        }

        $vision->save();

        return redirect()->back()->with([
            'message' => ['Vision saved successfully!', 'success']
        ]);
    }

    public function updateVision(Request $request)
    {
        $request->validate([
            'visionText' => 'required',
            'visionImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $vision = t_vision::find($request->input('visionId'));
        $vision->text = $request->input('visionText');

        if ($request->hasFile('visionImages')) {
            $images = [];
            foreach ($request->file('visionImages') as $image) {
                $imageName = $image->store('visions', 'public');
                $images[] = $imageName;
            }
            $vision->images = json_encode($images);
        }

        $vision->save();

        return redirect()->back()->with([
            'message' => ['Vision updated successfully!', 'success']
        ]);
    }

    public function deleteVision(Request $request)
    {
        t_vision::destroy($request->input('id'));
        return response()->json(['message' => 'Vision deleted successfully!']);
    }

    public function saveMission(Request $request)
    {
        $request->validate([
            'missionKeywords' => 'required',
            'missionDescription' => 'required',
            'missionImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $mission = new t_mission();
        $mission->keywords = $request->input('missionKeywords');
        $mission->description = $request->input('missionDescription');

        if ($request->hasFile('missionImages')) {
            $images = [];
            foreach ($request->file('missionImages') as $image) {
                $imageName = $image->store('missions', 'public');
                $images[] = $imageName;
            }
            $mission->images = json_encode($images);
        }

        $mission->save();

        return redirect()->back()->with([
            'message' => ['Mission saved successfully!', 'success']
        ]);
    }

    public function updateMission(Request $request)
    {
        $request->validate([
            'missionKeywords' => 'required',
            'missionDescription' => 'required',
            'missionImages.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $mission = t_mission::find($request->input('missionId'));
        $mission->keywords = $request->input('missionKeywords');
        $mission->description = $request->input('missionDescription');

        if ($request->hasFile('missionImages')) {
            $images = [];
            foreach ($request->file('missionImages') as $image) {
                $imageName = $image->store('missions', 'public');
                $images[] = $imageName;
            }
            $mission->images = json_encode($images);
        }

        $mission->save();

        return redirect()->back()->with([
            'message' => ['Mission updated successfully!', 'success']
        ]);
    }

    public function deleteMission(Request $request)
    {
        t_mission::destroy($request->input('id'));
        return response()->json(['message' => 'Mission deleted successfully!']);
    }
}

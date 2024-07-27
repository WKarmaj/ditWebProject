<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_socialmedia;
use App\Models\t_dit_pro;
class SocialMediaController extends Controller
{
    public function save(Request $request)
    {
        $request->validate([
            'socialMediaType' => 'required|string|max:255',
            'socialMediaLink' => 'required|url',
        ]);


        t_socialmedia::create([
            'type' => $request->input('socialMediaType'),
            'link' => $request->input('socialMediaLink'),
        ]);

        return redirect()->back()->with('message', ['Social media link added successfully!','success']);
    }

    public function update(Request $request)
    {
        $request->validate([
            'socialMediaId' => 'required|integer',
            'socialMediaType' => 'required|string|max:255',
            'socialMediaLink' => 'required|url',
        ]);

        $link = t_socialmedia::findOrFail($request->input('socialMediaId'));
        $link->type = $request->input('socialMediaType');
        $link->link = $request->input('socialMediaLink');
        $link->save();

        return redirect()->back()->with('message', ['Social media link updated successfully!','success']);
    }

    public function delete($id)
    {
        $link = t_socialmedia::findOrFail($id);
        $link->delete();

        return response()->json(['success' => true, 'message' => 'Social media link deleted successfully']);
    }
    public function storeProgramme(Request $request)
    {
        $programme = new t_dit_pro();
        $programme->name = $request->programmeName;
        $programme->total_students = $request->totalStudents;
        $programme->save();

        return redirect()->back()->with('message', ['Data added successfully!', 'success']);
    }

    public function updateProgramme(Request $request)
    {   

        $programme = t_dit_pro::find($request->programmeId);
        if($programme){
            $validatedData = $request->validate([
                'programmeName' => 'required',
                'totalStudents' => 'required',
            ]);
            $programme->name = $request->programmeName;
            $programme->total_students = $request->totalStudents;
            $programme->save();
        }

        return redirect()->back()->with('message', ['Data updated successfully!', 'success']);
    }


    public function destroyProgramme($id)
    {
        $programme = t_dit_pro::find($id);
        if ($programme) {
            $programme->delete();
            return response()->json(['success' => true, 'message' => 'Programme deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Programme not found!']);
        }
    }
    

}

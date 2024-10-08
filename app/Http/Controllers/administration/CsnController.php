<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_csn_descript;

class CsnController extends Controller
{
    public function viewCSNPro()
    {
        $programmes = t_csn_descript::all();
        return view('admin.csn_programme',compact('programmes'));
    }

    public function addProgramme(Request $request) {
        $programme = new t_csn_descript();
        $programme->description = $request->programmeDescription;
        if ($request->hasFile('programmeImage')) {
            $programme->image = $request->file('programmeImage')->store('programmes', 'public');
        }
        $programme->save();
        return redirect()->back()->with('message', ['Data added successfully', 'success']);
    }
    
    public function editProgramme(Request $request) {
        $programme = t_csn_descript::find($request->programmeId);
        $programme->description = $request->programmeDescription;
        if ($request->hasFile('programmeImage')) {
            $programme->image = $request->file('programmeImage')->store('programmes', 'public');
        }
        $programme->save();
        return redirect()->back()->with('message', ['Data edited successfully', 'success']);
    }
    
    public function deleteProgramme(Request $request, $id) {
        $programme = t_csn_descript::find($id); // Use the $id directly
        if ($programme) {
            \Storage::delete('public/' . $programme->image);
            $programme->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Data not found']);
    }
    
}

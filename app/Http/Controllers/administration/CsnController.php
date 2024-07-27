<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_csn_descript;
use App\Models\t_focus_area;

class CsnController extends Controller
{
    public function viewCSNPro()
    {
        $focusAreas = t_focus_area::all();
        $programmes = t_csn_descript::all();
        return view('admin.csn_programme',compact('programmes','focusAreas'));
    }

    public function addProgramme(Request $request)
    {
        $validatedData = $request->validate([
            'programmeDescription' => 'required',
            'programmeImage' => 'required|image',
           
        ]);
    
        $programme = new t_csn_descript(); 
        $programme->description = $validatedData['programmeDescription'];
    
        if ($request->hasFile('programmeImage')) {
            $file = $request->file('programmeImage');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/programmes', $filename);
            $programme->image = $filename;
        }
       
    
    
        $programme->save();
    
        return redirect()->back()->with('message', ['Programme added successfully!', 'success']);
    }
    
    public function update(Request $request)
    {
        $programme = t_csn_descript::find($request->programmeId);
    
        if ($programme) {
            $validatedData = $request->validate([
                'programmeDescription' => 'required',
                'programmeImage' => 'image',
            ]);
    
          
            $programme->description = $validatedData['programmeDescription'];
            if ($request->hasFile('programmeImage')) {
                $file = $request->file('programmeImage');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/programmes'), $filename);
                $programme->image = $filename;
            }
    
            $programme->save();
    
            return redirect()->back()->with('message', ['Programme updated successfully!', 'success']);
        }
    
        return redirect()->back()->with('message', ['Programme not found!', 'danger']);
    }
    
    public function destroy($id)
    {
        $programme = t_csn_descript::find($id);
        if ($programme) {
            $programme->delete();
            return response()->json(['success' => true, 'message' => 'Programme deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Programme not found!']);
        }
    }
   
   
    
}

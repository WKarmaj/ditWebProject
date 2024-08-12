<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_dmaprogramme;

class DmaController extends Controller
{
    public function viewDMA()
    {
        $programmes = t_dmaprogramme::all();
        return view ('admin.dma_programme',compact('programmes'));
    }
    public function addDMAProgramme(Request $request) {
        $programme = new t_dmaprogramme();
        $programme->description = $request->programmeDescription;
        if ($request->hasFile('programmeImage')) {
            $programme->image = $request->file('programmeImage')->store('dmaprogrammes', 'public');
        }
        $programme->save();
        return redirect()->back()->with('message', ['Data added successfully', 'success']);
    }
    public function editDMAProgramme(Request $request) {
        $programme = t_dmaprogramme::find($request->programmeId);
        $programme->description = $request->programmeDescription;
        if ($request->hasFile('programmeImage')) {
            $programme->image = $request->file('programmeImage')->store('dmaprogrammes', 'public');
        }
        $programme->save();
        return redirect()->back()->with('message', ['Data edited successfully', 'success']);
    }
    public function deleteDMAProgramme(Request $request, $id) {
        $programme = t_dmaprogramme::find($id); // Use the $id directly
        if ($programme) {
            \Storage::delete('public/' . $programme->image);
            $programme->delete();
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Data not found']);
    }
    
}

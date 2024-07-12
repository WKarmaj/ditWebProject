<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_project_research;

class ProjectController extends Controller
{
    public function viewStaffResearch()
    {
        $projects = t_project_research::all();
      
        return view('admin.project_research', compact('projects'));
    }

    public function save(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'projectTitle' => 'required|string|max:255',
            'projectAuthors' => 'required|string|max:255',
            'projectDescription' => 'required|string',
            'projectFiles.*' => 'nullable|mimes:pdf|max:10000',
        ]);
    
        // Create a new project instance
        $project = new t_project_research();
        $project->title = $validatedData['projectTitle'];
        $project->authors = $validatedData['projectAuthors'];
        $project->description = $validatedData['projectDescription'];
        
        // Handle file uploads
        $fileData = [];
        if ($request->hasFile('projectFiles')) {
            foreach ($request->file('projectFiles') as $file) {
                $originalName = $file->getClientOriginalName(); // Get original file name
                $path = $file->storeAs('projects/'.$project->id, $originalName, 'public'); // Store file with original name
                $fileData[] = [
                    'original_name' => $originalName,
                    'path' => $path,
                ];
            }
        }
        $project->file = json_encode($fileData); // Save file details as JSON
    
        $project->save();
    
        // Redirect back with success message
        return redirect()->back()->with('message', ['Project saved successfully.', 'success']);
    }
    

    public function update(Request $request)
    {   
        // Validate the incoming request data
        $validatedData = $request->validate([
            'projectTitle' => 'required|string|max:255',
            'projectAuthors' => 'required|string|max:255',
            'projectDescription' => 'required|string',
            'projectFiles.*' => 'nullable|mimes:pdf|max:10000',
        ]);
    
        $project = t_project_research::find($request->projectId);
    
        if($project) {
            $project->title = $validatedData['projectTitle'];
            $project->authors = $validatedData['projectAuthors'];
            $project->description = $validatedData['projectDescription'];
    
            // Handle new file uploads
            $fileData = json_decode($project->file, true) ?? [];
            if ($request->hasFile('projectFiles')) {
                foreach ($request->file('projectFiles') as $file) {
                    $originalName = $file->getClientOriginalName(); // Get original file name
                    $path = $file->storeAs('projects/'.$project->id, $originalName, 'public'); // Store file with original name
                    $fileData[] = [
                        'original_name' => $originalName,
                        'path' => $path,
                    ];
                }
            }
            $project->file = json_encode($fileData); // Update file details as JSON
    
            $project->save();
    
            return redirect()->back()->with('message', ['Project updated successfully!', 'success']);
        }
        return redirect()->back()->with('message', ['Project not found!', 'danger']);
    }
    

    public function delete($id)
    {
        // Find the project
        $project = t_project_research::find($id);

        if ($project) {
            // Delete associated files from storage
            $filePaths = json_decode($project->file, true) ?? [];
            foreach ($filePaths as $filePath) {
                \Storage::disk('public')->delete($filePath);
            }

            // Delete the project
            $project->delete();
            return response()->json(['success' => true, 'message' => 'Project deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'Project not found!']);
        }
    }
}

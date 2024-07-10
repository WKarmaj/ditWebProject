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
            // Add validation for files if needed
        ]);

        // Create a new project instance
        $project = new t_project_research();
        $project->title = $validatedData['projectTitle'];
        $project->authors = $validatedData['projectAuthors'];
        $project->description = $validatedData['projectDescription'];
        // Save the project
        $project->save();

        // Redirect back with success message
        return redirect()->back()->with('message', ['Project saved successfully.', 'success']);
    }
    

    public function update(Request $request)
    {   

        $project = t_project_research::find($request->projectId);

        if($project) {
            $project->title = $request->projectTitle;
            $project->authors = $request->projectAuthors;
            $project->description = $request->projectDescription;
            $project->save();

            return redirect()->back()->with('message', ['Project updated successfully!','success']);
        }
        return redirect()->back()->with('message', ['Project not found!', 'danger']);
    }

    public function delete($id)
    {
        // Find the project
        $project = t_project_research::find($id);

        if ($project) {
            $project->delete();
            return response()->json(['success' => true, 'message' => 'project deleted successfully!']);
        } else {
            return response()->json(['success' => false, 'message' => 'project not found!']);
        }
    }
}

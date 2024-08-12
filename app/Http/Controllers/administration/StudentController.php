<?php

namespace App\Http\Controllers\administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\t_csn;


class StudentController extends Controller
{
    public function viewCSNPage()
    {
        $projects = t_csn::all();
        return view('admin.csn_page',compact('projects'));
    }
    public function saveProject(Request $request)
    {
        $request->validate([
            'projectTitle' => 'required',
            'projectAuthors' => 'required',
            'projectDescription' => 'required',
            'projectFiles.*' => 'file|mimes:pdf|max:2048'
        ]);

        $project = new t_csn();
        $project->title = $request->input('projectTitle');
        $project->authors = $request->input('projectAuthors');
        $project->description = $request->input('projectDescription');

        if ($request->hasFile('projectFiles')) {
            $files = [];
            foreach ($request->file('projectFiles') as $file) {
                $fileName = $file->store('projects', 'public');
                $files[] = ['path' => $fileName, 'original_name' => $file->getClientOriginalName()];
            }
            $project->files = json_encode($files);
        }

        $project->save();

        return redirect()->back()->with([
            'message' => ['Project saved successfully!', 'success']
        ]);
    }

    public function updateProject(Request $request)
    {
        $request->validate([
            'projectTitle' => 'required',
            'projectAuthors' => 'required',
            'projectDescription' => 'required',
            'projectFiles.*' => 'file|mimes:pdf|max:2048'
        ]);

        $project = t_csn::find($request->input('projectId'));
        $project->title = $request->input('projectTitle');
        $project->authors = $request->input('projectAuthors');
        $project->description = $request->input('projectDescription');

        if ($request->hasFile('projectFiles')) {
            $files = $project->files ?? [];
            foreach ($request->file('projectFiles') as $file) {
                $fileName = $file->store('projects', 'public');
                $files[] = ['path' => $fileName, 'original_name' => $file->getClientOriginalName()];
            }
            $project->files = json_encode($files);
        }

        $project->save();

        return redirect()->back()->with([
            'message' => ['Project updated successfully!', 'success']
        ]);
    }

    public function deleteProject(Request $request)
    {
        $project = t_csn::find($request->input('id'));
        if ($project) {
            $files = json_decode($project->files, true);
    
            if (is_array($files)) {
                foreach ($files as $file) {
                    \Storage::disk('public')->delete($file['path']);
                }
            }
    
            $project->delete();
            return response()->json(['message' => 'Project deleted successfully!']);
        }
    
        return response()->json(['message' => 'Project not found!'], 404);
    }
    
    
}

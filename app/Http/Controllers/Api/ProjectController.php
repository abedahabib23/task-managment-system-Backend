<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(5);
           return response()->json([
            'success' => true,
            'data'    => $projects
        ], status: 200);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
         ]
     );
        $validated['user_id'] = Auth::id();
          $project=  Project::create($validated);
     return response()->json([
            'success' => true,
            'message'=>'Project Created Successfully',
            'data'    => $project
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
           return response()->json([
            'success' => true,
            'data'    => $project
        ], status: 200);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
         $validated = $request->validate([
        'name' => 'sometimes|string',
        'description' => 'sometimes|string',
         ]
     );
  $project->update($validated);
     return response()->json([
            'success' => true,
            'message'=>'Project updated Successfully',
            'data'    => $project
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
         $project->delete();
        return response()->json([
            'success' => true,
            'message'=>'Project Deleted Successfully',
        ], 200);
    }
}

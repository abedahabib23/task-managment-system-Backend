<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\ProjectMember;
use GuzzleHttp\Handler\Proxy;

class ProjectMemberController extends Controller
{
    //
      public function index(Project $project)
    {
        $projectMe = $project->members()->get();
        return response()->json([
            'success' => true,
            'data'    => $projectMe
        ], status: 200);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Project $project)
    {
        //
         $validated = $request->validate([
        'role' => 'required|string',
        'permission' => 'required|string',
        'added_at' => 'required|date',

         ]
     );
     $alreadyMember = $project->members()
                                 ->where('user_id', $request->user_id)
                                 ->exists();

        if ($alreadyMember) {
            return response()->json([
                'message' => 'User is already a member of this project.'
            ], 409);
        }

        $project->members()->attach($request->user_id, $validated);
     return response()->json([
            'success' => true,
            'message'=>'member add to project Successfully',
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
            'data'    => $project->members()->get()
        ], status: 200);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project,$user_id)
    {
        //
         $validated = $request->validate([
              'role' => 'sometimes|string',
        'permission' => 'sometimes|string',
        'added_at' => 'sometimes|date',
         ]
     );
$project->members()->updateExistingPivot($user_id, $validated
            );
     return response()->json([
            'success' => true,
            'message'=>'Member updated Successfully',
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project, $user_id)
    {
        //
         $project->members()->detach($user_id);

        return response()->json([
            'success' => true,
            'message'=>'member Deleted form project  Successfully',
        ], 200);
    }
}

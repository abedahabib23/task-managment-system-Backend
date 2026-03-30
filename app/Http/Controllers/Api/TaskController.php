<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    //
      public function index()
    {
        $tasks = Task::paginate(5);
           return response()->json([
            'success' => true,
            'data'    => $tasks
        ], status: 200);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Project $project)
    {
        //
         $validated = $request->validate([
        'title' => 'required|string',
        'description' => 'required|string',
        'due_date'=>'required|date',
       'priority'=>'required|string',
        'status'=>'required|string',
         ]
     );
        $validated['user_id'] = Auth::id();
        $validated['project_id'] = $project->id;
          $task=  Task::create($validated);
     return response()->json([
            'success' => true,
            'message'=>'Task Created Successfully',
            'data'    => $task
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
           return response()->json([
            'success' => true,
            'data'    => $task
        ], status: 200);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Project $project, Task $task)
    {
        //
             $validated = $request->validate([
        'title' => 'sometimes|string',
        'description' => 'sometimes|string',
        'due_date'=>'sometimes|date',
       'priority'=>'sometimes|string',
        'status'=>'sometimes|string',
         ]
     );
  $task->update($validated);
     return response()->json([
            'success' => true,
            'message'=>'Task updated Successfully',
            'data'    => $task
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
         $task->delete();
        return response()->json([
            'success' => true,
            'message'=>'Task Deleted Successfully',
        ], 200);
    }
}

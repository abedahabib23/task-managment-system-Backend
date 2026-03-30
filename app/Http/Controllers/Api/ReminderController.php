<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ReminderController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reminders= Reminder::paginate(5);
           return response()->json([
            'success' => true,
            'data'    => $reminders
        ], status: 200);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Task $task)
    {
        //
         $validated = $request->validate([
        'reminder_datetime' => 'required|date',
         ]
     );
        $validated['user_id'] = Auth::id();
        $validated['task_id'] = $task->id;
          $reminder=  Reminder::create($validated);
     return response()->json([
            'success' => true,
            'message'=>'Reminder Created Successfully',
            'data'    => $reminder
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Reminder $reminder)
    {
        //
           return response()->json([
            'success' => true,
            'data'    => $reminder
        ], status: 200);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reminder $reminder,Task $task)
    {
        //
         $validated = $request->validate([
        'reminder_datetime' => 'sometimes|date',
        'is_sent' => 'sometimes|boolean',

         ]
     );
          $reminder->update($validated);
     return response()->json([
            'success' => true,
            'message'=>'Reminder Updated Successfully',
            'data'    => $reminder
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reminder $reminder)
    {
        //
         $reminder->delete();
        return response()->json([
            'success' => true,
            'message'=>'Reminder Deleted Successfully',
        ], 200);
    }
}

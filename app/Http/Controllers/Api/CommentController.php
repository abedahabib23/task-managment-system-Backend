<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::paginate(5);
           return response()->json([
            'success' => true,
            'data'    => $comments
        ], status: 200);
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Task $task)
    {
        //
         $validated = $request->validate([
        'comment_text' => 'required|string',
         ]
     );
        $validated['user_id'] = Auth::id();
        $validated['task_id'] = $task->id;
          $comment=  Comment::create($validated);
     return response()->json([
            'success' => true,
            'message'=>'Comment Created Successfully',
            'data'    => $comment
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
           return response()->json([
            'success' => true,
            'data'    => $comment
        ], status: 200);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment,Task $task)
    {
        //
         $validated = $request->validate([
        'comment_text' => 'sometimes|string',
         ]
     );
          $comment->update($validated);
     return response()->json([
            'success' => true,
            'message'=>'Comment Updated Successfully',
            'data'    => $comment
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
         $comment->delete();
        return response()->json([
            'success' => true,
            'message'=>'Comment Deleted Successfully',
        ], 200);
    }
}

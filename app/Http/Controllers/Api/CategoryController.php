<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(5);
           return response()->json([
            'success' => true,
            'data'    => $categories
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
         ]
     );
        $validated['user_id'] = Auth::id();
          $category=  Category::create($validated);
     return response()->json([
            'success' => true,
            'message'=>'category Created Successfully',
            'data'    => $category
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
           return response()->json([
            'success' => true,
            'data'    => $category
        ], status: 200);
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
         $validated = $request->validate([
        'name' => 'sometimes|string',
         ]
     );
  $category->update($validated);
     return response()->json([
            'success' => true,
            'message'=>'Category updated Successfully',
            'data'    => $category
        ], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
         $category->delete();
        return response()->json([
            'success' => true,
            'message'=>'Category Deleted Successfully',
        ], 200);
    }
}

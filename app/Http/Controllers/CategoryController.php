<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('backEnd.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'description'=>'nullable',
           'status'=>'nullable',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->back()->with('success','Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function categoryUpdate($id)
    {
        $category = Category::find($id);
        return view('backEnd.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateCategory(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'nullable',
            'status'=>'nullable',
        ]);

        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
        return redirect()->back()->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

}

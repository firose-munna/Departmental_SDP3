<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories= SubCategory::all();
        return view('adminn.subcategory.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('adminn.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subcategory=new SubCategory();
        $subcategory->cat_id= $request->category;
        $subcategory->name= $request->name;
        $subcategory->description= $request->description;

        $subcategory->save();
        return redirect()->back()->with('message', 'Subcategory Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(SubCategory $subcategory)
    {
        if($subcategory->status == 1){
            $subcategory->update(['status'=>0]);
        }
        else{
            $subcategory->update(['status'=>1]);
        }
        return redirect()->back()->with('message', 'Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories=Category::all();
        return view('adminn.subcategory.edit', compact('categories', 'subCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $update=$subCategory->update([
            'name'=>$request->name,
            'cat_id'=>$request->category,
            'description'=>$request->description


        ]);
        if($update){
            return redirect('/sub-categories')->with('message', 'Subcategory Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $delete=$subCategory->delete();
        if($delete){
            return redirect()->back()->with('message', 'Delete Successfully');
        }

    }
}

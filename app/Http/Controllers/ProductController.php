<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::all();
        return view('adminn.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        return view('adminn.product.create', compact('categories', 'subcategories', 'brands', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new Product();
        $product->cat_id= $request->category;
        $product->sub_cat_id= $request->subcategory;
        $product->brand_id= $request->brand;
        $product->unit_id= $request->unit;
        $product->product_code= $request->code;
        $product->name= $request->name;
        $product->description= $request->description;
        $product->price= $request->price;

        $images=array();
        if($files=$request->file('file')){
            $i=0;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $fileNameExtract=explode('.',$name);
                $fileName=$fileNameExtract[0];
                $fileName.=time();
                $fileName.=$i;
                $fileName.='.';
                $fileName.=$fileNameExtract[1];

                $file->move('image',$fileName);
                $images[]=$fileName;
                $i++;
            }
            $product['image'] = implode("|",$images);

            $product->save();
            return redirect()->back()->with('message', 'Product Created Successfully');
        }
        else{
            echo "Error. Please select Image.";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function change_status(Product $product)
    {
        if($product->status == 1){
            $product->update(['status'=>0]);
        }
        else{
            $product->update(['status'=>1]);
        }
        return redirect()->back()->with('message', 'Status Change Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        return view('adminn.product.edit', compact('product','categories', 'subcategories', 'brands', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $update=$product->update([
            'product_code'=>$request->code,
            'name'=>$request->name,
            'cat_id'=>$request->category,
            'sub_cat_id'=>$request->subcategory,
            'brand_id'=>$request->brand,
            'price'=>$request->price,
            'unit_id'=>$request->unit,
            'description'=>$request->description


        ]);
        if($update){
            return redirect('/products')->with('message', 'Product Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $delete=$product->delete();
        if($delete){
            return redirect()->back()->with('message', 'Delete Successfully');
        }
    }
}

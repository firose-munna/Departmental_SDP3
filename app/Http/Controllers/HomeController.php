<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Support\Facades\Request;


use DB;

class HomeController extends Controller
{
    public function index(){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        $products=Product::where('status', 1)->latest()->limit(12)->get();
        $top_sales = DB::table('products')
            ->leftJoin('order_details','products.id','=','order_details.product_id')
            ->selectRaw('products.id, SUM(order_details.product_sales_qnty) as total')
            ->groupBy('products.id')
            ->orderBy('total','desc')
            ->take(8)
            ->get();
        $topProducts = [];
        foreach ($top_sales as $s){
            $p = Product::findOrFail($s->id);
            $p->totalQty = $s->total;
            $topProducts[] = $p;
        }
        return view('frontend.welcome', compact('categories', 'subcategories', 'brands', 'units', 'products', 'topProducts'));
    }
    public function view_details($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $units=Unit::all();
        $product=Product::findOrFail($id);
        $cat_id=$product->cat_id;
        $related_products=Product::where('cat_id', $cat_id)->limit(4)->get();
        return view('frontend.pages.view_details', compact('categories', 'subcategories', 'brands', 'units', 'product', 'related_products'));
    }

    public function product_by_cat($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('cat_id', $id)->limit(12)->get();
        return view('frontend.pages.product_by_cat', compact('categories', 'subcategories', 'brands','products'));
    }
    public function product_by_subcat($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('sub_cat_id', $id)->limit(12)->get();
        return view('frontend.pages.product_by_subcat', compact('categories', 'subcategories', 'brands','products'));
    }
    public function product_by_brand($id){
        $categories=Category::all();
        $subcategories=SubCategory::all();
        $brands=Brand::all();
        $products=Product::where('status',1)->where('brand_id', $id)->limit(12)->get();
        return view('frontend.pages.product_by_brand', compact('categories', 'subcategories', 'brands','products'));
    }

}

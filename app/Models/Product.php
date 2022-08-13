<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['id', 'cat_id', 'sub_cat_id', 'brand_id', 'unit_id', 'product_code','name', 'description','price', 'image', 'status'];

    public function category(){
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function subcategory(){
        return $this->belongsTo(SubCategory::class, 'sub_cat_id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function unit(){
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public static function catProductCount($cat_id){
        $catCount=Product::where('cat_id', $cat_id)->where('status', 1)->count();
        return $catCount;
    }
    public static function subcatProductCount($sub_cat_id){
        $subcatCount=Product::where('sub_cat_id', $sub_cat_id)->where('status', 1)->count();
        return $subcatCount;
    }
    public static function brandCount($brand_id){
        $brandCount=Product::where('brand_id', $brand_id)->where('status', 1)->count();
        return $brandCount;
    }

}



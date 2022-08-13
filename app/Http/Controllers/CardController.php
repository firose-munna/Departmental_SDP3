<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Session;
Session_start();


class CardController extends Controller
{
    public function add_to_cart(Request $request){
        $quantity = $request->quantity;
        $id = $request->id;

        $products=DB::table('products')->where('id', $id)->first();
        $data['quantity']=$quantity;
        $data['id'] = $products->id;
        $data['name'] = $products->name;
        $data['price'] = $products->price;
        $data['attributes'] = [$products->image];

        Cart::add($data);
        cardArray();

        return redirect()->back();
    }

    public function delete_card($id){
        Cart::remove($id);
        return redirect()->back();
    }
}

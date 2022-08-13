<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipping;
use Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use Session;

class CheckoutController extends Controller
{
    public function index(){
        $customer_id=Customer::where('id', Session::get('id'))->first();
        return view('frontend.pages.checkout', compact('customer_id'));
    }
    public function login_check(){
        return view('frontend.pages.login');
    }
    public function payment(){
        $cartCollection=Cart::getContent();
        $cart_array=$cartCollection->toArray();
        return view('frontend.pages.payment', compact('cart_array'));
    }
    public function shipping_address(Request $request){
        $data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['address'] = $request->address;
        $data['city'] = $request->city;
        $data['country'] = $request->country;
        $data['zip_code'] = $request->zip_code;
        $data['phone'] = $request->phone;
        $shipping_id = Shipping::insertGetId($data);
        Session::put('sid', $shipping_id);


        return Redirect::to('/payment');
    }
    public function order_place(Request $request){
        $payment_method=$request->payment;
        $pdata=array();
        $pdata['payment_method'] = $payment_method;
        $pdata['status']='pending';
        $payment_id=Payment::insertGetId($pdata);

        $odata=array();
        $odata['customer_id'] = Session::get('id');
        $odata['shipping_id'] = Session::get('sid');
        $odata['payment_id'] = $payment_id;
        $odata['total'] = Cart::getTotal();
        $odata['status'] ='pending';
        $order_id=Order::insertGetId($odata);

        $cartCollection=Cart::getContent();
        $oddata=array();
        Foreach($cartCollection as $cartContent){
            $oddata['order_id']=$order_id;
            $oddata['product_id']=$cartContent->id;
            $oddata['product_name']=$cartContent->name;
            $oddata['product_price']=$cartContent->price;
            $oddata['product_sales_qnty']=$cartContent->quantity;
            DB::table('order_details')->insert($oddata);
        }

        if($payment_method== 'Cash'){
            Cart::clear();
            return view('/frontend.pages.payment_method');
        }
        else if($payment_method== 'Bkash'){
            Cart::clear();
            return view('/frontend.pages.payment_method');
        }
        else if($payment_method== 'Rocket'){
            Cart::clear();
            return view('/frontend.pages.payment_method');
        }
        else if($payment_method== 'Nogod'){
            Cart::clear();
            return view('/frontend.pages.payment_method');
        }






    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

class CustomerController extends Controller
{
    public function login(Request $request){
        $email=$request->email;
        $password=$request->password;
        $result=Customer::where('email', $email)->where('password', $password)->first();

        if($result){
            Session::put('id', $result->id);
            return Redirect::to('/checkout');
        }
        else{
            return Redirect::to('/login-check');
        }
    }
    public function registration(Request $request){
        $data=array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['phone'] = $request->phone;
        $id = Customer::insertGetId($data);
        Session::put('id', $id);
        Session::put('name', $request->name);

        return Redirect::to('/checkout');
    }
    public function logout(){
        Session::flush();
        return Redirect::to('/');
    }

}

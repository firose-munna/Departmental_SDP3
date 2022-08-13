<?php

namespace App\Http\Controllers;
use App\HTTP\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Session;
session_start();

class SuperAdminController extends Controller
{
    public function dashboard(){
        $this->AdminAuthCheck();
        return view('adminn.admin_dashboard');
    }
    public function logout(){
        Session::flush();
        return Redirect::to('/adminn');
    }

    public function AdminAuthCheck(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }
        else{
            return Redirect::to('/adminn')->send();
        }
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    public function Logout(){
        Auth::logout();
        $notification = array(
            'message' => 'Logout Successfully',
            'alert-type' => 'success'
        );
        return Redirect()->route('login')->with($notification);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function UserView(){
        $data['allData'] = User::all();
        return view('backend.user.view_user',$data);

    }

    public function UserAdd(){
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request){
        $validateData = $request->validate([
            'email' => 'required|unique:users',
            'user_type' => 'required',
            'name' => 'required',
            'password' => 'required',
            ]);

            $data = new User();
            $data->name = $request->name;
            $data->user_type = $request->user_type;
            $data->email = $request->email;
            $data->password = bcrypt($request->password);
            $data->save();

            $notification = array(
                'message' => 'User Added Successfully',
                'alert-type' => 'success'
            );
            return Redirect()->route('users.view')->with($notification);
    }

    public function UserEdit($id){
        $editData = User::find($id);
        return view('backend.user.edit_user',compact('editData'));

    }

    public function UserUpdate(Request $request,$id){
        $validateData = $request->validate([
            'email' => 'required',
            'user_type' => 'required',
            'name' => 'required',
            ]);

            $data = User::find($id);
            $data->name = $request->name;
            $data->user_type = $request->user_type;
            $data->email = $request->email;
            $data->save();

            $notification = array(
                'message' => 'User Updated Successfully',
                'alert-type' => 'info'
            );
            return Redirect()->route('users.view')->with($notification);
    }

    public function UserDelete($id){
        $user = User::find($id);
        $user->delete();

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'info'
        );
        return Redirect()->route('users.view')->with($notification);

    }

}

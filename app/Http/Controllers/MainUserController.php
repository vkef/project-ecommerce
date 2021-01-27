<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class MainUserController extends Controller
{
    public function Logout(){

        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.view_profile',compact('user'));
    }

    public function UserProfileEdit(){

        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('user.profile.view_profile_edit',compact('editData'));
    }

    public function UserProfileStore(Request $request){

        $data = User::find(Auth::user()->id);
        $data -> name =$request -> name;
        $data -> email =$request -> email;

        if ($request -> file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file -> move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Succesfully',
            'alert-type' => 'success'
        );
        return redirect()->route('user.profile')->with($notification);

    }

    public function UserPasswordView(){

        return view('user.password.edit_password');
    }

    public function UserPasswordUpdate(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'

        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword)){

            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login');
        }else{
            return redirect()->back();
        }

        return view('user.password.edit_password');
    }


}

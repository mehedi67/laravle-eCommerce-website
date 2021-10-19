<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Image;

class ProfileController extends Controller
{
    public function index(){
        return view('profile.index');
    }
    public function change (Request $request){
        // print_r($request->all());
         $user_id = Auth::id();
        // print_r($request->name);
        User::find($user_id)->update([
            'name' => $request->name
        ]);
        return back()->with('success',' Profile Name Changed Successfully!');

    }

    public function passwordchange(Request $request){
        // print_r($request->all());
        $request->validate([

            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);
        if( Hash::check($request->old_password, Auth::user()->password)){
            User::find(Auth::id())->update([
                'password' => bcrypt($request->password)
            ]);
            return back()->with('success', ' password changed successfully!');
        }else{
            return back()->with('error', 'old password does not match');
           }
        
    }

    public function photochange(Request $request){
        $request->validate([
            'new_profile_photo' => 'required|mimes:jpg,bmp,png'
        ]);
        $new_profile_photo= $request->file('new_profile_photo');
        $new_profile_photo_name = Auth::user()->name.".". $new_profile_photo->getClientOriginalExtension();

        if(Auth::user()->profile_photo != "default.jpg"){
            $path = public_path()."/uploads/profile_photo/" . Auth::user()->profile_photo;
            unlink($path);
        }
        Image::make($new_profile_photo)->save(base_path('public/uploads/profile_photo/'. $new_profile_photo_name) );
        //database update start
        User::find(Auth::id())->update([
            'profile_photo' => $new_profile_photo_name
        ]);
        //database update end
        return back();
        
    }




}

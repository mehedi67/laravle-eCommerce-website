<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::latest()->get();
        
        return view('home', compact('users'));
    }

    public function userinsert(Request $request){
        print_r($request->all());
        User::insert([
            'name'  =>$request->name,
            'email'  =>$request->email,
            'password'  =>bcrypt($request->password),
            'role'  =>$request->role,
            'created_at' => Carbon::now()
        ]);
        return back()->with('user_status','User Added Successfully');
    }
}

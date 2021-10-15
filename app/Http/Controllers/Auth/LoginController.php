<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
       //validate
       $this->validate($request,[
           'email'=>'required|email',
           'password'=>'required',
           
       ]);
       
       //sign in the user
       if(!auth()->attempt($request->only('email', 'password'), $request->remember))
       {
            return back()->with('status','Invalid login details');
       }
       //redirect to dahboard
       return redirect()->route('dashboard');
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;

class UserController extends Controller
{
    //

    public function create(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:10',
            'cpassword' => 'required|same:password'
        ],[
            'cpassword.required'=>'The confirm field is required.',
            'cpassword.same'=>'The confirm password and password must match.'
        ],[
            
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $data = $user -> save();
        if($data) {
            return redirect() -> back() -> with('success', 'You have registered successfully');
        }else {
            return redirect() -> back() -> with('error', 'Registration Failed');
        }
    }

    public function doLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:10',
        ]);
        
        $user = User::where('email', ($request -> only('email')));
         if($user->value('status') === "pending") {
               return redirect()->back()->with('error', 'Your account is in pending state, Please try to login after some time.');
            } else if($user->value('status') === "rejected"){
                return redirect()->back()->with('error', 'Your account is suspended, Please contact to support team');
            }

        $check = $request->only('email','password');
        
        if(Auth::guard('web')->attempt($check)) {
           // dd(123);
            return redirect() -> route('user.home') -> with('success', 'Welcome to Dashboard');
        }else {
            return redirect() -> back() -> with('error', 'Login Failed');
        }
    }

    public function logout() {
        Auth::guard('web')->logout();
        return redirect('/');
    }

}

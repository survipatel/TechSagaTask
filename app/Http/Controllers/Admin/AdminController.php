<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use Auth;

class AdminController extends Controller
{
    public function doLogin(Request $request){
        $request->validate([
            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|max:10',
        ],[
            'email.exists' => 'This email is not registered into our system'
        ]);
        $check = $request->only('email','password');
        
        if(Auth::guard('admin')->attempt($check)) {
            return redirect() -> route('admin.home') -> with('success', 'Welcome to Admin Dashboard');

            //$this->getData();
        }else {
            return redirect() -> back() -> with('error', 'Login Failed');
        }
    }

    public function showUserListing(){
        $data = User::all();  
        return view('dashboard.admin.home',['users' => $data]);      
    }
    

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

    public function acceptTheUser($id)
    {
        $user = User::find($id)->update(['status' => 'success']);
        return 'User accepted successfully';
    }

    public function rejectTheUser($id)
    {
        $user = User::find($id)->update(['status' => 'rejected']);
        return 'User rejected successfully';
    }

    public function getAllUsers()
    {
        $user = User::all();
        $html = view('dashboard.admin.showAllUsersListing',['users'=> $user])->render();
        return response()->json($html);
    }

    public function deleteAllUsers($id)
    {
        $usr = User::find($id)->delete();
        return 'User deleted successfully';
    }

    public function getsingleUserDetails($id)
    {
        $user = User::find($id);
        return $user;
    }

    public function updatesingleUserDetails(Request $request, $id)
    {
        $user = User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return 'User updated successfully';
    }
}

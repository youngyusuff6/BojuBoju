<?php

namespace App\Http\Controllers;


use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return route('/');
    }

    public function showChangePasswordGet() {
        return view('auth.passwords.change-password');
    }

    public function changePasswordPost(Request $request) {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");
    }


    //Change username logic

    public function showChangeUsernameGet() {
        $username = Auth::user()->email;
        return view('settings.changeUser')->with('username',$username);
    }

    
    public function showChangeUsernamePost(Request $request){
        $user_id = Auth::user()->id;
        
        $validate = $request->validate([
            'email' => 'required|string|email|max:255|unique:users'
        ]);
        $update_record = User::where('id', $user_id)->update([
            'email' => $request->input('email')
        ]);

        Toastr::success('Email Address Changed Successfully!', 'Done!');
        return redirect()->route('changeSettings');
    }
}

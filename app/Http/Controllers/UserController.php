<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
   

    public function profile(Request $request){
        $id = Auth::id();
        $user = User::find($id);
        return view('user.profile', compact('user'));
    }

    public function changeProfile(Request $request){
        $id = Auth::id();
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'username' => $request->username
        ]);

        return redirect()->back()->with("successProfile","Profile changed successfully !");
    }


    public function changePassword(Request $request){
        $current = $request->get('current-password');
        if ($current != Auth::user()->password ){
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|confirmed',
        ]);

        // return $validatedData;

        //Change Password
        $user = Auth::user();
        $user->password = $request->get('new-password');
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");

    }
}

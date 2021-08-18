<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Moment;

use Auth;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function home(){
        $moments = Moment::orderBy('kode_urut', 'ASC')->get();
        return view('home', compact('moments'));
    }

    public function loginProses(Request $request)
    {
        $user = User::where([
            'username' => $request->username,
            'password' => $request->password
        ])->first();
        
        $remember_me  = ( !empty( $request->remember_me ) )? TRUE : FALSE;
        
        if($user){
            Auth::login($user, $remember_me);
            return redirect()->intended('/');
        }
        else{
            return redirect()->back()->with("error","Username atau Password Salah");
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');

    }
}

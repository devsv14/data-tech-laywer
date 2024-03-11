<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials = $request->only('usuario', 'password');
            //dd(Hash::make($credentials['password']));
            $userAuth = User::where('usuario', $credentials['usuario'])->first();
            if ($userAuth && Hash::check($credentials['password'], $userAuth['password'])) {
                Auth::login($userAuth);
                return redirect()->route('home');
            }else{
                return redirect()->route('login');
            }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}

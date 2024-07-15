<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        // Custom error messages
        $messages = [
            'email.required' => 'Email is required.',
            'email.email' => 'Invalid email format.',
            'password.required' => 'Password is required.',
        ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules, $messages);
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->intended(RouteServiceProvider::USER);
            }else{
                return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
            }
    }

    public function loginForm(){
        return view('auth.login');
    }

    public function logout(){

        Auth::guard('user')->logout();

        return redirect('/');
    }
}

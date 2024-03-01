<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->input();
            $remember = $request->has('remember');
            if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']],$remember)) {
                session()->flash('msg', 'Signed In Sucessfully.');
                session()->flash('cls', 'success');
                return redirect()->route('dashboard');
            } else {
                session()->flash('msg', 'Invalid username or password');
                session()->flash('cls', 'error');
                return redirect()->back();
            }
        }

        return view('auth.login');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('post')) {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            if (Auth::attempt($request->only('email', 'password'))) {
                session()->flash('msg', 'Registration Sucessfull.');
                session()->flash('cls', 'success');
                return redirect()->route('dashboard');
            }
        }

        return view('auth.register');
    }



    public function logout()
    {
        Auth ::logout();
        session()->flash('msg', 'Signed Out Sucessfully.');
        session()->flash('cls', 'success');
        return redirect('/');
    }
}

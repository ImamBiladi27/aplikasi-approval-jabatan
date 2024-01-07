<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('login');
        }
    }
    public function register(){
        $manage = User::all();
        // dd($manage);
        $data = [
            'user' => $manage
        ];
        if (Auth::check()){
            return redirect('home');
        }else{
            return view('register',$data);
        }
    }

    public function actionlogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home');
        } else {
            Session::flash('error', 'Email atau Password Salah');
            return redirect('/login');
        }
    }
    public function actionregister(Request $request){

        // dd($name );

        // dd($request->all());

        $password = $request->input('password');
        // dd($password );

        // Hash the password
        $hashedPassword = bcrypt($password);

        $user=User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'jabatan' => $request->input('jabatan'),
            'manage_id' => $request->input('manage_id'),
            'password' => $hashedPassword,
            'role' => $request->input('role'),
        ]);
        // dd($user);
        return redirect('/login');
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

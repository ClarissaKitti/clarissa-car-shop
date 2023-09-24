<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use App\Userlogin;
use App\Models\User;

class AuthController extends Controller
{
    public function Login()
{
	return view('auths.login');
}
public function register()
{
	return view('auths.register');
}
	public function postlogin(Request $request)
	{
		if(Auth::attempt($request->only('email','password'))){
			return redirect('/dashboard');
		}
		return redirect('/login');
	}

	protected function postregister(Request $request)
    {
		//dd($request->all());
		$request->validate([
			'name' =>'required',
			'email' =>'required',
			'password' =>'required'
		]);

         User::insert([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
		return redirect('/dashboard');
    }

public function Logout()
{
	Auth::logout();
	return redirect('/login');
}

}

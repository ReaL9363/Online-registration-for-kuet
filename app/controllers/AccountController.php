<?php

class AccountController extends BaseController{

	public function getLogin(){
		return View::make('login');
	}

	public function postLogin(){
		$username = Input::get('username');
		$password = Input::get('password');

		if($username == ''){
			Session::flash('username_error', 'You must enter a username');
			return Redirect::route('getLogin', array('username'	=>	''));
		}
		if($password == ''){
			Session::flash('password_error', 'You must enter a password');
			return Redirect::route('getLogin', array('username'	=>	$username));
		}
		$user = DB::table('users')->where('username', $username)->first();
		if(!$user){
			Session::flash('username_error', 'Username is incorrect!!!');
			return Redirect::route('getLogin', array('username'	=>	$username));
		}else{
			if(Hash::check($password, $user->password)){
				Session::put('user_id', $user->id);
				Session::put('user_type', $user->usertype);
				return Redirect::route('home');
			}else{
				Session::flash('password_error', 'Password is incorrect!!!');
				return Redirect::route('getLogin');
			}
		}
	}

	public function getLogout(){
		Session::forget('user_id');
		Session::forget('user_type');
		Session::flash('logout_msg', 'You have successfully logged out');
		return Redirect::route('getLogin');
	}

}
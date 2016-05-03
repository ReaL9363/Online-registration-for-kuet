<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getHome()
	{
		if(Session::get('user_type') == 'admin'){
			return Redirect::route('getAdminDashboard');
		}
		if(Session::get('user_type') == 'student'){
			return Redirect::route('getStudentDashboard');
		}
		if(Session::get('user_type') == 'teacher'){
			return Redirect::route('getTeacherDashboard');
		}
	}

}

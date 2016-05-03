<?php

class StudentController extends BaseController{
	public function getStudentDashboard(){
		return View::make('student.dashboard');
	}

	public function getUpdateStudentProfile(){
		return View::make('student.updateProfile');
	}

	public function postUpdateStudentProfile(){
		$full_name = Input::get('full_name');
		$email = Input::get('email');

		DB::beginTransaction();
		try{
			$roll = DB::table('users')->where('id', Session::get('user_id'))->first()->username;
			DB::table('students')->where('roll', $roll)->update(array(
					'full_name'	=>	$full_name,
					'email'	=>	$email
				));

			DB::commit();
			Session::flash('success', 'Your profile has been updated.');
			return Redirect::route('getUpdateStudentProfile');
		}catch(\Exception $e){
			DB::rollback();
			Session::flash('error', 'Sorry.We could not update your profile.Try again');
			return Redirect::route('getUpdateStudentProfile');
		}
	}

	public function getNewCourseRegistration(){
		return View::make('student.newCourseRegistration');
	}

	public function postForwardToAdviser(){
		$year = Input::get('year');
		$term = Input::get('term');
		$session = Input::get('session');
		$courses = Input::get('courses');

		$user_id = Session::get('user_id');
		$username = DB::table('users')->where('id', $user_id)->first()->username;
		$student_id = DB::table('students')->where('roll', $username)->first()->id;

		DB::beginTransaction();
		
		try{
			DB::table('course_registrations')->insert(array(
					'student_id'					=>	$student_id,
					'year'							=>	$year,
					'term'							=>	$term,
					'session'						=>	$session,
					'courses'						=>	$courses,
					'course_registration_status'	=>	'adviser'
				));

			DB::commit();
			return '1';
		}catch(\Exception $e){
			DB::rollback();
			return '0';
		}
	}

	public function getViewCourseRegistration(){
		return View::make('student.viewCourseRegistration');
	}

	public function getAllRegisteredCourses(){
		$user_id = Session::get('user_id');
		$username = DB::table('users')->where('id', $user_id)->first()->username;
		$student_id = DB::table('students')->where('roll', $username)->first()->id;

		$registered_courses = DB::table('course_registrations')->where('student_id', $student_id)->get();

		return json_encode($registered_courses);
	}

	public function postDeleteRegistration(){
		$registrationID = Input::get('registration_id');
		DB::beginTransaction();
		
		try{
			DB::table('course_registrations')->where('id', $registrationID)->delete();
			DB::commit();
			return '1';
		}catch(\Exception $e){
			DB::rollback();
			return '0';
		}
		
		
	}

	public function getAllNotifications(){
		return View::make('student.notification');
	}
}
<?php

class TeacherController extends BaseController{
	public function getTeacherDashboard(){
		return View::make('teacher.dashboard');
	}

	public function getUpdateTeachersProfile(){
		return View::make('teacher.updateProfile');
	}

	public function postUpdateTeachersProfile(){
		try{
			$full_name = Input::get('full_name');
			$email = Input::get('email');
			$file = Input::file('image');
			$path = 'img/gravatar.png';
			if($file){
				$destinationPath = 'uploads';
				$filename = time() . $file->getClientOriginalName();
				$extension =$file->getClientOriginalExtension(); 
				Input::file('image')->move($destinationPath, $filename);
				$path = 'uploads/' . $filename;

				DB::table('teachers')->where('user_id', Session::get('user_id'))->update(array(
					'full_name'	=>	$full_name,
					'email'		=>	$email,
					'image'		=>	$path
				));

			}else{
				DB::table('teachers')->where('user_id', Session::get('user_id'))->update(array(
					'full_name'	=>	$full_name,
					'email'		=>	$email
				));
			}
			
			Session::flash('success', 'Your profile is updated.');
			return Redirect::route('getUpdateTeachersProfile');
		}catch(\Exception $e){
			Session::flash('error', 'Sorry, there is a problem. Please try again.');
			return Redirect::route('getUpdateTeachersProfile');
		}
	}

	public function getTeacherCourseRegistration(){
		return View::make('teacher.courseRegistration');
	}

	public function getTeacherCourseRegistrationDetails($registration_id){
		return View::make('teacher.courseRegistrationDetails', array('id'=>$registration_id));
	}

	public function postTeacherCourseRegistrationApprove(){
		$reg_id = Input::get('reg_id');
		DB::beginTransaction();
		
		try{
			
			DB::table('course_registrations')->where('id', $reg_id)->update(array(
					'course_registration_status'	=>	'academic_building'
				));

			//send message
			$student_id = DB::table('course_registrations')->where('id', $reg_id)->first()->student_id;

			$roll = DB::table('students')->where('id', $student_id)->first()->roll;
			$user_id = DB::table('users')->where('username', $roll)->first()->id;

			Message::sendMessage($user_id, "Your adviser has approved your registration request");

			DB::commit();
			return '1';
		}catch(\Exception $e){
			DB::rollback();
			return '0';
		}
		
	}

	public function postTeacherCourseRegistrationReject(){
		$reg_id = Input::get('reg_id');
		DB::beginTransaction();
		
		try{
			
			
			//send message
			$student_id = DB::table('course_registrations')->where('id', $reg_id)->first()->student_id;

			$roll = DB::table('students')->where('id', $student_id)->first()->roll;
			$user_id = DB::table('users')->where('username', $roll)->first()->id;

			Message::sendMessage($user_id, "Your adviser has rejected your registration request");

			DB::table('course_registrations')->where('id', $reg_id)->delete();
			DB::commit();
			return '1';
		}catch(\Exception $e){
			DB::rollback();
			return '0';
		}
	}
}
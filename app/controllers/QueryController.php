<?php
class QueryController extends BaseController{
	public function getStudents($batch, $department){
		return json_encode(DB::table('students')->where('batch', $batch)->Where('department', $department)->get());
	}

	public function ajaxOfferedCourse(){
		$roll = DB::table('users')->where('id', Session::get('user_id'))->first()->username;
		$student_id = DB::table('students')->where('roll', $roll)->first()->id;
		$year = Input::get('year');
		$term = Input::get('term');
		$row = DB::table('course_registrations')
				->where('student_id', $student_id)
				->where('year', $year)
				->where('term', $term)
				->where('course_registration_status', 'student')
				->first();
		if($row){
			$courses = json_decode($row->courses);
		}else{
			return 404;
		}
		
		$result = array();
		foreach ($courses as $course) {
			$c = DB::table('courses')->where('id', $course)->first();
			$code = $c->code;
			$title = $c->name;
			$credit = $c->credit;
			array_push($result, array(
					'code'		=>	$code,
					'title'		=>	$title,
					'credit'	=>	$credit
				));
		}
		return json_encode($result);
	}

	public function ajaxGetCourseRegistrationStatus(){
		$roll = DB::table('users')->where('id', Session::get('user_id'))->first()->username;
		$student_id = DB::table('students')->where('roll', $roll)->first()->id;
		$year = Input::get('year');
		$term = Input::get('term');
		$courses = DB::table('course_registrations')
				->where('student_id', $student_id)
				->where('year', $year)
				->where('term', $term)
				->first();
		if($courses){
			return $courses->course_registration_status;
		}else{
			return 404;
		}
	}

	public function getAvailableCourses(){





		/*
		*	possible options are: 1/2/3/4
		*/
		$year = Input::get('year');
		/*
		*	possible options are:
		*	First Term - 1
		*	Second Term - 2
		*/
		$term = Input::get('term'); 
		$courses = DB::select(DB::raw("select * from courses where code like '%". $year . $term ."__%'"));
		return json_encode($courses);
	}

	public function getAvailableRegularCourses(){
		$input = Input::all();
		$roll = DB::table('users')->where('id', Session::get('user_id'))->first()->username;
		$student = DB::table('students')->where('roll', $roll)->first();
		$batch = $student->batch;
		$department = $student->department;
		DB::beginTransaction();
		
		try{
			$courses = DB::table('offered_courses')
						->where('department', $department)
						->where('year', $input['year'])
						->where('term', $input['term'])
						->first()->courses;
			$course_id = json_decode($courses);
			$response = array();
			foreach ($course_id as $id) {
				$course = DB::table('courses')
							->where('id', $id)->first();
				array_push($response, $course);
			}
			return json_encode($response);
			
			DB::commit();
			return '1';
		}catch(\Exception $e){
			DB::rollback();
			return '0';
		}
		
		
	}

	public function apiTeacherGetCourseRegistration(){
		$user_id = Session::get('user_id');
		$teacher_id = DB::table('teachers')->where('user_id', $user_id)->first()->id;
		$students_id = DB::table('students')->where('adviser_id', $teacher_id)->get();
		$response = array();
		foreach ($students_id as $student) {
			$student_id = $student->id;
			$registrations = DB::table('course_registrations')->where('student_id', $student_id)->where('course_registration_status', 'adviser')->get();
			foreach ($registrations as $registration) {
				$id = $registration->id;
				$roll = $student->roll;
				$year = $registration->year;
				$term = $registration->term;

				array_push($response, array(
						'registration_id'	=>	$id,
						'roll'				=>	$roll,
						'year'				=>	$year,
						'term'				=>	$term
					));
			}

		}

		return json_encode($response);
	}

	public function apiGetMessage(){
		$user_id = Session::get('user_id');
		$res = DB::table('messages')->where('user_id', $user_id)->where('seen', 0)->get();
		return json_encode($res);
	}

	public function apiGetCourseByDepartmentYearTerm($year, $term){
		$query = "% " . $year . $term . "%";
		$courses = DB::table('courses')->where('code', 'like', $query)->get();
		return $courses;

	}

	public function checkUserExist(){
		$username = Input::get('username');

		$user = DB::table('users')->where('username', $username)->first();
		if($user){
			return array('status'	=>	200 ,'found'	=>	true);
		}else{
			return array('status'	=>	200 ,'found'	=>	false);
		}

	}

	public function checkCourseExist(){
		$code = Input::get('code');
		$course = DB::table('courses')->where('code', $code)->first();
		
		if($course) return array('found'=>true);
		else return array('found'=>false);
	}
}
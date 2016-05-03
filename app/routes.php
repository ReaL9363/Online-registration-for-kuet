<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(array('before'	=>	'login'), function(){
	Route::get('/', array(
		'as'	=>	'home',
		'uses'	=>	'HomeController@getHome'
		));
});
Route::get('/login', array(
		'as'	=>	'getLogin',
		'uses'	=>	'AccountController@getLogin'
	));
Route::post('/login', array(
		'as'	=>	'postLogin',
		'uses'	=>	'AccountController@postLogin'
	));
Route::get('/logout', array(
		'as'	=>	'getLogout',
		'uses'	=>	'AccountController@getLogout'
	));

/*
*	Admin route
*/
Route::group(array('before'	=>	'admin'), function(){
	Route::get('/admin', array(
		'as'	=>	'getAdminDashboard',
		'uses'	=>	'AdminController@getAdminDashboard'
		));
	Route::get('/student/new', array(
		'as'	=>	'getcreateNewStudent',
		'uses'	=>	'AdminController@getcreateNewStudent'
		));
	Route::post('/student/new', array(
		'as'	=>	'postcreateNewStudent',
		'uses'	=>	'AdminController@postcreateNewStudent'
		));
	Route::get('/teacher/new', array(
		'as'	=>	'getcreateNewTeacher',
		'uses'	=>	'AdminController@getcreateNewTeacher'
		));
	Route::post('/teacher/new', array(
		'as'	=>	'postcreateNewTeacher',
		'uses'	=>	'AdminController@postcreateNewTeacher'
		));
	Route::get('/course/new', array(
		'as'	=>	'getcreateNewCourse',
		'uses'	=>	'AdminController@getcreateNewCourse'
		));
	Route::post('/course/new', array(
		'as'	=>	'postcreateNewCourse',
		'uses'	=>	'AdminController@postcreateNewCourse'
		));
	Route::get('/assign-adviser', array(
		'as'	=>	'getAssignAdviser',
		'uses'	=>	'AdminController@getAssignAdviser'
		));
	Route::post('/assign-adviser', array(
		'as'	=>	'postAssignAdviser',
		'uses'	=>	'AdminController@postAssignAdviser'
		));

	Route::get('/course/offer', array(
		'as'	=>	'getCourseOffer',
		'uses'	=>	'AdminController@getCourseOffer'
		));

	Route::post('/course/offer', array(
		'as'	=>	'postCourseOffer',
		'uses'	=>	'AdminController@postCourseOffer'
		));

	Route::get('/admin/course/registration/request', array(
		'as'	=>	'getAdminCourseRegistrationRequest',
		'uses'	=>	'AdminController@getAdminCourseRegistrationRequest'
		));
	Route::get('api/admin/course/registration/request/{department}', array(
		'as'	=>	'apiGetAdminCourseRegistrationRequest',
		'uses'	=>	'AdminController@apiGetAdminCourseRegistrationRequest'
		));
	Route::get('api/admin/course/registration/details/{reg_id}', array(
		'as'	=>	'apiGetAdminCourseRegistrationDetails',
		'uses'	=>	'AdminController@apiGetAdminCourseRegistrationDetails'
		));
	Route::post('api/admin/course/registration/accept/{reg_id}/{roll}', array(
		'as'	=>	'apiPostAdminCourseRegistrationAccept',
		'uses'	=>	'AdminController@apiPostAdminCourseRegistrationAccept'
		));
	Route::post('api/admin/course/registration/reject/{reg_id}/{roll}', array(
		'as'	=>	'apiPostAdminCourseRegistrationReject',
		'uses'	=>	'AdminController@apiPostAdminCourseRegistrationReject'
		));

});

/*
*	query routes
*/
Route::get('/get/students/{batch}/{department}', array(
		'as'	=>	'getStudents',
		'uses'	=>	'QueryController@getStudents'
	));
Route::get('/get/course', array(
		'as'	=>	'getAvailableCourses',
		'uses'	=>	'QueryController@getAvailableCourses'
	));
Route::get('/get/course/regular', array(
		'as'	=>	'getAvailableRegularCourses',
		'uses'	=>	'QueryController@getAvailableRegularCourses'
	));
Route::get('/api/teacher/get/course/registration', array(
		'as'	=>	'apiTeacherGetCourseRegistration',
		'uses'	=>	'QueryController@apiTeacherGetCourseRegistration'
	));

Route::get('/api/get/message', array(
		'as'	=>	'apiGetMessage',
		'uses'	=>	'QueryController@apiGetMessage'
	));

Route::get('/api/get/course/{year}/{term}', array(
		'as'	=>	'apiGetCourseByDepartmentYearTerm',
		'uses'	=>	'QueryController@apiGetCourseByDepartmentYearTerm'
	));

Route::get('user/check', array(
		'as'	=>	'checkUserExist',
		'uses'	=>	'QueryController@checkUserExist'
	));
Route::get('course/check', array(
		'as'	=>	'checkCourseExist',
		'uses'	=>	'QueryController@checkCourseExist'
	));


/*
*	Student Route
*/

Route::group(array('before'	=>	'student'), function(){
	Route::get('/student', array(
			'as'	=>	'getStudentDashboard',
			'uses'	=>	'StudentController@getStudentDashboard'
		));
	Route::get('/student/profile/update', array(
			'as'	=>	'getUpdateStudentProfile',
			'uses'	=>	'StudentController@getUpdateStudentProfile'
		));
	Route::post('/student/profile/update', array(
			'as'	=>	'postUpdateStudentProfile',
			'uses'	=>	'StudentController@postUpdateStudentProfile'
		));
	Route::get('/student/course/registration', array(
			'as'	=>	'getNewCourseRegistration',
			'uses'	=>	'StudentController@getNewCourseRegistration'
		));
	Route::get('/student/view/course/registration', array(
			'as'	=>	'getViewCourseRegistration',
			'uses'	=>	'StudentController@getViewCourseRegistration'
		));

	Route::get('/student/course/registration/all', array(
			'as'	=>	'getAllRegisteredCourses',
			'uses'	=>	'StudentController@getAllRegisteredCourses'
		));
	Route::post('/student/registration/delete', array(
			'as'	=>	'postDeleteRegistration',
			'uses'	=>	'StudentController@postDeleteRegistration'
		));

	Route::get('/student/notification/all', array(
			'as'	=>	'getAllNotifications',
			'uses'	=>	'StudentController@getAllNotifications'
		));






	Route::get('/student/course/offered', array(
			'as'	=>	'ajaxOfferedCourse',
			'uses'	=>	'QueryController@ajaxOfferedCourse'
		));
	Route::get('/student/course-registration-status', array(
			'as'	=>	'ajaxGetCourseRegistrationStatus',
			'uses'	=>	'QueryController@ajaxGetCourseRegistrationStatus'
		));
	Route::post('/student/forward', array(
			'as'	=>	'postForwardToAdviser',
			'uses'	=>	'StudentController@postForwardToAdviser'
		));
});

/*
*	Teachers Route
*/
Route::group(array('before'	=>	'teacher'), function(){
	Route::get('/teacher/dashboard', array(
			'as'	=>	'getTeacherDashboard',
			'uses'	=>	'TeacherController@getTeacherDashboard'
		));
	Route::get('/teacher/profile/update', array(
			'as'	=>	'getUpdateTeachersProfile',
			'uses'	=>	'TeacherController@getUpdateTeachersProfile'
		));
	Route::post('/teacher/profile/update', array(
			'as'	=>	'postUpdateTeachersProfile',
			'uses'	=>	'TeacherController@postUpdateTeachersProfile'
		));

	Route::get('/teacher/course/registration', array(
			'as'	=>	'getTeacherCourseRegistration',
			'uses'	=>	'TeacherController@getTeacherCourseRegistration'
		));
	Route::get('/teacher/course/registration/details/{registration_id}', array(
			'as'	=>	'getTeacherCourseRegistrationDetails',
			'uses'	=>	'TeacherController@getTeacherCourseRegistrationDetails'
		));
	Route::post('/teacher/course/registration/approve', array(
			'as'	=>	'postTeacherCourseRegistrationApprove',
			'uses'	=>	'TeacherController@postTeacherCourseRegistrationApprove'
		));
	Route::post('/teacher/course/registration/reject', array(
			'as'	=>	'postTeacherCourseRegistrationReject',
			'uses'	=>	'TeacherController@postTeacherCourseRegistrationReject'
		));
});




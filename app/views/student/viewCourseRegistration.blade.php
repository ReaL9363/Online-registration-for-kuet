@extends('layouts.main')

@section('content')
	@include('student.navbar')

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>View Course Registration</h1>
				<table class="table table-striped table-hover ">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>Year</th>
				      <th>Term</th>
				      <th>Session</th>
				      <th>Course</th>
				      <th>Status</th>
				      <th>Cancel</th>
				    </tr>
				  </thead>
				  <tbody class="registrations">
				    
				  </tbody>
				</table> 
			</div>
		</div>
	</div>
	
	{{ HTML::script('js/student/viewCourseRegistration.js') }}

@stop
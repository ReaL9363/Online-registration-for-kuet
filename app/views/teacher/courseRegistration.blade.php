@extends('layouts.main')

@section('content')
	@include('teacher.navbar')

	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h1>Course Registration</h1>
				<table class="table table-striped table-hover ">
				  <thead>
				    <tr>
				      <th>#</th>
				      <th>Roll</th>
				      <th>Year</th>
				      <th>Term</th>
				      <th>Details</th>
				    </tr>
				  </thead>
				  <tbody class="course_registration_list">
				    
				  </tbody>
				</table> 


			</div>
		</div>
	</div>
	
	{{ HTML::script('js/teacher/courseRegistration.js') }}

@stop
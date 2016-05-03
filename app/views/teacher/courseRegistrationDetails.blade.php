@extends('layouts.main')

@section('content')
	@include('teacher.navbar')
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">



<ul class="nav nav-tabs" style="border:1px solid #e1e1e1">
  <li class="active"><a href="#students_info" data-toggle="tab" aria-expanded="true">Student's Info</a></li>
  <li class=""><a href="#courses" data-toggle="tab" aria-expanded="false">Courses</a></li>
  <li class=""><a href="#action" data-toggle="tab" aria-expanded="false">Action</a></li>
</ul>

<?php

	$reg = DB::table('course_registrations')->where('id', $id)->first();

	$roll = DB::table('students')->where('id', $reg->student_id)->first()->roll;
	$session = $reg->session;
	$year = $reg->year;
	$term = $reg->term;
	if($year == '1') $year = "First Year";
	if($year == '2') $year = "Second Year";
	if($year == '3') $year = "Third Year";
	if($year == '4') $year = "Fourth Year";

	if($term == '1') $term = "First Term";
	if($term == '2') $term = "Second Term";
	if($term == 'backlog') $term = "Backlog";
	if($term == 'special_backlog') $term = "Special Backlog";

	$courses = json_decode($reg->courses);

?>


<div id="myTabContent" class="tab-content" style="border:1px solid #e1e1e1; padding: 10px">
  <div class="tab-pane fade active in" id="students_info">
    <table style="width:100%" class="table table-striped table-hover ">
    	<tr style="width:50%" class="active">
    		<td><h2>Roll</h2> <b>{{ $roll }}</b></td>
    		<td><h2>Session</h2> <b>{{ $session }}</b></td>
    	</tr>
    	<tr style="width:50%" class="active">
    		<td><h2>Year</h2> <b>{{ $year }}</b></td>
    		<td><h2>Term</h2> <b>{{ $term }}</b></td>
    	</tr>
    </table>
  </div>
  <div class="tab-pane fade in" id="courses">

	<table class="table table-striped table-hover ">
	  <thead>
	    <tr>
	      <th>#</th>
	      <th>Course Name</th>
	      <th>Code</th>
	      <th>Credit</th>
	      <th>Remark</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<?php
	  		$i = 1;
	  		$totalCredit = 0;
		  	foreach ($courses as $course) { ?>
				<tr class="active">
			      <td>{{ $i++ }}</td>
			      <td>{{ $course->name }}</td>
			      <td>{{ $course->code }}</td>
			      <td>{{ $course->credit }}</td>
			      <td>{{ $course->remark }}</td>
			    </tr>
			    <?php $totalCredit += $course->credit ?>
	 <?php }

	  	?>
	  </tbody>
	</table> 
	Total Credit: {{ $totalCredit }}

  </div>

  <div class="tab-pane fade in" id="action">
  	<button class="btn btn-primary" id="approve">Approve</button>&nbsp;&nbsp;&nbsp;
  	<button class="btn btn-danger" id="reject">Reject</button>
  </div>
</div>







			</div>
		</div>
	</div>


	<script type="text/javascript">

		$(document).ready(function(){


			$("#approve").click(function(){
				var ans = confirm("Are you sure to approve?");
				if(ans == true){
					$.post("{{ URL::route('postTeacherCourseRegistrationApprove') }}", {reg_id:{{ $id }}}, function(response){
									if(response == '1'){
										$("#approve").attr('disabled', true);
										$("#reject").attr('disabled', true);
										alert("Approved successfuly");
									}else{
										alert("Failed to approve");
									}
					});
				}
				
			});


			$("#reject").click(function(){
				var ans = confirm("Are you sure to reject?");
				if(ans == true){
					$.post("{{ URL::route('postTeacherCourseRegistrationReject') }}", {reg_id:{{ $id }}}, function(response){
									if(response == '1'){
										$("#approve").attr('disabled', true);
										$("#reject").attr('disabled', true);
										alert("Rejected successfuly");
									}else{
										alert("Please try again");
									}
					});
				}
			});
		});


	</script>


@stop
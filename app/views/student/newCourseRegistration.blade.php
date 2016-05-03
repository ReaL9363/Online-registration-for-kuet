@extends('layouts.main')

@section('content')
	@include('student.navbar')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Course Registration</h1>
				<hr>
				<div class="row">

					<div class="col-md-7 selected_courses">
						<div class="panel panel-primary">
						  <div class="panel-heading">
						    <h3 class="panel-title">Registration Card</h3>
						  </div>
						  <div class="panel-body">
							<form class="form-horizontal">
							  <fieldset>
							    <div class="form-group form-group-sm">
							      <label for="session" class="col-md-2 control-label">Session</label>
							      <div class="col-md-5">
							        <input type="text" class="form-control" id="session" placeholder="ie. 2011-2012">
							      </div>
							    </div>

							    <div class="form-group form-group-sm">
							      <label for="registration_year" class="col-md-2 control-label">Year</label>
							      <div class="col-md-5">
							        <select name="year" id="registration_year" class="form-control">
							        	<option value="1">First Year</option>
							        	<option value="2">Second Year</option>
							        	<option value="3">Third Year</option>
							        	<option value="4">Fourth Year</option>
							        </select>
							      </div>
							    </div>

							    <div class="form-group form-group-sm">
							      <label for="registration_term" class="col-md-2 control-label">Term</label>
							      <div class="col-md-5">
							        <select name="term" id="registration_term" class="form-control">
							        	<option value="1">1st Term</option>
							        	<option value="2">2nd Term</option>
							        	<option value="backlog">Backlog</option>
							        	<option value="special_backlog">Special Backlog</option>
							        </select>
							      </div>
							    </div>
							  </fieldset>
							</form>


							<table class="table table-striped table-hover selected_course_table">
							  <thead>
							    <tr style="color:#8e44ad">
							      <th>#</th>
							      <th>Course Name</th>
							      <th>Code</th>
							      <th>Credit</th>
							      <th>Remark</th>
							    </tr>
							  </thead>
							  <tbody>
							    
							  </tbody>
							</table>
							<strong style="color:#8e44ad">Total Credit: <span id="totalCredit" style="color:#8e44ad">0.0</span></strong>
							<hr>


							

							<button class="btn btn-success" style="float:right" id="submit">Submit</button>
							<br><br><br>
							<div class="alert alert-dismissible alert-success" id="success_alert">
							  <button type="button" class="close" data-dismiss="alert">&times;</button>
							  Your request has been sent to adviser for approval
							</div>

						  </div>
						</div>
					</div>


					<div class="col-md-5 course_registration">


						<div class="row query_courses_row">
							<div class="col-md-5">
								<label for="year">Select Year</label>
								<select name="year" id="year" class="form-control">
									<option value="1">First Year</option>
									<option value="2">Second Year</option>
									<option value="3">Third Year</option>
									<option value="4">Fourth Year</option>
								</select>
							</div>
							<div class="col-md-5">
								<label for="term">Select Term</label>
								<select name="term" id="term" class="form-control">
									<option value="1">1st</option>
									<option value="2">2nd</option>
								</select>
							</div>
							<div class="col-md-2">
								<br>
								<button class="btn btn-success" id="showCourses">Show</button>
							</div>

						</div>
						<br>

						<div class="available_courses">

						</div>
					</div>

				</div>

			</div>
		</div>
	</div>

	{{ HTML::script('js/student/courseRegistration.js') }}

@stop
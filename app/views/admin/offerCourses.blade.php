@extends('layouts.main')

@section('content')
	@include('admin.navbar')
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 align="center">Offer Course</h2><hr>
				<div class="row">
					<div class="col-md-6">
						<form class="form-horizontal" action="#">
						  <fieldset>
						    <div class="form-group">
						      <label for="batch" class="col-md-2 control-label">Batch</label>
						      <div class="col-md-10">
						        <input type="text" class="form-control" id="batch" placeholder="ie. 2011">
						      </div>
						    </div>

							<div class="form-group">
						      <label for="department" class="col-md-2 control-label">Department</label>
						      <div class="col-md-10">
						        <select name="" id="select_department" class="form-control">
						          <option value="CE">CE</option>
						          <option value="EEE">EEE</option>
						          <option value="ME">ME</option>
						          <option value="CSE">CSE</option>
						          <option value="ECE">ECE</option>
						          <option value="IPE">IPE</option>
						          <option value="LE">LE</option>
						          <option value="TE">TE</option>
						          <option value="BECM">BECM</option>
						          <option value="URP">URP</option>
						          <option value="BME">BME</option>
						        </select>
						      </div>
						    </div>

						    <div class="form-group">
						      <label for="year" class="col-md-2 control-label">Year</label>
						      <div class="col-md-10">
						        <select id="select_year" name="" class="form-control">
						        	<option value="1">First Year</option>
						        	<option value="2">Second Year</option>
						        	<option value="3">Third Year</option>
						        	<option value="4">Fourth Year</option>
						        </select>
						      </div>
						    </div>

						    <div class="form-group">
						      <label for="term" class="col-md-2 control-label">Term</label>
						      <div class="col-md-10">
						        <select name="" id="select_term" class="form-control">
						        	<option value="1">First Term</option>
						        	<option value="2">Second Term</option>
						        </select>
						      </div>
						    </div>
						    <br><br>
							<h3 id="selected_course_title" align="center" style="color:#16a085">Selected Courses</h3><hr>
							<table class="table table-striped table-hover selected_course_table">
							  <thead>
							    <tr style="color:#16a085">
							      <th>Course Name</th>
							      <th>Code</th>
							      <th>Credit</th>
							    </tr>
							  </thead>
							  <tbody>

							  </tbody>
							</table>
							<span style="float:right; color:#16a085">Total: <span id="total_credit">0.0</span> </span>

						    <div class="form-group">
						      <div class="col-md-10 col-md-offset-2">
						        <button type="button" class="btn btn-primary" id="submitButton">Submit</button>
						      </div>
						    </div>
						  </fieldset>
						</form>
					</div>

					<div class="col-md-6 all_courses">
						<div class="checkbox">
				          <label>
				            <input type="checkbox"> <span>MATH 1205</span> - <span style="color:#8e44ad">Mathematics III</span> - <span>3.00</span>
				          </label>
				        </div>
				        <div class="checkbox">
				          <label>
				            <input type="checkbox"> <span>MATH 1205</span> - <span style="color:#8e44ad">Mathematics III</span> - <span>3.00</span>
				          </label>
				        </div>
					</div>

				</div>


			</div>
		</div>
	</div>
	
	{{ HTML::script('js/offerCourse.js') }}

@stop
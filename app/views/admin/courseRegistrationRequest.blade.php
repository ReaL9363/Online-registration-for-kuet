@extends('layouts.main')

@section('content')
	@include('admin.navbar')
	
	<div class="container" ng-app="pendingCourseRegistration" ng-controller="pendingCourseRegistrationController">
		<div class="row">
			<div class="col-md-12">
				<h2 align="center" style="color:#16a085">Pending Course Registration</h2><hr>
			</div>

			<div class="row">

				<div class="col-md-4">
					<ul class="nav nav-pills nav-stacked" style="border:1px solid #e1e1e1">
					  <li ng-click="onDepartmentListClick(department)" class="department_list" ng-repeat="department in departments"><a href="#">@{{ department }}</a></li>
					</ul>
				</div>

				<div class="col-md-8">
					<table class="table table-striped table-hover pendingCourseRegTable" style="display:@{{ registrationRequests.length > 0 ? 'visible' : 'none' }}">
					  <thead>
					    <tr style="color:#16a085">
					      <th ng-click="order('roll')">Roll</th>
					      <th ng-click="order('full_name')">Name</th>
					      <th ng-click="order('batch')">Batch</th>
					      <th ng-click="order('year | year')">Year</th>
					      <th ng-click="order('term | term')">Term</th>
					      <th>Details</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr ng-repeat="reg in registrationRequests | orderBy:orderColumn">
					      <td>@{{ reg.roll }}</td>
					      <td>@{{ reg.full_name }}</td>
					      <td>@{{ reg.batch }}</td>
					      <td>@{{ reg.year | year }}</td>
					      <td>@{{ reg.term | term }}</td>
					      <td><button ng-click="viewRegistrationDetails(reg.roll, reg.id)" class="btn btn-primary" data-toggle="modal" data-target="#details">Details</button></td>
					    </tr>
					  </tbody>
					</table> 
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="details">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title">Roll: <span ng-bind="roll">@{{ roll }}</span></h4>
		      </div>
		      <div class="modal-body">
		        <table class="table table-striped table-hover">
				  <thead>
				    <tr style="color:#16a085">
				      <th>Name</th>
				      <th>Code</th>
				      <th>Credit</th>
				      <th>Remark</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr ng-repeat="course in courses">
				      <td>@{{ course.name }}</td>
				      <td>@{{ course.code }}</td>
				      <td>@{{ course.credit }}</td>
				      <td>@{{ course.remark }}</td>
				    </tr>
				  </tbody>
				</table> 
				Total Theory Courses : <span ng-bind="countCourse.total_theory"></span> <br>
				Total Sessional Courses : <span ng-bind="countCourse.total_sessional"></span> <br>
				Total Credit : <span ng-bind="countCourse.total_credit"></span> <br>
		      </div>
		      <div class="modal-footer">
		        <button id="accept" class="btn btn-success" ng-click="acceptCourseRegistration()">Accept</button>
		        <button class="btn btn-danger" ng-click="rejectCourseRegistration()">Reject</button>
		      </div>
		    </div>
		  </div>
		</div>

	</div>

	<script>
		$("body").on('click', 'li.department_list a', function(e){
			e.preventDefault();
		});
	</script>



	{{ HTML::script('js/admin/pendingCourseRegistration.js') }}
@stop
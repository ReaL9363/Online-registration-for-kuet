@extends('layouts.main')

@section('content')
	@include('admin.navbar')

<div class="container" ng-app="admin" ng-controller="AddTeacherController">
	<div class="row">
		<div class="col-md-6">
			<form id="newTeacherAddForm" class="form-horizontal" action="{{ URL::route('postcreateNewTeacher') }}" method="post">
			  <fieldset>
			    <legend>Create New Teacher</legend>
				<?php

					if(Session::has('error')){ ?>
						<div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  <?php echo Session::get('error'); ?>
						</div>
					<?php }

					if(Session::has('success')){ ?>
						<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  <?php echo Session::get('success'); ?>
						</div>
					<?php }

				?>
			    <div class="form-group">
			      <label for="username" class="col-md-2 control-label">Username</label>
			      <div class="col-md-10">
			        <input ng-change="checkUsername()" type="text" class="form-control" id="username" placeholder="Username" name="username" ng-model="username">
			        <label class="angularError" ng-show="usernameError">Username is already taken</label>
			      </div>
			    </div>
			    <div class="form-group">
			      <label for="password" class="col-md-2 control-label">Password</label>
			      <div class="col-md-10">
			        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
			      </div>
			    </div>

			    <div class="form-group">
			      <div class="col-md-10 col-md-offset-2">
			        <button type="submit" class="btn btn-primary">Create Teacher</button>
			      </div>
			    </div>
			  </fieldset>
			</form>

		</div>
	</div>
</div>

{{ HTML::script('js/validation/AdminAddTeacherValidate.js') }}

@stop
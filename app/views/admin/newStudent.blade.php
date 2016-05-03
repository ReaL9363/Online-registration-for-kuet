@extends('layouts.main')

@section('content')
	@include('admin.navbar')

<div class="container" ng-app="admin" ng-controller="AddStudentFormController">
	<div class="row">
		<div class="col-md-6">
			<form id="addStudentFrom" class="form-horizontal" action="{{ URL::route('postcreateNewStudent') }}" method="post">
			  <fieldset>
			    <legend>Create New Student</legend>
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
			      <label for="roll" class="col-md-2 control-label">Roll</label>
			      <div class="col-md-10">

			        <input ng-change="showAlert()" ng-model="roll" type="text" class="form-control" id="roll" placeholder="Roll" name="roll">
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
			      <label for="department" class="col-md-2 control-label">Department</label>
			      <div class="col-md-10">
					<select class="form-control" id="department" name="department">
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
			      <label for="batch" class="col-md-2 control-label">Batch</label>
			      <div class="col-md-10">
					<input name="batch" type="number" class="form-control" id="batch" placeholder="Batch">
			      </div>
			    </div>
			    <div class="form-group">
			      <div class="col-md-10 col-md-offset-2">
			        <button type="submit" class="btn btn-primary">Create Student</button>
			      </div>
			    </div>
			  </fieldset>
			</form>

		</div>
	</div>
</div>

{{ HTML::script('js/validation/AdminAddStudentValidate.js') }}

@stop
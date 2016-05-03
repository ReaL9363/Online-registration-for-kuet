@extends('layouts.main')
@section('content')
	@include('teacher.navbar')
	<div class="container">
		<div class="row">
			<div class="col-md-5">

				<?php
					$profile = Teacher::getTeachersProfile();

					if(Session::has('success')){ 
				?>
						<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  {{ Session::get('success') }}
						</div>
				<?php  
					}
					if(Session::has('error')) {
				?>
						<div class="alert alert-dismissible alert-danger">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  {{ Session::get('error') }}
						</div>
				<?php
					} 
				?>

				<form id="updateProfileForm" class="form-horizontal" method="post" action="{{ URL::route('postUpdateTeachersProfile') }}" enctype="multipart/form-data">
				  <fieldset>
				    <legend>Update Profile</legend>
				    <div class="form-group">
				      <label for="full_name" class="col-md-3 control-label">Full Name</label>
				      <div class="col-md-9">
				        <input type="text" name="full_name" class="form-control" id="full_name" placeholder="Full Name" {{ $profile->full_name != null ? 'value="'. $profile->full_name .'"' : '' }}>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="email" class="col-md-3 control-label">Email</label>
				      <div class="col-md-9">
				        <input type="email" name="email" class="form-control" id="email" placeholder="Email" {{ $profile->email !== null ? 'value="'. $profile->email .'"' : '' }}>
				      </div>
				    </div>
				    <div class="form-group">
				      <label for="image" class="col-md-3 control-label">Image</label>
				      <div class="col-md-3">
				        <img src="{{ $profile->image != null ? asset($profile->image) : asset('img/gravatar.png') }}" alt="" width="100%">
				      </div>
				      <div class="col-md-6">
				        <input type="file" name="image" class="form-control" id="image">
				      </div>
				    </div>
				    <div class="form-group">
				      <div class="col-md-9 col-md-offset-3">
				        <button type="submit" class="btn btn-primary">Submit</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>

	{{ HTML::script('js/validation/teacherUpdateProfile.js') }}

@stop
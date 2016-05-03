@extends('layouts.main')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<br><br><br><br>
				<h1 style="text-align:center">KUET</h1>
				<hr>
				<form class="form-horizontal" method="post" action="{{ URL::route('postLogin') }}">
				  <fieldset>
				    <legend>Login</legend>
					<?php
					if(Session::has('logout_msg')){ ?>
						<div class="alert alert-dismissible alert-success">
						  <button type="button" class="close" data-dismiss="alert">×</button>
						  <?php echo Session::get('logout_msg') ?>
						</div>
					<?php }
					?>
				    <div class="form-group">
				      <label for="inputUsername" class="col-md-2 control-label">Username</label>
				      <div class="col-md-10{{ Session::has('username_error') ? ' has-error' : '' }}">
				        <input type="text" class="form-control" id="inputUsername" placeholder="Username" name="username"{{ Input::has('username') ? ' value="'. Input::get('username').'"' : '' }}><span class="text-danger">{{ Session::has('username_error') ? Session::get('username_error') : '' }}</span>
				      </div>
				    </div>
					
					<div class="form-group{{ Session::has('password_error') ? ' has-error' : '' }}">
				      <label for="inputPassword" class="col-md-2 control-label">Password</label>
				      <div class="col-md-10">
				        <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Password"><span class="text-danger">{{ Session::has('password_error') ? Session::get('password_error') : '' }}</span>
				      </div>
				    </div>

				    <div class="form-group">
				      <div class="col-md-3 col-md-offset-9">
				        <button type="submit" class="btn btn-primary">Submit</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
@stop
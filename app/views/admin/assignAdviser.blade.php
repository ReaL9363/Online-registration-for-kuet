@extends('layouts.main')

@section('content')
	@include('admin.navbar')

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<form class="form-horizontal" action="{{ URL::route('postAssignAdviser') }}" method="post">
			  <fieldset>
			    <legend>Assign Adviser</legend>
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
			      <label for="student" class="col-md-2 control-label">Select Student</label>
			      <div class="col-md-10">
					<select class="form-control" id="student" name="student">
						<?php
							$students = DB::table('students')->get();
							foreach ($students as $student) {
								echo '<option value="'. $student->id .'">'. $student->roll .'</option>';
							}
						?>

			        </select>
			      </div>
			    </div>

			    <div class="form-group">
			      <label for="adviser" class="col-md-2 control-label">Select Adviser</label>
			      <div class="col-md-10">
					<select class="form-control" id="adviser" name="adviser">
						<?php
							$teachers = DB::table('teachers')->get();
							foreach ($teachers as $teacher) {
								if($teacher->full_name){
									echo '<option value="'. $teacher->id .'">'. $teacher->full_name .'</option>';
								}else{
									$user = DB::table('users')->where('id', $teacher->user_id)->first();
									echo '<option value="'. $teacher->id .'">'. $user->username .'</option>';
								}
								
							}
						?>
			        </select>
			      </div>
			    </div>

			    <div class="form-group">
			      <div class="col-md-10 col-md-offset-2">
			        <button type="submit" class="btn btn-primary">Assign Adviser</button>
			      </div>
			    </div>
			  </fieldset>
			</form>

		</div>
	</div>
</div>

@stop
@extends('layouts.main')

@section('content')
	@include('student.navbar')
	
	<div class="container">
		<div class="row">

			<div class="col-md-8 col-md-offset-2">
				<h1>Notifications</h1>
				<div class="list-group">
					<?php
						$messages = DB::table('messages')->where('user_id', Session::get('user_id'))->orderBy('id', 'desc')->get();
						foreach ($messages as $message) {
							if($message->seen == 1) $seenClass = "";
							else $seenClass = " active";
							echo '<a href="#" class="list-group-item'. $seenClass .'">'. $message->message .'
				  </a>';
						}

						DB::table('messages')->where('user_id', Session::get('user_id'))->update(array('seen'=>1));


					?>
				</div>
			</div>
		</div>
	</div>

	


@stop
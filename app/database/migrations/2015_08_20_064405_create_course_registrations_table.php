<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('course_registrations', function($t){
			$t->bigIncrements('id');
			$t->bigInteger('student_id');
			$t->string('year');
			$t->string('term');
			$t->string('session');
			$t->text('courses');
			$t->string('course_registration_status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('course_registrations');
	}

}

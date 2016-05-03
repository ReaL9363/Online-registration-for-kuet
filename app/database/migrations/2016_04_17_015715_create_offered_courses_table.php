<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferedCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('offered_courses', function($t){
					$t->increments('id');
					$t->string('batch');
					$t->string('department');
					$t->string('year');
					$t->string('term');
					$t->text('courses');
					$t->dateTime('deadline');
				});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('offered_courses');
	}

}

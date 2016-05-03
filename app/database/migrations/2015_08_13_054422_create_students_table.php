<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function($t){
			$t->bigIncrements('id');
			$t->string('full_name')->nullable();
			$t->string('email')->nullable();
			$t->string('roll');
			$t->string('department')->nullable();
			$t->string('batch')->nullable();
			$t->bigInteger('adviser_id')->nullable();
			$t->string('image')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('students');
	}

}

<?php

class CourseTableSeeder extends Seeder{
	public function run(){
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 1101',
				'name'	=>	'Computer Basics and Programming',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 1102',
				'name'	=>	'Computer Basics and Programming Laboratory',
				'credit'=>	'1.50'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'MATH 1107',
				'name'	=>	'Mathematics-I',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'EEE 1107',
				'name'	=>	'Basic Electrical Engineering',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'EEE 1108',
				'name'	=>	'Basic Electrical Engineering Laboratory',
				'credit'=>	'1.50'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'HUM 1107',
				'name'	=>	'English and Human Communication',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'PHY 1107',
				'name'	=>	'Physics',
				'credit'=>	'4.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'PHY 1108',
				'name'	=>	'Physics Laboratory',
				'credit'=>	'1.50'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 1201',
				'name'	=>	'Object Oriented Programming',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 1207',
				'name'	=>	'Discrete Mathematics',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CHEM 1207',
				'name'	=>	'Chemistry',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 2100',
				'name'	=>	'Software Development Project-I',
				'credit'=>	'0.75'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 2101',
				'name'	=>	'Data Structures and Algorithms',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 2103',
				'name'	=>	'Digital Logic Design',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'HUM 2107',
				'name'	=>	'Economics and Accounting',
				'credit'=>	'4.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 2200',
				'name'	=>	'Internet Programming Laboratory',
				'credit'=>	'1.50'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'ECE 3115',
				'name'	=>	'Data Communication',
				'credit'=>	'3.00'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 3202',
				'name'	=>	'Operating Systems Laboratory',
				'credit'=>	'1.50'
			));
		DB::table('courses')->insert(array(
				'code'	=>	'CSE 3211',
				'name'	=>	'Compiler Design',
				'credit'=>	'3.00'
			));

	}
}
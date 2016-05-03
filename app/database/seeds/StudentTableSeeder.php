<?php

class StudentTableSeeder extends Seeder{
	public function run(){
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'1107001',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'student'
			));
		DB::table('students')->insert(array(
				'roll'			=>	'1107001',
				'department'	=>	'CSE',
				'batch'			=>	'2011',
				'adviser_id'	=>	1
			));
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'1107002',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'student'
			));
		DB::table('students')->insert(array(
				'roll'			=>	'1107002',
				'department'	=>	'CSE',
				'batch'			=>	'2011',
				'adviser_id'	=>	1
			));
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'1107003',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'student'
			));
		DB::table('students')->insert(array(
				'roll'			=>	'1107003',
				'department'	=>	'CSE',
				'batch'			=>	'2011',
				'adviser_id'	=>	1
			));
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'1107004',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'student'
			));
		DB::table('students')->insert(array(
				'roll'			=>	'1107004',
				'department'	=>	'CSE',
				'batch'			=>	'2011',
				'adviser_id'	=>	1
			));
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'1107005',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'student'
			));
		DB::table('students')->insert(array(
				'roll'			=>	'1107005',
				'department'	=>	'CSE',
				'batch'			=>	'2011',
				'adviser_id'	=>	2
			));
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'1107006',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'student'
			));
		DB::table('students')->insert(array(
				'roll'			=>	'1107006',
				'department'	=>	'CSE',
				'batch'			=>	'2011',
				'adviser_id'	=>	2
			));
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'1107007',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'student'
			));
		DB::table('students')->insert(array(
				'roll'			=>	'1107007',
				'department'	=>	'CSE',
				'batch'			=>	'2011',
				'adviser_id'	=>	2
			));
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'1107008',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'student'
			));
		DB::table('students')->insert(array(
				'roll'			=>	'1107008',
				'department'	=>	'CSE',
				'batch'			=>	'2011',
				'adviser_id'	=>	2
			));
	}
}
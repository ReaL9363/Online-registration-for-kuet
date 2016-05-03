<?php
class TeacherTableSeeder extends Seeder{
	public function run(){
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'nawaz_sir',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'teacher'
			));
		DB::table('teachers')->insert(array(
				'user_id'	=>	'nawaz_sir',
				'full_name'	=>	'Dr Nawaz sir',
				'user_id'	=>	$id
			));

		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'hashem_sir',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'teacher'
			));
		DB::table('teachers')->insert(array(
				'user_id'	=>	'hashem_sir',
				'full_name'	=>	'Dr Hashem sir',
				'user_id'	=>	$id
			));
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'azhar_sir',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'teacher'
			));
		DB::table('teachers')->insert(array(
				'user_id'	=>	'azhar_sir',
				'full_name'	=>	'Dr Azhar sir',
				'user_id'	=>	$id
			));
		$id = DB::table('users')->insertGetId(array(
				'username'	=>	'akand_sir',
				'password'	=>	Hash::make('1234'),
				'usertype'	=>	'teacher'
			));
		DB::table('teachers')->insert(array(
				'user_id'	=>	'akand_sir',
				'full_name'	=>	'Dr Akand sir',
				'user_id'	=>	$id
			));

	}
}
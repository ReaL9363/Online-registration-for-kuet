<?php
class Student{
	public static function getStudentProfile($id){
		$user = DB::table('users')->where('id', $id)->first()->username;
		return DB::table('students')->where('roll', $user)->first();
	}	
}
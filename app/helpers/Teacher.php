<?php

class Teacher{
	public static function getTeachersProfile(){
		$user_id = Session::get('user_id');
		return DB::table('teachers')->where('user_id', $user_id)->first();
	}
}
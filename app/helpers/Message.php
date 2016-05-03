<?php

class Message{
	public static function sendMessage($user_id, $message){
		DB::table('messages')->insert(array(
				'user_id'	=>	$user_id,
				'message'	=>	$message,
				'seen'		=>	0
			));
	}
}
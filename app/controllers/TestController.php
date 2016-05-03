<?php

class TestController extends BaseController{
	public function sendMail(){
		/*$data = array();
		Mail::queue('emails.courseRegistration', array('name'	=>	'Mahmud'), function($message)
		{
		    $message->to('mahmudkuet11@gmail.com', 'Raju vai')->subject('Welcome!');
		});
		return 1;*/

		$a = array(
				array('full_name'=>'mahmud','email'=>'fd3cd726@opayq.com'),
				array('full_name'=>'raju','email'=>'fffaf9e4@opayq.com'),
				array('full_name'=>'mamun','email'=>'ffde03cb@opayq.com')
			);
			foreach ($a as $b) {
				Mail::queue('emails.courseRegistration', array('name'	=>	$b['full_name']), function($message) use ($b)
				{
				    $message->to($b['email'], $b['full_name'])->subject('Welcome3!');
				});
			}
	}
}
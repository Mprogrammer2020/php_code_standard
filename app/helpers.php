<?php
use Mail; 

function emailSend($postData){ 
	try{
		$email =  Mail::send([], $postData, function($message) use ($postData) {

			$message->to($postData['email'])
			        ->subject("Reset Password by admin-demo"); 
			$message->setbody($postData['token']);
			$message->from('amanst33@yopmail.com');
		}); 
		if($email){
			return false;
		}else {
			return true;
		}
	}catch(\Execption $e){
        $response['status'] = false;
        $response['message'] = $e->getMessage();
    }
	
}
 

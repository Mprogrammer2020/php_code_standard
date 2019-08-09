<?php

function emailSend($postData){ 
	$response['status'] = false;
    
	try{
		$email =  Mail::send($postData['layout'], $postData, function($message) use ($postData) {

			$message->to($postData['email'])
			        ->subject($postData['subject']); 
			//$message->setbody($postData['token']);
			$message->from(FROM_EMAIL_ADDRESS);
		}); 
			
		$response['message'] = "Mail sent successully.";
		return $response;
	}catch(\Execption $e){
        $response['status'] = false;
        $response['message'] = $e->getMessage();
    	return $response;
    }
}
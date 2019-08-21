 
<?php
	// This function use  for email send 
	function emailSend($postData){ 
	    
		try{
			$email =  Mail::send($postData['layout'], $postData, function($message) use ($postData) {

				$message->to($postData['email'])
				        ->subject($postData['subject']); 
				//$message->setbody($postData['token']);
				$message->from(FROM_EMAIL_ADDRESS);
			}); 
				
			$response['status'] = true;
			$response['message'] = "Mail sent successully.";
			return $response;
		}catch(\Execption $e){
	        $response['status'] = false;
	        $response['message'] = $e->getMessage();
	    	return $response;
	    }
	}

	// UPLOAD IMAGES FOR USER
	function UploadImage($file, $destinationPath) {
		try{
		    $imgName = $name = time()."_". $file->getClientOriginalName();
		    $file->move($destinationPath, $imgName);
		    return $path = $destinationPath . '/' . $imgName;
		}catch (\Execption $e) {
			 $response['status'] = false;
	         $response['message'] = $e->getMessage()->withInput();
	         return $response;
	    }
	}

	// GET THE NUMBER OF ROWS
	function view_limit()  {
		return  [ '5' => '5',
				'10' => '10',
				'25' => '25',  
				'50' => '50',  
				'100' => '100',  
				'200' => '200',  
				'500' => '500'
				];        
    }
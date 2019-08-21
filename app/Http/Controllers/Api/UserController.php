<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
use Validator;
use Auth;
use Hash;

class UserController extends Controller
{
    public $uploadUserProfilePath = 'public/images/users';

    // LIST OF USERS
    public function Allusers() {
        $response['status'] = false;
        $response['message'] = "No User found.";
		$data = Users::users(); 
    	if($data){
    	 	$response['status'] = true;
    		$response['message'] = 'Users found.';
            $response['data'] = $data;
    	} 
		return response()->json($response);
    }

    // USER VIEW
    public function showProfile(Request $request) {

    	$response['status'] = false;   	
        $response['message'] = 'User not found.';
        $validator = Validator::make($request->all(), [
                'id' => 'required'
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        } 

      	$data = Users::userDetail($request->id);
    	if($data){    		
    		$response['status'] = true;
            $response['message'] = 'User found.';
    		$response['data'] = $data;
    	}
    	return response()->json($response);
    }

    // USER DELETE
    public function deleteUser(Request $request) {

    	$response['status'] = false;
        $response['message'] = "Something went wrong.";    	
        $data = Users::userDelete(Auth::id());
        if($data){
    	 	$response['status'] = true;
    		$response['message'] = 'User deleted successfully.';
    	}
    	return response()->json($response);
    }

    // NEW USER REGISTER
    public  function register(Request $request) {

        $response['status'] = false;
        $response['message'] = "Something went wrong.";
        $postData = $request->all();        
        $validator = Validator::make($postData, [
                'name' => 'required',
                'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
                'password' => 'required|min:6',
                'phone'=>'required',
                'user_type'=> 'required|in:2',
        ]);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        // move file uploaded         
        if (isset($postData['profile_pic'])) {
            $postData['profile_pic'] = UploadImage($postData['profile_pic'],$this->uploadUserProfilePath);
         } 
        $postData['created_at'] = date('Y-m-d h:i:s');
        $postData['password'] = Hash::make($postData['password']);
        // Save in database         
        $data = Users::addUser($postData);
        if($data){
            $response['status'] = true;
            $response['message'] = 'User registered successfully.'; 
        } 
        return response()->json($response);
    }

    // LOGIN USER
    public function login(Request $request) {

        $response['status'] = false;
        $response['message'] = "Email and password does not match";
        $postData = $request->all();
        $validator = Validator::make($postData, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);       
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('My App')->accessToken;         
           
            $response['status'] = true; 
            $response['data'] = Users::userDetail(Auth::id());         
            $response['login_token'] = $token;         
             $response['message'] = "User login successfully.";
                
        }
        return response()->json($response);
    }

    // LOGOUT USER
    function logout(Request $request) {

        if (Auth::check()) {
           Auth::user()->token()->revoke();
           $response['status'] = true;
           $response['message'] = 'User logout Successfully.';
           return response()->json($response); 
        }
       
    }

    // USER PROFILE UPDATE
    function profileUpdate(Request $request) {

        $response['status'] = false;
        $response['message'] = 'Something went wrong.'; 
        $postData = $request->all();
        $postData['id'] = Auth::id();

        $validator = Validator::make($postData, [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$postData['id'],
                'phone_no'=>'required',
        ]);
        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        // Uploade Image for user
        if(isset($postData['profile_pic'])) {   
            $postData['profile_pic'] = Users::upload_profile($postData['profile_pic'], $this->uploadUserProfilePath); 
        }
        // save in database    
        $data = Users::updateuser($postData);   
         if($data){
            $response['status'] = true;
            $response['message'] = 'User updated successfully.'; 
        }
        return response()->json($response);    
    }

    // CHANGE PASSWORD
    public function changePassword(Request $request) { 

        $response['status'] = false;
        $response['message'] = 'Something went wrong!'; 
        $postData = $request->all();
        $validator = Validator::make($postData,[
            'old_password' => 'required|min:6',
            'new_password' => 'required|string|min:6',
            'confirm_password'=>'required|min:6|same:new_password' 
        ]);

        if ($validator->fails()) { 
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        $postData['id'] = Auth::id();
        $user = Users::find($postData['id']);
        if (!(Hash::check($request->get('old_password'), $user->password))) {
            $response['message'] = "Old password doesn't matched";
            return response()->json($response);
        }
        
        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            $response['message'] ='You have already used this password!';
            return response()->json($response);
        }      

        $postData['password'] = Hash::make($request->get('new_password'));
        $changePassword = Users::changePassword($postData);        
        if($changePassword){
            $response['status'] = true;
            $response['message'] = 'Password Changed Successfully.'; 
        }

        return response()->json($response);        
    }


    // FORGET PASSWORD STEP-1 API
    public function resetPasswordMail(Request $request) {
        $response['status'] = false;
      
        $postData = $request->all();
        $validator = Validator::make($postData, [
            'email' => 'email|required', 
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        $user = Users::where('email', $postData['email'])->first();

        if($user){            
            $postData['token'] = rand(1,999999); 
            $user->token = $postData['token'];

            if($user->save()) { 
                $postData['subject'] = "Reset Password by admin-demo"; 
                $postData['layout'] = 'email_templates.reset_password'; 
                $mail = emailSend($postData);

                if($mail['status']){
                    $response['status'] = true;
                    $response['message'] = 'Reset password email sent successfully on your email account.';
                } else {
                    $response['message']  = $mail['message'];
                }
            }            
        } else {
            $response['message'] = "Email address doesn't exist!"; 
        }

        return response()->json($response);
    }    
     
    //FORGET PASSWORD STEP-2 API
    function verifyPasswordtoken(Request $request) {

        $response['status'] = false;
        $postData = $request->all();
          $validator = Validator::make($postData, [ 
            'token' => 'required',
            'email' => 'required|email',
            'new_password' => 'required|string|min:6',
            'confirm_password'=>'required|min:6|same:new_password' 
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        $user = Users::where('email', $postData['email'])->first(); 

        if($postData['token'] == $user['token']) {

            $user['password'] = Hash::make($postData['new_password']);
            $data = Users::changePassword($user);
            if($data){ 
                $response['message'] = 'Your Password Reset Successfully';
            } else { 
                $response['message'] = 'Somthing went worng!';
            }
        } else {            
            $response['message'] = 'Your OTP is expired.';
        }
        return response()->json($response);
    }

}

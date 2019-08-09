<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Redirect;
use App\Models\Users;
use Hash;
use Mail;

class UserController extends Controller
{
    public $uploadUserProfilePath = 'public/images/users';

    // Get All Users for Admin
    public function Allusers() {
    	 
		$data = Users::Allusers(); 
    	if($data){
    	 	$response['status'] = true;
    		$response['message'] = $data;
    	}else{
    	 	$response['status'] = false;
    	 	$response['message'] = "No have users";
    	}
		return response()->json($response);
    }

    // Admin Profile Update
    public function MyProfile(Request $request) {

    	$response['status'] = false;
    	$postData = $request->all();
        $user_id = Auth::id();
    	$validator = Validator::make($postData, [
                'name' => 'required',
                'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL'.$user_id,
                'phone_no' => 'required'
        ]);

        if ($validator->fails()) {
        	$response['message'] = $validator->errors()->first();
            return response()->json($response);
        } 
        $postData['id'] = $user_id;
    	$data = Users::ProfileUpdate($postData);
    	if($data){
    	 	$response['status'] = true;
    		$response['message'] = 'Profile Updated Successfull';
    	}else{ 
    	 	$response['message'] = "Try again!";
    	}
    	return response()->json($response);
    }

    // View User 
    public function viewUser(Request $request) {

    	$response['status'] = false;
    	$postData = $request->all();
    	$validator = Validator::make($postData, [
    		//'id' => 'required',
    	]);
    	if ($validator->fails()) {
        	$response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        $user_id = Auth::id(); 
    	$data = Users::userDetail($user_id);
    	if($data){
    		$user['name'] = $data->name;
    		$user['email'] = $data->email;
    		$user['phone'] = $data->phone;
    		$response['status'] = true;
    		$response['data'] = $user;
    	}else{
    		
    		$response['message'] = 'User dose not exits';
    	}
    	return response()->json($response);
    }

    // Delete User 
    public function deleteUser(Request $request) {

    	$response['status'] = false;
    	$postData = $request->all();
    	$validator = Validator::make($postData, [
    		//'id' => 'required',
    	]);
    	if ($validator->fails()) {
        	$response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
         
        $data = Users::userDelete(Auth::id());
        if($data){
    	 	$response['status'] = true;
    		$response['message'] = 'User Deleted Successfull';
    	}else{ 
    	 	$response['message'] = "Try again!";
    	}
    	return response()->json($response);
    }

    // New User Registeration
    public  function register(Request $request) {

        $response['status'] = false;
        $response['message'] = "Something went wrong!";
        $postData = $request->all();
        
        $validator = Validator::make($postData, [
                'name' => 'required',
                'email' => 'required|unique:users,email,NULL,id,deleted_at,NULL',
                'password' => 'required|min:6',
                'phone'=>'required',
                'user_type'=> 'required',
        ]);

        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        // move file uploaded
        if(isset($postData['profile_pic'])){
            if ($request->hasFile('profile_pic')) {
                if($request->file('profile_pic')->isValid()) {
                    try {
                        $file = $request->file('profile_pic');
                        $profile_name = time() . '.' . $file->getClientOriginalExtension();
                        $request->file('profile_pic')->move("public/images/users/", $profile_name);
                    } catch (Illuminate\Filesystem\FileNotFoundException  $e) {
                         $response['message'] = $e->getMessage()->withInput();
                          return response()->json($response);
                    }
                }
            }
            $postData['profile_pic'] = $profile_name;
        }
       
        $postData['created_at'] = date('Y-m-d h:i:s');
        $postData['password'] = Hash::make($postData['password']);
        // Save in database         
        $data = Users::insert($postData);
        if($data){
            $response['status'] = true;
            $response['message'] = 'User registered successfully.'; 
        } 
        return response()->json($response);
    }

    // Login for user
    public function login(Request $request) {

        $response['status'] = false;
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
            $response['status'] = true;
            $response['data'] = $user->createToken('My App')->accessToken;         
            return response()->json($response);
        }

        return response()->json(['status' => false,'message'=>"Email Id and password dose not match"]);
    }

    // Logout for users 
    function logout(Request $request) {

        if (Auth::check()) {
           Auth::user()->token()->revoke();
           $response['status'] = true;
           $response['message'] = 'Logged out Successfully';
           return response()->json($response); 
        }
       
    }

    // Profile update  for user
    function profileUpdate(Request $request) {

        $response['status'] = false;

        $postData = $request->all();
        $user_id = Auth::id();
        $validator = Validator::make($postData, [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$user_id,
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
        $postData['id'] = $user_id;
        $data = Users::updateuser($postData);   
         if($data){
            $response['status'] = true;
            $response['message'] = 'User Updated Successfull'; 
        } else {
            $response['message'] = 'Something went wrong ! Try again'; 
        }
        return response()->json($response);    
    }

    // Change Password 
    public function changePassword(Request $request) { 

        $response['status'] = false;
        $response['message'] = 'Something went wrong! Try again'; 
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

        $data = Users::userDetail($postData['id']);

        if (!(Hash::check($request->get('old_password'), $data->password))) {
            $response['message'] = 'Current password does not match';
            return response()->json($response);
        }
        
        if(strcmp($request->get('old_password'), $request->get('new_password')) == 0){
            $response['message'] ='New Password cannot be same as your current password';
            return response()->json($response);
        }

        

        $postData['password'] = Hash::make($request->get('new_password'));
        $data = Users::changePassword($postData);
        
        if($data){
            $response['status'] = true;
            $response['message'] = 'Password Changed Successfully.'; 
        }

        return response()->json($response);        
    }


    //Forgot Password Step 1 API
    public function createToken(Request $request) {
        $response['status'] = false;
        $response['message'] = 'Something went wrong!';

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
        }

        return response()->json($response);
    }    
     
    //Forgot Password Step 2 API 
    function verifytoken(Request $request) {

        $response['status'] = false;
        $postData = $request->all();
          $validator = Validator::make($postData, [ 
            'old_password' => 'required',
            'new_password' => 'required|string|min:6',
            'confirm_password'=>'required|min:6|same:new_password' 
        ]);


        if ($validator->fails()) {
            $response['message'] = $validator->errors()->first();
            return response()->json($response);
        }

        $user = Users::where('email', $postData['email'])->first(); 
        if($postData['old_password'] == $user['token']) {

            $user['password'] = Hash::make($postData['new_password']);
            $data = Users::changePassword($user);
            if($data){ 
                $response['message'] = 'Your Password Reset Successfully';
            } else { 
                $response['message'] = 'Somthing went worng!';
            }
        } else {
            
            $response['message'] = 'Your OTP is expired';
        }
        return response()->json($response);
    }

}

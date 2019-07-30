<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Redirect;
use App\Models\Users;

class AdminController extends Controller
{
    function login(Request $request) { 

        $response['status'] = false;
    	$validator = Validator::make($request->all(), [
                'email' => 'email|required',
                'password' => 'required',
        ]);

        if ($validator->fails()) {
        	$response['message'] = $validator->errors()->first();
            return response()->json($response);
        } 
        $userDetail = [ 'email' => $request->email , 'password' => $request->password ];
        if (Auth::attempt($userDetail)) {
        	$response['status'] = true;
			$response['message'] = "Login Successfull";
        } else {
			$response['message'] = "Email id and password dose not match!";
        }
        return response()->json($response);
    }

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

    public function MyProfile(Request $request) {

    	$response['status'] = false;
    	$postData = $request->all();
    	$validator = Validator::make($postData, [
                'name' => 'required',
                'email' => 'email|required',
                'phone' => 'required'
        ]);

        if ($validator->fails()) {
        	$response['message'] = $validator->errors()->first();
            return response()->json($response);
        } 

    	$data = Users::ProfileUpdate($postData);
    	if($data){
    	 	$response['status'] = true;
    		$response['message'] = 'Profile Updated Successfull';
    	}else{ 
    	 	$response['message'] = "Try again!";
    	}
    	return response()->json($response);
    }

    public function viewUser(Request $request)
    {
    	$response['status'] = false;
    	$postData = $request->all();
    	$validator = Validator::make($postData, [
    		'id' => 'required',
    	]);
    	if ($validator->fails()) {
        	$response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
    	$data = Users::userDetail($postData['id']);
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

    public function deleteUser(Request $request)
    {
    	$response['status'] = false;
    	$postData = $request->all();
    	$validator = Validator::make($postData, [
    		'id' => 'required',
    	]);
    	if ($validator->fails()) {
        	$response['message'] = $validator->errors()->first();
            return response()->json($response);
        }
        $data = Users::userDelete($postData['id']);
        if($data){
    	 	$response['status'] = true;
    		$response['message'] = 'User Deleted Successfull';
    	}else{ 
    	 	$response['message'] = "Try again!";
    	}
    	return response()->json($response);
    }
}

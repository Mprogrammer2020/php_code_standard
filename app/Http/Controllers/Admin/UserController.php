<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Session;
use Auth;
use Redirect;
use App\Models\Users;

class UserController extends Controller
{
    public function index()
    {
    	return view('admin.user.login');
    }

    public function checkLogin(Request $request)
    {
        if ($request->isMethod('post')) { 
            $validator = Validator::make($request->all(), [
                'email' => 'email|required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect::back()
                            ->withErrors($validator)
                            ->withInput();
            } 
            $userDetail = [ 'email' => $request->email , 'password' => $request->password ];
            if (Auth::attempt($userDetail)) {
            		$user_name = Auth::user()->name;
            		Session::put('user_name', $user_name );
                   return redirect()->route('admin.userlist');               
            } else {

                Session::flash ( 'message', "Invalid Credentials , Please try again." );
                Session::flash('alert-class', 'alert-danger'); 
                return Redirect::back ();
            }
        }
    }

    public function logout(Redirect $request){
    	Session::flush ();
        Auth::logout ();
        return Redirect()->route('user.login');
    }

    public function adminview(){ 
    	return view('admin.dashboard.view');
    }

    public function userView($id)
    {
    	$data['data'] = Users::userDetail($id);
    	//echo "<pre>";print_r($data);die();
    	return view('admin.user.view',$data);
    }
    public function update(Request $request)
    {
    	$postData = $request->all(); 
    	$validator = Validator::make($postData, [
            'name' => 'required',
            'email' => 'required',
            'phone_no' => 'required',
        ]);
    	if ($validator->fails()) {
            return redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }
        $postData['id'] = Auth::id();
        $data = Users::ProfileUpdate($postData);
        if($data){
        	Session::flash ( 'message', "Your Profile Updated Successfully" );
        	return redirect()->back();
        }
    }

    public function Allusers(){
    	 $data['CountallUsers'] = Users::countAllUsers();
         $data['allusers'] = Users::Allusers();
    	 return view('admin.dashboard.index',$data);
    }

    public function deleteuser($id){
    	 $data = Users::userDelete($id);
    	 if($data){
    	 	Session::flash ( 'message', "User deleted Successfully" );
        	return redirect('admin/allusers');
    	 }
    }

    public function userEdit($id)
    {
    	$data['user'] = Users::userDetail($id);    
    	return view('admin.user.edituser',$data);
    }

    public function upateuser(Request $request){
    	$postData = $request->all();
    	$id =$_GET['id'];
    	 
    	$validator = Validator::make($postData, [
                'name' => 'required',
                'email' => 'required',
                'phone_no'=>'required',
        ]);
        if ($validator->fails()) {
            return redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        } 
        $postData['id'] = $id;
        $data = Users::updateuser($postData);
        if ($data) {
        	Session::flash ( 'message', "User Updated Successfully" );
        	return redirect('admin/allusers');
        }
    }
}

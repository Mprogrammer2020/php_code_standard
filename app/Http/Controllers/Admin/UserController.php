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
    public $uploadUserPath ='public/images/users';
    public function index()
    {
    	return view('common.login');
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
            		return redirect()->route('dashboard');               
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
    	return view('admin.profile.edit_profile');
    }

    public function userView($id)
    {
    	$data['data'] = Users::userDetail($id);
    	return view('admin.user.view',$data);
    }
    public function update(Request $request)
    {
    	$postData = $request->all(); 
    	$validator = Validator::make($postData, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id.',id,deleted_at,NULL',
            'phone_no' => 'required:numeric',
        ]);
    	if ($validator->fails()) {
            return redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }
        if(isset($postData['user_img'])) {   
            $postData['profile_pic'] = Users::upload_profile($postData['user_img'], $this->uploadUserPath);
        }  
        $postData['id'] = Auth::id();
        $data = Users::ProfileUpdate($postData);
        if($data){
        	Session::flash ( 'message', "Your Profile Updated Successfully" );
        	return redirect()->back();
        }
    }

    public function Allusers(Request $request){
    	$finalViewArray = [];
        $reqArray['search'] = $request->search;
        $reqArray['per_page_limit'] = ($request->limit) ?? TABLE_PAGINATE_LIMIT;
        $finalViewArray['allusers'] = Users::Allusers($reqArray);
        $finalViewArray['view_limit'] = view_limit($reqArray);
        $finalViewArray['search'] = $reqArray['search'];      
        $finalViewArray['per_page_limit']  = $reqArray['per_page_limit']; 
        
        if($request->ajax()){
            return view('admin.user.search_index',['finalViewArray' => $finalViewArray]);
        } 
    	return view('admin.user.index',['finalViewArray' => $finalViewArray]);
    }

    public function deleteuser($id){
        $response['status'] = false;
        $response['message'] = 'Something went wrong.';
    	$data = Users::userDelete($id);
    	 if($data){
    	 	$response['status'] = true;
            $response['message'] = 'User deleted successfully.';
    	 }
        return response()->json($response);
    }

    public function userEdit($id)
    {
    	$data['user'] = Users::userDetail($id);  
        if($data['user'])  {
    	   return view('admin.user.edituser',$data);
        } 
        return Redirect::route('admin.userlist');
    }

    public function upateuser(Request $request){
    	$postData = $request->all();
    
    	$validator = Validator::make($postData, [
                'name' => 'required',
                'email' => 'required',
                'phone_no'=>'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        } 
       
    	
        $data = Users::updateuser($postData);
        if ($data) {
        	Session::flash ( 'message', "User Updated Successfully" );
        	return redirect()->route('admin.userlist');
        }
    }
    
    // Change Password 
    public function changePassword(Request $request) {       
        $user = Auth()->user();
        $validator = Validator::make($request->all(), [
            'new_password' => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
            'old_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!\Hash::check($value, $user->password)) {
                    return $fail(__('The Old password is incorrect.'));
                }
            }]
        ]);

        if ($validator->fails()) {
            return redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $user->password = \Hash::make($request->post('new_password'));
        if($user->save()) {
            Session::flash ( 'message', "Your password changed successfully.");
            Session::flash('alert-class', 'alert-success'); 
        } else {
            Session::flash ( 'message', "Something went wrong , Please try again." );
            Session::flash('alert-class', 'alert-danger'); 
        } 
        return redirect()->back();
    
    }
}

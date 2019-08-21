<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use SoftDeletes;

    // Update profile for admin
    public static function ProfileUpdate($data){
    	$user = Users::find($data['id']);
    	$user->name = $data['name'];
    	$user->email = $data['email'];
    	$user->phone = $data['phone_no'];
        if(isset($data['profile_pic'])) {
            $user->profile_pic = $data['profile_pic'];
        }
    	return $user->save();
    }
    public static function addUser($data){
        $user = new Users();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];
        $user->phone = $data['phone'];
        $user->created_at = $data['created_at'];
        $user->user_type = $data['user_type'];
        if(isset($data['profile_pic'])) {
            $user->profile_pic = $data['profile_pic'];
        }
        return $user->save();
    }
    // LIST OF USERS
    public static function Allusers($data=null){
    	$query = Users::select('users.id','users.name',
                            'users.email','users.phone','users.created_at')
                        ->where('user_type',USER_TYPE);

        if(isset($data['search'])){
            $query->where('name', 'like', '%'. $data['search']. '%');
        }
        return $query->orderBy('users.id', 'DESC')
                    ->paginate($data['per_page_limit']);
    }

    // LIST OF USERS API
    public static function users(){
        $query = Users::select('users.id','users.name','users.email',
                                'users.phone','users.created_at')
                        ->where('user_type',USER_TYPE);            
        return $query->orderBy('users.id', 'DESC')->get();
    }

    /* NUMBER OF COUNT USERS */
    public static function countAllUsers(){
        return $data = Users::where('user_type',USER_TYPE)->get()->count();
    }

    /* USER DELETED */
    public static function userDelete($id){
    	$user = Users::find($id);
    	return $user->delete();
    }

    /* USER VIEW */
    public static function userDetail($id){
    	return Users::select('id','name','email','user_type','profile_pic',
                            'phone','device_type','device_token','created_at','updated_at')
                    ->where('id',$id)
                    ->first();
    }

    /* USER UPDATE  */
    public static function updateuser($data){ 
    	$user = Users::find($data['id']);
        if($user) {
        	$user->name = $data['name'];
        	$user->email = $data['email'];
            $user->phone = $data['phone_no'];

                if(isset($data['profile_pic'])){
                    $user->profile_pic = $data['profile_pic'];
                }
    	
    	   return $user->save();
        }
    }

    /*UPLOAD IMAGES OF USERS */
    public static function upload_profile($file, $destinationPath) {

        $imgName = $name = time()."_". $file->getClientOriginalName();
        $file->move($destinationPath, $imgName);
        return $path = $destinationPath . '/' . $imgName;
    }

    /*CHANGE PASSWORD OF USER*/
    public static function changePassword($data){
        $user = Users::find($data['id']);
        $user->password = $data['password'];
        $user->token = null;
        return $user->save();
    }

    /*SAVE TOKEN IN TABLE USERS*/
    public static function SaveToekn($data){
        
        $tokenSave = Users::where('email',$data['email']);
        $tokenSave->token = $data['token'];
        return $tokenSave->save();
    }
}

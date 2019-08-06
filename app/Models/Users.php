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

    public static function Allusers($data){
    	$query = Users::select('users.id','users.name','users.email','users.phone','users.created_at')
           ->where('user_type',USER_TYPE);
           if(isset($data['search'])){
             $query->where('name', 'like', '%'. $data['search']. '%');
           }
        return $query->orderBy('users.id', 'DESC')
                ->paginate($data['per_page_limit']);
    }

    public static function countAllUsers(){
        return $data = Users::where('user_type',USER_TYPE)->get()->count();
    }

    public static function userDelete($id){
    	$user = Users::find($id);
    	return $user->delete();
    }

    /*Get single user detail*/
    public static function userDetail($id){
    	return Users::where('id',$id)->first();
    }

    // Update for user 
    public static function updateuser($data){ 
    	$user = Users::find($data['id']);
    	$user->name = $data['name'];
    	$user->email = $data['email'];
        $user->phone = $data['phone_no'];

            if(isset($data['profile_pic'])){
                $user->profile_pic = $data['profile_pic'];
            }
    	
    	return $user->save();
    }

    //This function used to upload profile pic
    public static function upload_profile($file, $destinationPath) {

        $imgName = $name = time()."_". $file->getClientOriginalName();
        $file->move($destinationPath, $imgName);
        return $path = $destinationPath . '/' . $imgName;
    }

    public static function changePassword($data){
        $user = Users::find($data['id']);
        $user->password = $data['password'];
        return $user->save();
    }

    public static function SaveToekn($data){
        
        $tokenSave = Users::where('email',$data['email']);
        $tokenSave->token = $data['token'];
        return $tokenSave->save();
    }

    public static function view_limit()  {
        return [ '5' => '5',
                 '10' => '10',
                  '25' => '25',  
                  '50' => '50',  
                  '100' => '100',  
                  '200' => '200',  
                  '500' => '500'
            ];        
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    public static function ProfileUpdate($data){
    	//print_r($data);die();
    	$user = Users::find($data['id']);
    	$user->name = $data['name'];
    	$user->email = $data['email'];
    	$user->phone = $data['phone'];
    	return $user->save();
    }

    public static function Allusers(){
    	return $data = Users::where('user_type',USER_TYPE)->get()->toArray();
    }

    public static function userDelete($id){
    	$user = Users::find($id);
    	return $user->delete();
    }

    public static function userDetail($id){
    	return Users::where('id',$id)->first();
    }

    public static function updateuser($data){
    	//print_r($data);die();
    	$user = Users::find($data['id']);
    	$user->name = $data['name'];
    	$user->email = $data['email'];
    	$user->phone = $data['phone_no'];
    	return $user->save();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users;
class DashboardController extends Controller
{
    function index(){
    	return view('admin.dashboard.index');
    }
    function home(){
    	 $data['CountallUsers'] = Users::countAllUsers();
    	return view('admin.dashboard.home',$data);
    }
}

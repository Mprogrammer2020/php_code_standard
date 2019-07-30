@extends('layouts.default')
@section('content')
<div class="main-content">
    @if(Session::has('message'))
        <div class="notification-msg">
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                {{ Session::get('message') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
            </p>
        </div>
    @endif
    <div class="main_box">      
        <div class="container-fluid">
            <h3>Edit Profile</h3>
            
                <div class="row">
                    <div class="col-lg-6 border_rt">
                    <h4>Add your personal information</h4>
                    <form id="update-user-frm" action="{{ route('admin.updateuser',['id'=>$user->id ])}}" method="post"  enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label>NAME</label>
                                        <input type="text" name="name" id="username" tabindex="1" class="form-control lettersonlys" placeholder="Enter Member Name" value="{{ $user->name }}">
                                        <span class="error">{{ $errors->first('name') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>EMAIL ADDRESS</label>
                            <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Enter Email Address" value="{{ $user->email }}">
                            <span class="error">{{ $errors->first('email') }}</span>
                        </div>

                        <div class="form-group">
                            <label>PHONE NUMBER</label>
                            <input type="text" name="phone_no" id="phone_no" tabindex="1" class="form-control number_only" placeholder="Enter Phone Number" value="{{ $user->phone }}">
                            <span class="error">{{ $errors->first('phone_no') }}</span>
                        </div>
                        <button type="submit" class="grad_btn">Update</button>
                    </form>
                    </div>
                </div>
                
        </div>
    </div>
</div>

@endsection
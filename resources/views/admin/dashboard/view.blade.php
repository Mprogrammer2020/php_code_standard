 @extends('layouts.default')
@section('content')
 <div class="main-content">
 	 <div class="main_box">
        <div class="container-fluid">
            <h3>Profile</h3>  
    	   	@if(Session::has('message'))
	        	<div class="notification-msg">
		            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
		                {{ Session::get('message') }}
		                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		            </p>
	         	</div>
		    @endif 
            <div class="row">
                <div class="col-lg-6 border_rt">
                	<form action="{{ route('admin.update')}}" method="post" enctype="multipart/form-data">
                		@csrf
                		<div class="col-md-4">
                                <div class="profile">
                                    <div class="drag">
                                        <div class="upload-drop-zone" id="drop-zone">
                                            <label class="btn-bs-file brow">
                                                @if(!empty(Auth::user()->profile_pic)) 
                                                    <img src="{{ asset(Auth::user()->profile_pic) }}">
                                                @else
                                                    <img src="{{ asset('public/images/icons/upload_img.png') }}">                           
                                                @endif
                                                <input type="file" name="user_img" value="{{ old('profile_pic') }}" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    		<div class="col-md-9">
								<div class="form-group">
								    <label>NAME</label>
								    <input type="text" name="name" id="username" tabindex="1" class="form-control lettersonlys" placeholder="Enter  Name" value="{{ Auth::user()->name }}">
								    <span class="error">{{ $errors->first('name') }}</span>
								</div>
							</div>
						<div class="col-md-9">
							<div class="form-group">
							    <label>Email</label>
							    <input type="text" name="email" id="email" tabindex="1" class="form-control lettersonlys" placeholder="Enter  Email Id" value="{{ Auth::user()->email }}">
							    <span class="error">{{ $errors->first('email') }}</span>
							</div>
						</div>
						<div class="col-md-9">
							<div class="form-group">
							    <label>Contact no.</label>
							    <input type="text" name="phone_no" id="phone_no" tabindex="1" class="form-control lettersonlys" placeholder="Enter Phone No." value="{{ Auth::user()->phone }}">
							    <span class="error">{{ $errors->first('phone') }}</span>
							</div>
						</div>
						<div class="col-md-9">
						 	<button type="submit" name ="submit" class="grad_btn">Update</button>
						</div>
					</form>
				</div> 
				<div class="col-lg-6">
					<h3>Change Password</h3>  
                    <form method="POST" action="{{ route('admin.changePassword')}}">
                        @csrf
                        <div class="form-group">
                            <label>{{ __('Old Password') }}</label>
                            <input id="old_password" type="password" class="form-control" name="old_password" value="{{old('old_password')}}" placeholder="Enter your old password">
                            <span class="error">{{ $errors->first('old_password') }}</span>
                        </div>
                         <div class="form-group">
                            <label>{{ __('New Password') }}</label>
                            <input id="new_password" type="password" class="form-control" name="new_password" value="{{old('new_password')}}" placeholder="Enter your new password">
                                    <span class="error">{{ $errors->first('new_password') }}</span>
                        </div>
                        <div class="form-group">
                            <label>{{ __('Confirm Password') }}</label>
                            <input id="confirm_password" type="password" class="form-control" name="confirm_password" value="{{old('confirm_password')}}" placeholder="Enter your confirm password">
                            <span class="error">{{ $errors->first('confirm_password') }}</span>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="grad_btn">Change Password</button>
                            </div>
                        </div>
                    </form>
            	</div>
			</div>
		</div>
	</div>
</div>
@endsection
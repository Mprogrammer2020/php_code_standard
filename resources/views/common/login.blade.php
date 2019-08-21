@extends('layouts.login')
@section('content')
   <div class="login_form">
   		<div class="notification-msg">
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                    {{ Session::get('message') }}
                </p>
            @endif
        </div>  
		<div class="main_box">			
				<form id="user-login-form" action="{{ route('user.check-login') }}" method="post">
					{{ csrf_field() }}
		                    <h4>You can Login from here</h4>		                      
										<div class="form-group">
											<label>Email</label>
											<input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}">
											<span class="error">{{ $errors->first('email') }}</span>
										</div>
										<div class="form-group">
											<label>Passwod</label>
											<input type="password" name="password" class="form-control" placeholder="Enter your password">
											<span class="error">{{ $errors->first('password') }}</span>
										</div>	
										<!-- <p class="text-right"><a href="">Forgot Password ?</a></p> -->               
		         <button type="submit" class="grad_btn"> Login </button>
				</form>
				<!--<a href="#" class="grad_btn" >Forgot Password</a>-->
		</div>
	</div>
@stop
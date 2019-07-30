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
								    <input type="text" name="email" id="email" tabindex="1" class="form-control lettersonlys" placeholder="Enter  email " value="{{ Auth::user()->email }}">
								    <span class="error">{{ $errors->first('name') }}</span>
								</div>
							</div>
							<!-- <div class="col-md-9">
								<div class="form-group">
								    <label>NAME</label>
								    <input type="text" name="name" id="username" tabindex="1" class="form-control lettersonlys" placeholder="Enter Member Name" value="{{ Auth::user()->name }}">
								    <span class="error">{{ $errors->first('name') }}</span>
								</div>
							</div> -->
							<div class="col-md-9">
							 	<button type="submit" name ="submit" class="grad_btn">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
</div>
@endsection
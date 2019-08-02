 @extends('layouts.default')
@section('content')
 
 <div class="main-content">
 	<div class="building_details index_build_blocks"> 
 		<ul class="building_ul">
				<li>
					<a href="{{ route('admin.userlist') }}">
						 <h1>{{ $CountallUsers }}</h1>
						<p>All User</p>
					</a>
				</li>
				 
				 <li>
					<a href="#">
						 <h1>0</h1>
						<p></p>
					</a>
				</li>
				<li>
					<h1>0</h1>
					<p></p>
					<div class="custom_select">
						{{--<div class="select">
						  <select name="slct" id="slct">
						    <option selected disabled>Today</option>
						    <option value="1">Today</option>
						    <option value="2">Today</option>
						    <option value="3">Today</option>
						  </select>
						</div>--}}
					</div>
				</li>
				<li>
					<h1>0</h1>
					<p></p>
					<div class="custom_select">
						{{--<div class="select">
						  <select name="slct" id="slct">
						    <option selected disabled>Today</option>
						    <option value="1">Today</option>
						    <option value="2">Today</option>
						    <option value="3">Today</option>
						  </select>
						</div>--}}
					</div>
				</li>
			</ul>
			<div class="clearfix"></div>
	</div>
 	<div class="table_box">
 		<div class="header_tb">
			<div class="row">
				<div class="col-md-6 col-sm-7">
					<div class="select_memb">
						<h3>All User</h3>
					</div>
				</div>
			<!-- 
				<div class="col-md-6 col-sm-5">
					<div class="text-right">
						<a href="#" class="btn_add" data-toggle="modal" data-target="#add_new_notices">+ Add New Notice</a>
					</div>
				</div> -->
			</div>
		    @if(Session::has('message'))
		        <div class="notification-msg">
		            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
		                {{ Session::get('message') }}
		                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		            </p>
		        </div>
			@endif 
		</div>
		<div class="table-responsive">
			<table style="width:100%" class="text-center">
				<thead class="text-center">
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>Email</th>
						<th>Contact no.</th>
						<th>Date</th>
						<th colspan="2">Action</th>
					</tr>
				 </thead>
				 <tbody>
				 	@if(isset($allusers))
				 	@foreach($allusers as $key=>$userDetail)
					 	 <tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $userDetail['name'] }}</td>
							<td>{{ $userDetail['email'] }}</td>
							<td>{{ $userDetail['phone'] }}</td>
							<td>{{ date('d-m-Y',strtotime($userDetail['created_at'])) }}</td>
							<td>
								<a class="view_user" href="{{ route('admin.userView', ['id' => $userDetail['id']] )}}">View</a>
							</td> 
							<td>
								<a class="edit_item" href="{{ route('admin.useredit', ['id' => $userDetail['id']] )}}">
									Edit
								</a>
							</td>
							<td>
								<a class="delete_item" href="{{ route('admin.delete', ['id' => $userDetail['id']] )}}">Delete</a>
							</td>
						 </tr>
				  	@endforeach
				  	@else
				  	<tr>
				  		<td>No have Users</td>
				  	</tr>
				  	@endif
				</tbody>
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">
	
</script> 
@endsection
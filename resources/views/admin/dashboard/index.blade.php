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
		<div class="building_details index_build_blocks">
			Welcome Dashbaord
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
								<a class="delete_item" href="{{ route('admin.delete', ['id' => $userDetail['id']] )}}">Delete</a>
							</td>
							<td>
								<a class="edit_item" href="{{ route('admin.useredit', ['id' => $userDetail['id']] )}}">
									Edit
								</a>
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
<script type="text/javascript">
	
</script> 
@endsection
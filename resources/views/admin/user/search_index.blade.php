   
 	<div class="table_box">
 		<div class="header_tb">
			<div class="row">
				<div class="col-md-6 col-sm-7">
					<div class="select_memb">
						<h3>All User</h3>
					</div>
				</div>
			</div>
		    @if(Session::has('message'))
		        <div class="notification-msg">
		            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
		                {{ Session::get('message') }}
		                <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		            </p>
		        </div>
			@endif 
			<div class="row staff_filter">
				<div class="col-md-8 col-sm-8">
					<div class="select_memb form-group">
						<p>Filter</p>
						<div class="custom_select table_select">
							<div class="select">
								<select class="page-limit" data-url="{{ route('admin.userlist') }}">
									<option value="" selected>Per page</option>
									@foreach($finalViewArray['view_limit'] as $limit_key => $view_limit)
										<option value="{{ $limit_key }}" {{ ($limit_key == $finalViewArray['per_page_limit']) ? 'selected' : ''}}>
											{{ $view_limit }} 
										</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
				</div> 
				<div class="col-md-4 col-sm-4">
					<div class="text-right">
						<div class="form-group">
                       		<input type="text" class="form-control search_table" placeholder="Search.." data-url="{{ route('admin.userlist') }}" value="{{ $finalViewArray['search'] }}">
                  		</div>
					</div>
				</div>
			</div>
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
				  
				 	@forelse($finalViewArray['allusers'] as $key=>$userDetail)
					 	 <tr>
							<td>{{ $key+1 }}</td>
							<td>{{ $userDetail['name'] }}</td>
							<td>{{ $userDetail['email'] }}</td>
							<td>{{ $userDetail['phone'] }}</td>
							<td>{{ date('d-m-Y',strtotime($userDetail['created_at'])) }}</td>
							<td>
								<a class="view_user" href="{{ route('admin.userView', ['id' => $userDetail['id']] )}}">
									<i class="fa fa-eye"></i>
								</a>
							
								<a class="edit_item" href="{{ route('admin.useredit', ['id' => $userDetail['id']] )}}">
									<i class="fa fa-edit"></i>						
								</a>
							
								<a href="javascript:void(0);" class="delete-item"
								data-delete-title="Once deleted, you will not be able to recover this user!" 
								data-success-title="Your user has been deleted!" 
								data-delete-url="{{ route('admin.delete', ['id' => $userDetail['id']] )}}">
									<i class="fa fa-trash" title="Delete User"></i>
								</a>
							</td>
						 </tr>
				   		@empty
				 			<tr>
					 			<td colspan="5">No records found</td>
					 		</tr>
				 	@endforelse
				</tbody>
			</table>
		</div>
	</div>
	<div class="pagination_box">
		<div class="pull-left">
			@if(count($finalViewArray['allusers']) > 0)
				<p>Showing {{ $finalViewArray['allusers']->count() }} of {{ $finalViewArray['allusers']->total() }}  entries</p>
			@endif
		</div>
		<div class="pull-right">
			@if(count($finalViewArray['allusers']) > 0)
			 	{{ $finalViewArray['allusers']->appends(Illuminate\Support\Facades\Input::except('page'))->links() }}
			@endif
		</div>
		<div class="clearfix"></div>
	</div>
  
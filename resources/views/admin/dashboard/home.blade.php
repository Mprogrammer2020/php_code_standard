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
						 <h1>10</h1>
						<p>Blocks</p>
					</a>
				</li>
				<li>
					<h1>25</h1>
					<p>Flats</p>
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
					<h1>15</h1>
					<p>Towers</p>
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
</div> 
@endsection
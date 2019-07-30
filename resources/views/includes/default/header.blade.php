<!--top header here-->
	<div class="header">
		<div class="logo"> 
		</div>
		<a href="#" class="nav-trigger"><span></span></a>
		
		
		<div class="right_profile">
			<ul>
				<li>
					{{ Session::get('user_name') }}					 
				</li>
				<li>
					<p class="notifiaction"><a href="{{ route('logout') }}">Logout</a></p>						 
				</li>  
			</ul>
		</div>
		
	</div>
<!--top header end here-->
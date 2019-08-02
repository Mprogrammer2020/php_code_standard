<!--top header here-->
	<div class="header">
		<div class="logo"> 
		</div>
		<a href="#" class="nav-trigger"><span></span></a>  
		<div class="right_profile">
			<ul>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">
						<p>Welcome! {{ Session::get('user_name') }}</p><span class="caret"></span>
					</a>
					<ul class="dropdown-menu"> 
				        <li><a href="{{ route('admin.view') }}">My Profile</a></li>
				        <li><a href="{{ route('logout') }}">Logout</a></li>
			        </ul>					 
				</li>
				<!-- <li>
					<p class="notifiaction"><a href="{{ route('logout') }}">Logout</a></p>						 
				</li>   -->
			</ul>
		</div> 
	</div>
<!--top header end here-->
 
<!--side nav here-->
		<div class="side-nav">
			<nav>
				<ul>
					<li class="active">
						<a href="#" class="active">
							<span class="icon"><img src="{{asset('public/images/icons/home_icon.png') }}"></span>
							<span>Home</span>
						</a>
					</li>
					<!--  <li class="active">
						<a href="{{ route('admin.view') }}" class="active">
							<span class="icon"><img src="images/home_icon.png"></span>
							<span>My Profile</span>
						</a>
					</li> -->
					<li class="active">
						<a href="{{ route('admin.userlist') }}" class="active">
							<span class="icon">
								<img src="{{ asset('public/images/icons/members_icon.png') }}"></span>
							<span>All Users</span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
		<!--side nav end here-->

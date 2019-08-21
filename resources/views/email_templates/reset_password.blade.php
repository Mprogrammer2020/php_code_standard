<html>
<head></head>
	<body>
		<div style="text-align:center; width:1000px;margin:0px auto;">
			<div style="background: black; padding: 20px">
				<a href="{{ url('/') }}"><img src="{{ asset('public/images/logo_header_new.png') }}"/></a>
			</div>
			<div style="border: 1px solid #d4cdcd;box-shadow: 1px 3px 12px 1px;">
				<h1 style="margin:20px">Reset Password</h1>
				<h2 style="margin:20px"></h2>

				<table style="text-align: left;overflow: scroll;margin-bottom: 20px;background: #f0f0f0;padding: 20px 80px;border-radius: 4px;" cellspacing="5px" cellpadding="5px" align="center" >
					
						<tr style="text-align: center;">
							<th colspan="7"><h3>Details</h3></th>
						</tr>
						<tr>
							<th style="width: 137px;">OTP</th>
							<td style="width: 137px;">{{  $token }}</td>
						</tr>
						
						
				</table>
				<p style="font-size: 20px;line-height: 28px;padding: 0 186px;  "></p>
			</div>
			<div style="background: #131313; padding: 20px; color:white;">
				<div>
					<a href="{{ url('/') }}"><img src="{{ asset('public/images/logo_header_new.png') }}"/></a>
				</div>
				<div>
					<h6>&#169; Copyright 2019, All Rights Reserved.</h6>
				</div>
			</div>
		</div> 
	</body>
</html>
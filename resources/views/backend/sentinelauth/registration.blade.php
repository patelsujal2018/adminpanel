<!DOCTYPE html>
<html>
<head>
	<title>INSPINIA | Register</title>
	<link href="{{ url('backend/css/bootstrap.min.css' ) }}" rel="stylesheet">
	<link href="{{ url('backend/font-awesome/css/font-awesome.css' ) }}" rel="stylesheet">
	<link href="{{ url('backend/css/animate.css' ) }}" rel="stylesheet">
	<link href="{{ url('backend/css/style.css' ) }}" rel="stylesheet">
</head>
<body class="gray-bg">

	<div class="middle-box text-center loginscreen animated fadeInDown">
		<div>
			<h3>Register to IN+</h3>
			<p>Create account to see it in action.</p>
			@if(Session::has('message'))
				<div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
			@endif
			<form method="post" class="m-t" role="form" action="{{ route('sentinel_registrationprocess') }}">
				@csrf
				<div class="form-group">
					<input name="firstname" type="text" class="form-control" placeholder="First Name">
					@if($errors->has('firstname'))
	            	<span class="text-danger">{{ $errors->first('firstname') }}</span>
	            @endif
				</div>
				<div class="form-group">
					<input name="lastname" type="text" class="form-control" placeholder="Last Name">
					@if($errors->has('lastname'))
	            	<span class="text-danger">{{ $errors->first('lastname') }}</span>
	            @endif
				</div>
				<div class="form-group">
					<input name="email" type="email" class="form-control" placeholder="Email">
					@if($errors->has('email'))
	            	<span class="text-danger">{{ $errors->first('email') }}</span>
	            @endif
				</div>
				<div class="form-group">
					<select class="form-control m-b" name="role">
						<option value="">select role</option>
						@foreach($roleslist as $role)
							<option value="{{ $role->slug }}">{{ $role->name }}</option>
						@endforeach
					</select>
					@if($errors->has('role'))
	            	<span class="text-danger">{{ $errors->first('role') }}</span>
	            @endif
				</div>
			</div>
			<div class="form-group">
				<input name="password" type="password" class="form-control" placeholder="Password">
				@if($errors->has('password'))
            	<span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
			</div>
			<div class="form-group">
				<input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
				@if($errors->has('password_confirmation'))
            	<span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
            @endif
			</div>

			<button type="submit" class="btn btn-primary block full-width m-b">Register</button>

			<p class="text-muted text-center"><small>Already have an account?</small></p>
			<a class="btn btn-sm btn-white btn-block" href="{{ route('sentinel_loginpage') }}">Login</a>
		</form>
		<p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
	</div>
</div>

<!-- Mainly scripts -->
<script src="{{ url('backend/js/jquery-3.1.1.min.js' ) }}"></script>
<script src="{{ url('backend/js/bootstrap.min.js' ) }}"></script>
</body>
</html>
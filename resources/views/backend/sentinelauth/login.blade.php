<!DOCTYPE html>
<html>
<head>
    <title>INSPINIA | Login</title>
    <link href="{{ url('backend/css/bootstrap.min.css' ) }}" rel="stylesheet">
    <link href="{{ url('backend/font-awesome/css/font-awesome.css' ) }}" rel="stylesheet">
    <link href="{{ url('backend/css/animate.css' ) }}" rel="stylesheet">
    <link href="{{ url('backend/css/style.css' ) }}" rel="stylesheet">
</head>
<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Welcome to IN+</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>

            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    @if(Session::has('message'))
                        <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
                    @endif
                    <form method="post" class="m-t" role="form" action="{{ route('sentinel_loginprocess') }}">
                        @csrf
                        <div class="form-group">
                            <input name="username" type="email" class="form-control" placeholder="Username">
                            @if($errors->has('username'))
                            <span class="text-danger">{{ $errors->first('username') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input name="key" type="password" class="form-control" placeholder="Password">
                            @if($errors->has('key'))
                            <span class="text-danger">{{ $errors->first('key') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                        <a href="{{ route('sentinel_forgotpasswordpage') }}">
                            <small>Forgot password?</small>
                        </a>

                        <p class="text-muted text-center">
                            <small>Do not have an account?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="{{ route('sentinel_registrationpage') }}">Create an account</a>
                    </form>
                    <p class="m-t">
                        <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small>
                    </p>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright Example Company
            </div>
            <div class="col-md-6 text-right">
             <small>© 2014-2015</small>
         </div>
     </div>
 </div>

</body>
</html>
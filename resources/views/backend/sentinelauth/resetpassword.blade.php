<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Backend | Reset password</title>

    <link href="{{ url('backend/css/bootstrap.min.css' ) }}" rel="stylesheet">
    <link href="{{ url('backend/font-awesome/css/font-awesome.css' ) }}" rel="stylesheet">

    <link href="{{ url('backend/css/animate.css' ) }}" rel="stylesheet">
    <link href="{{ url('backend/css/style.css' ) }}" rel="stylesheet">
</head>
<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">Reset password</h2>
                    <div class="row">
                        <div class="col-lg-12">
                            @if(Session::has('message'))
                                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
                            @endif
                            <form class="m-t" role="form" method="post" action="{{ route('sentinel_resetpasswordprocess') }}" >
                                @csrf
                                <input type="hidden" name="email" value="{{$user_email}}">
                                <input type="hidden" name="code" value="{{$activation_code}}">

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="New password">
                                    @if($errors->has('newpassword'))
                                        <div class="text-danger">{{ $errors->first('newpassword') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
                                    @if($errors->has('password_confirmation'))
                                        <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary block full-width m-b">Send new password</button>
                            </form>
                        </div>
                    </div>
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
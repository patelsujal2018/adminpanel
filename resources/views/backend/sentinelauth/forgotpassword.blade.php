<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Backend | Forgot password</title>

    <link href="{{ url('backend/css/bootstrap.min.css' ) }}" rel="stylesheet">
    <link href="{{ url('backend/font-awesome/css/font-awesome.css' ) }}" rel="stylesheet">

    <link href="{{ url('backend/css/animate.css' ) }}" rel="stylesheet">
    <link href="{{ url('backend/css/style.css' ) }}" rel="stylesheet">

    <style type="text/css">
        .error{
            color: red;
        }
    </style>

</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">Forgot password</h2>
                    <div class="row">
                        <div class="col-lg-12">
                            @if(Session::has('message'))
                                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('message') }}</div>
                            @endif
                            <form class="m-t" role="form" method="post" action="{{ route('sentinel_checkemail') }}" >
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email address">
                                    @if($errors->has('email'))
                                        <div class="text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary block full-width m-b">Send new password link</button>
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
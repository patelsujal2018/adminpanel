<?php

namespace App\Http\Controllers\sentinelauth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Sentinel;
use Activation;
use Reminder;
use App\User;
use App\Models\Roles;

class SentinelAuthController extends Controller
{
    public function loginpage()
    {
        return view('backend.sentinelauth.login');
    }

    public function loginprocess(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|email',
            'key' => 'required',
        ]);

        $credentials = [
            'email'    => $request->username,
            'password' => $request->key,
        ];

        if(Sentinel::authenticate($credentials) == true)
        {
            if($user = Sentinel::check())
            {
                $notification = ['toastr'=>"login successfully",'type'=>'success'];
                return redirect()->route('backend_dashboard')->with($notification);
            }
            else
            {
                $notification = ['message'=>"please enter valid credentials",'type'=>'danger'];
                return redirect()->route('sentinel_loginpage')->with($notification);
            }
        }
        else
        {
            $notification = ['message'=>"please enter valid credentials",'type'=>'danger'];
            return redirect()->route('sentinel_loginpage')->with($notification);
        }
    }

    public function logoutprocess()
    {
        $current_user = Sentinel::getUser();
        Sentinel::logout($current_user, true);
        return redirect()->route('sentinel_loginpage');
    }

    public function registrationpage()
    {
        $roleslist = Roles::get();
        return view('backend.sentinelauth.registration',compact('roleslist'));
    }

    public function registrationprocess(Request $request)
    {
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        ]);

        $credentials = [
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
        ];

        $user = Sentinel::register($credentials);

        if(is_object($user)){
            $role = Sentinel::findRoleBySlug($request->role);

            if(!is_null($role)){
                $attach = $role->users()->attach($user);
                if(is_null($attach)){

                    $activation = Activation::create($user);

                    $user_email = $user->email;
                    $activation_code = $activation->code;

                    return view('backend.sentinelauth.email.activate_user',compact('user_email'));
                    
                    $notification = ['message'=>"registration completed please check your mail box for activate account",'type'=>'success'];
                    return redirect()->route('sentinel_registrationpage')->with($notification);
                }
                else{
                    $notification = ['message'=>"something gone wrong",'type'=>'danger'];
                    return redirect()->route('sentinel_registrationpage')->with($notification);
                }
            }
            else{
                $notification = ['message'=>"please enter valid role",'type'=>'danger'];
                return redirect()->route('sentinel_registrationpage')->with($notification);
            }
        }
    }

    public function activateuser($user_email)
    {
        $credentials = [
            'email'    => $user_email,
        ];

        $user = Sentinel::findByCredentials($credentials);

        if(!$user)
        {
            return view('backend.sentinelauth.errors.usernotfound');
        }
        else
        {
            if($activation = Activation::exists($user))
            {
                if(Activation::complete($user,$activation->code))
                {
                    return view('backend.sentinelauth.success.useraccountactivated',compact('user'));
                }
            }
            else
            {
                return view('backend.sentinelauth.errors.activationcodeinvalid',compact('user'));
            }
        }
    }

    public function forgotpasswordpage()
    {
        return view('backend.sentinelauth.forgotpassword');
    }

    public function checkemail(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email',
        ]);

        $user = User::where(['email'=>$request->email])->first();

        if($user)
        {
            $credentials = [
                'email' => $user->email,
            ];

            $suser = Sentinel::findByCredentials($credentials);
            $activation = Reminder::create($suser);

            $user_email = $suser->email;
            $activation_code = $activation->code;


            return view('backend.sentinelauth.email.resetlink',compact('user_email','activation_code'));
            /*$notification = ['message'=>"please check your inbox we send reset link to you",'type'=>'success'];
            return redirect()->route('sentinel_forgotpasswordpage')->with($notification);*/
        }
        else
        {
            $notification = ['message'=>"your email is not found",'type'=>'warning'];
            return redirect()->route('sentinel_forgotpasswordpage')->with($notification);
        }
    }

    public function resetpasswordpage($user_email,$activation_code)
    {
        $credentials = [
            'email' => $user_email,
        ];

        $user = Sentinel::findByCredentials($credentials);

        if(Reminder::exists($user))
        {
            return view('backend.sentinelauth.resetpassword',compact('user_email','activation_code'));
        }
        else
        {
            $notification = ['message'=>"this reset password link is not exists",'type'=>'warning'];
            return redirect()->route('sentinel_loginpage')->with($notification);
        }
    }

    public function resetpasswordprocess(Request $request)
    {
        $this->validate($request,[
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ],[
            'password_confirmation.same' => 'The password confirmation does not match.',
        ]);

        $credentials = [
            'email' => $request->email,
        ];

        $user = Sentinel::findByCredentials($credentials);

        if(Reminder::exists($user))
        {
            if($reminder = Reminder::complete($user, $request->code, $request->password))
            {
                Reminder::removeExpired();

                $notification = ['message'=>"password reset successfully",'type'=>'success'];
                return redirect()->route('sentinel_loginpage')->with($notification);
            }
        }
        else
        {
            $notification = ['message'=>"password reset link is expired",'type'=>'danger'];
            return redirect()->route('sentinel_loginpage')->with($notification);
        }
    }


}
<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\adminResetPassword;
use Carbon\Carbon;
use DB;
use Mail;

class adminAuth extends Controller
{
    //redirect to login page
    public function login(){
        return view('admin.login');
    }

    //end admin session and redirect to login page
    public function logout(){

        //admin is a helper function instead of using(auth()->guard('admin))
        admin()->logout();
        return redirect(adminUrl('login'));
    }

    public function forgotPassword(){
        return view('admin.forgotPassword');
    }

    public function forgotPasswordPost(){
        $admin = Admin::where('email', request('email'))->first();
        if(!empty($admin)){
            //create token for new password
            $token = app('auth.password.broker')->createToken($admin);

            //insert data to password_resets table
            DB::table('password_resets')->insert([
                'email'      => $admin->email,
                'token'      => $token,
                'created_at' => Carbon::now()
            ]);
            return new adminResetPassword(['data' => $admin, 'token' => $token]);
            //hint: to use the next line of code fill the username and password of mailtrap in .env file 
            //Mail::to($admin->email)->send(new adminResetPassword(['data' => $admin, 'token' => $token]));
            //session()->flash('success', trans('admin.linkSent'));
            //return back();
        }
        return back();
    }

    public function resetPassword($token){
        $checkToken = DB::table('password_resets')->where('token', $token)->
        where('created_at', '>', Carbon::now()->subHours(2))->first();
        if(!empty($checkToken)){
            return view('admin.resetPassword', ['data' => $checkToken]);
        }

        else{
            return redirect(adminUrl('forgot/password'));
        }
    }

    public function resetPasswordPost($token){

        //return request();
        

        $this->validate(request(),[ 
        'password'             => 'required',
        //to validate that the two fields are the same
        'passwordConfirmation' => 'required|same:password',],
        [],
        [
        'password'             => 'Password',
        'passwordConfirmation' => 'Confirmation Password'
        ]);


        $checkToken = DB::table('password_resets')->where('token', $token)->
        where('created_at', '>', Carbon::now()->subHours(2))->first();
        
        if(!empty($checkToken)){
            $admin = Admin::where('email', $checkToken->email)->
            update(['email' => $checkToken->email, 'password' => bcrypt(request('password'))]);

            DB::table('password_resets')->where('email', request('email'))->delete();

            admin()->attempt(['email' => $checkToken->email, 'password' => request('password')], true);
            return redirect(adminUrl());
        }

        else{
            return redirect(adminUrl('forgot/password'));
        }
    }

    //validate the input data if it true?
    public function doValidate(){

        $rememberMe = request('rememberme') == 1 ? true : false ;
        if(admin()->attempt(['email' => request('email'), 'password' => request('password')], $rememberMe)){
            return redirect('admin');
        }

        else{
            session()->flash('error', trans('admin.invalideData'));
            return redirect(adminUrl('login'));
        }
    }
}

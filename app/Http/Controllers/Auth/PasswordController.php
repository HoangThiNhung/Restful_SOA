<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Request;
use App\Http\Requests;
use App\password_resets;
use App\User;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function getEmail(){
        return view('auth.password');
    }

    public function postEmail(Request $request){
        $data = $request->all();
        $email = new password_resets;
        $email->email = $data['email'];
        $email->token = md5(time());
        $email->save();
        $user= User::where('email',$data['email'])->get();
        $email->sendMail($data['email'],$user['name'],$email->token,$user['id']);
        return redirect('forgetpassword')->withErrors(['error' => 'Vui lòng kiểm tra email để thay đổi mật khẩu']);
    }

    public function getNewPassWord($token,$id){
        $result = password_resets::where('token',$token)->first();
        if($result!="")
            return view('auth.reset',array('token'=>$token,'id'=>$id));
        else return redirect('auth.login')->withErrors(['error'=>'Link sai, bạn không thể thay đổi được mật khẩu']);
    }

    public function 
}

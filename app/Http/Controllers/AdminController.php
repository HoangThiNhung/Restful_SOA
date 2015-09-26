<?php namespace App\Http\Controllers ;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Redirect;
use Request;
use Hash;
use App\User;
use App\Role;
use PHPMailer;
use Auth;
use Route;

class AdminController extends Controller {
	public function getLogin()
	{
		return view('auth.login');
	}

    public function activeaccount($token,$id){
        $result = User::checkactive($token,$id);

        switch ($result) {
            case '0':
                return redirect('auth/login')->withErrors(['error' => 'Link die']);
                break;
            case '1':
                return redirect('auth/login')->withErrors(['error' => 'Your account has been activated']);
                break;
            case '2':
                return redirect('auth/login')->withErrors(['error' => 'Active success']);
                break;
            
            default:
                return redirect('auth/login')->withErrors(['error' => 'Link die']);
                break;
        }

    }

	public function postLogin(LoginRequest $request)
	{
		if (Auth::attempt(array('email' => Request::get('email'), 'password' => Request::get('password')  )))
		{ 
            if(Auth::user()->role_id == 1){

                    if(Auth::user()->status == 'active'){
                    return Redirect::to('admin/');
                }else{

                    Auth::logout();
                    return Redirect::to('auth/login')->withErrors(['error' => 'Account not Active. Please check mail active account']);
                }
                return Redirect::to('admin/');
            }elseif (Auth::user()->role_id == 0) {

                    if(Auth::user()->status == 'active'){
                        return Redirect::to('/');
                }else{

                    Auth::logout();
                    return Redirect::to('auth/login')->withErrors(['error' => 'Account not Active. Please check mail active account']);
                }
            }else{
                Auth::logout();
                return Redirect::to('auth/login')->withErrors(['error' => 'Account not Admin']);
            }
     		
		}else{
			return Redirect::to('auth/login')->withErrors(['error' => 'Login Faill']);
		}
	}


    public function getLogout(){
        Auth::logout();
        return redirect('/auth/login')->withErrors(['error' => 'Logout done']);
    }



	public function register()
	{
		return view('auth.register');
	}

	public function postRegister(Request $request)
    {
        $user = [	"remember_token"	=>	Request::get('_token'),
        			"name"				=> 	Request::get('name'),
        			"password"			=> 	hash::make(Request::get('password')),
        			"email"				=>	Request::get('email'),
        			"role_id"			=> 	1,
        		];
        User::Create($user);
    }
    
    public function getIndex()
    {

        return view('backend.pages.index');
    }

}

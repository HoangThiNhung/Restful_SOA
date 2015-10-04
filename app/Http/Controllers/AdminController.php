<?php namespace App\Http\Controllers ;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Redirect;
use Request;
use Response;
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
                    return Response::json(array(
                        'message'=>'welcome admin'),
                        200,
                        array('Access-Control-Allow-Origin' => '*')
                    );
                }else{

                    Auth::logout();
                    return Response::json(array(
                        'message'=>'account not active'),
                        200,
                        array('Access-Control-Allow-Origin' => '*')
                    );
                }
                return Response::json(array(
                        'message'=>'welcome admin'),
                        200,
                        array('Access-Control-Allow-Origin' => '*')
                    );
            }elseif (Auth::user()->role_id == 0) {

                if(Auth::user()->status == 'active'){
                        return Response::json(array(
                            'message'=>'welcome student'),
                            200,
                            array('Access-Control-Allow-Origin' => '*')
                        );
                }else{

                    Auth::logout();
                    return Response::json(array(
                        'message'=>'account not active'),
                        200,
                        array('Access-Control-Allow-Origin' => '*')
                    );
                }
            }else{
                Auth::logout();
                return Response::json(array(
                        'message'=>'login fail'),
                        200,
                        array('Access-Control-Allow-Origin' => '*')
                    );
            }
     		
		}else{
			return Response::json(array(
                        'message'=>'login fail'),
                        200,
                        array('Access-Control-Allow-Origin' => '*')
                    );
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

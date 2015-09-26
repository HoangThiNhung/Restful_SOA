<?php namespace App\Http\Controllers;

use App\Classifier;
use App\Http\Requests;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;
use App\User;
use Request;
use Input;
use Validator;
use PHPMailer;
use Auth;
use Hash;
use Mail;
use Redirect;
use Session;
use DB;

class frontendController extends Controller {


	public function getRegister(){
		return view ('auth.register');
	}

	public function postRegister(Request $Request){
		$input = Input::all();
		$rules = [
			'name' => 'required',
		 	'email' => 'required|email|unique:users,email',
		 	'password' => 'required',
		 	'password_confirmation' => 'required|same:password',
		];
		 $validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
		 	return redirect('/register')->withErrors($validator);
		} else {
		 	$obj = new user;
		 	$obj->name = Input::get('name');
		 	$obj->email = Input::get('email');
			$obj->password = hash::make(Request::get('password'));
			$obj->status = 'unactive';
			$obj->active_token = md5(time());
			$obj->save();

		 	$obj->sendMail(Input::get('email'),Input::get('name'),$obj->active_token, $obj->id  );
		 	return redirect('/auth/login')->withErrors(['error' => 'Please check Email active account ']);
		}
		

		
	}
	public function getLogin(){
		return view('auth.login');
	}

	public function postLogin(){
		if (Auth::attempt(['email' => Request::get('email'), 'password' => Request::get('password')]))
		{
     		echo 'dang nhap thanh cong';
		}else{
			echo 'dang nhap that bai';
		}
		
	}

	public function getActive(){
		return view('auth.active');
	}

	public function postActive(){
		$obj = new user;
		$obj->where('remember_token','=',Request::get('code'))->update(['status'=>'active']);
		return view('auth.login');
	}

}

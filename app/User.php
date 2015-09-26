<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Validator;
use Request;
use DB;
use Input;
use PHPMailer;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'password', 'email', 'role_id', 'status'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
   
     /**
     * getAll users
     *
     * @var 
     */
    public function getAll(){
        // $this->where()
       return DB::select('select * from users');
    }

    /**
     * delete user
     * @var $id
     */

    /**
     * update user
     * @var $id
     */

    public function updateUser($id){
        $data = Request::all();
        return DB::update('update `users` 
            set `name` = :name,
                `email` = :email,
                `role_id` = :role_id,
                `status` = :status
            where id = :id',    ['name'=>$data['name'],
                                'email'=>$data['email'],
                                'role_id'=>$data['role_id'],
                                'status'=>$data['status'],
                                'id'=>$id
            ]);
    }

    public function sendMail($email,$name,$token,$id){
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'linhnhungnguyen94@gmail.com';
        $mail->Password = 'nhung1609';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->From = 'noreply@gmail.com';
        $mail->FromName = 'Active Account';
        $mail->addAddress($email, $name);


        $mail->isHTML(true);
        $mail->Subject = 'Active Account!';

        //tao noi dung mail
        

        $mail->Body = 'Click <a href="'.asset('/active'). "/" . $token . "/" . $id . '">here active account </a> Or copy link <b> '. Asset('/active') . "/" . $token . "/"  . $id .'</b> to URL Browser. </br> Thanks register account   ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()){
            return true;
        }else{
            return false;
        }
    }

    public static  function checkactive($token,$id){
        $a;
        $result = User::where('id',$id)->where('active_token',$token)->first();
        if($result!=""){
            if($result->status == 'unactive'){
                User::where('id',$id)->update(array('status'=>'active'));
                $a=2;
            }else{
                $a=1;
            }
        }else{
            $a=0;
        }

        return $a;
    }


}

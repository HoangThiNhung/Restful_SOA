<?php

namespace App\Http\Controllers;

use Request;
use DB;
use Validator;
use Input;
use File;
use Hash;
use App\User;
use App\Role;
use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $model=new User;
        $role = Role::all();
        $users = $model->getAll();
        return view('backend.pages.users.listUser2', ['users'=>$users, 'role'=>$role]);
        // return Response::json(array(
        //     'error' => false,
        //     'users' => $users->toArray()),
        //     200
        // );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $role_id = new Role;
        $role = $role_id->all();
        return view('backend.pages.users.addNew', array('role'=>$role));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */

    public function store(UserRequest $request)
    {
        //validate data input 
        $data=$request->all();

        if(isset($data['image'])){
            $thumb  = $data['image'];
            $new = 'ava' . uniqid() . '.' . $thumb->getClientOriginalExtension();
            $thumb->move('upload/users' , $new);
        }
        $data['image'] = $new;

        $obj = new User;
        $obj->name = $data['name'];
        $obj->email = $data['email'];
        $obj->role_id = $data['role_id'];
        $obj->password = hash::make($data['role_id']);
        $obj->status = 'active';
        $obj->remember_token = $data['_token'];
        $obj->image = $new;
        $obj->save();

        return redirect('admin/users');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //

        $role = Role::all();
        $user=User::find($id);
        return view('backend.pages.users.profile',array('user' =>$user ,'role'=>$role ));
    }

    public function updateAvatar($id){
        $data = Request::all();
        if(isset($data['image'])){
            $thumb  = $data['image'];
            $new = 'ava' . uniqid() . '.' . $thumb->getClientOriginalExtension();
            $thumb->move('upload/users' , $new);
        }
        $data['image'] = $new;

        User::where('id',$id)->update(array(
            'image'=>$data['image'],
            
        ));
        return Redirect::back();
    }

    public function update($id)
    {
        $data = Request::all();
        if(isset($data['image'])){
            $thumb  = $data['image'];
            $new = 'ava' . uniqid() . '.' . $thumb->getClientOriginalExtension();
            $thumb->move('upload/users' , $new);
        }
        $data['image'] = $new;

        User::where('id',$id)->update(array(
            'image'=>$data['image'],
            'name'=>$data['name'],
            'role_id'=>$data['role_id'],
            'email'=>$data['email'],
            'status'=>$data['status'],
        ));
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $model = User::find($id)->toArray();
        User::find($id)->delete();
        File::delete('upload/users/' . $model['image'] );
        return Redirect::to('admin/users');
    }
}

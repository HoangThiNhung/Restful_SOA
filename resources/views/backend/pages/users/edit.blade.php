@extends('backend.layouts.default')
@section('content')
<div class="page-content">
    <h1>Update User</h1>
    {!! Form::model($user,['method' => 'PATCH','route'=>['admin.users.update',$user->id]]) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            name
            <div class="col-md-4">
                <input type="text" name="name" class="form-control" value="{{$user->name}}"><br> 
            </div>
        </div><br><br>
        <div class="form-group">
            email
            <div class="col-md-4">
                <input type="text" name="email" class="form-control" value="{{$user->email}}"><br>
            </div>
        </div><br><br>
        <div class="form-group">
            Role
            <div class="col-md-4">
                <select class="table-group-action-input form-control input-medium" name="role_id">
                    <option value="{{$user->role_id}}">
                    <?php
                        foreach($role as $row)
                            if($row->id == $user->role_id)
                                echo $row->name;
                    ?>
                    </option>
                    @foreach($role as $row)
                    <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                </select>
            </div>
        </div><br><br>
        <div class="form-group">
            Status
            <div class="col-md-4">
                <select class="table-group-action-input form-control input-medium" name="status">
                    <option value="{{$user->status}}">{{$user->status}}</option>
                    <option value="active">active</option>
                    <option value="unactive">unactive</option>
                </select>
            </div>
        </div><br><br>
        <div class="form-group">
            <div class="col-md-2">
                <input type="submit" value="save" class="btn btn-primary"><br>
            </div>
            <!-- {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!} -->
        </div>
    {!! Form::close() !!}
</div>
@stop
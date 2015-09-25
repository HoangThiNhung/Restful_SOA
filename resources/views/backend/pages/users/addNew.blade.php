@extends('backend.layouts.admin')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      General Form Elements
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Add user</a></li>
      <li class="active">General Elements</li>
    </ol>
  </section>
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <section class="content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h2 class="box-title">Add New User</h2>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="{{ Asset('admin/users') }}" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
                <div class="col-lg-offset-3 col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input type="text" class="form-control" id="name" autocomplete='off' placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" id="image" autocomplete='off'  name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">email</label>
                        <input type="email" class="form-control" id="role" autocomplete='off' placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">password</label>
                        <input type="password" class="form-control" id="role" autocomplete='off' placeholder="Enter password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Role</label>
                        <select class="table-group-action-input form-control input-medium" name="role_id">
                            <option value="">Select...</option>
                            @foreach($role as $row)
                            <option value="{{$row->id}}">{{$row->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              <center><button type="submit" class="btn btn-primary">Submit</button></center>
            </div>
        </form>
      </div>
  </section>
</div>
@stop
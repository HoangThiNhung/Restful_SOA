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
      <li><a href="#">Add New Book</a></li>
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
          <h2 class="box-title">Add New Book</h2>
        </div><!-- /.box-header -->
        <!-- form start -->
        <form action="{{ Asset('admin/books') }}" method="post" enctype="multipart/form-data"> 
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
                <div class="col-lg-offset-3 col-lg-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">code</label>
                        <input type="text" class="form-control"  autocomplete='off'  name="code">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">name</label>
                        <input type="text" class="form-control" id="name" autocomplete='off' placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" class="form-control" id="image" autocomplete='off'  name="image">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">author</label>
                        <input type="text" class="form-control"  autocomplete='off'  name="author">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">publicher</label>
                        <input type="text" class="form-control"  autocomplete='off'  name="publisher">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">publish_year</label>
                        <input type="text" class="form-control"  autocomplete='off'  name="publish_year">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">pages</label>
                        <input type="text" class="form-control"  autocomplete='off'  name="pages">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">field</label>
                        <input type="text" class="form-control"  autocomplete='off'  name="field">
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
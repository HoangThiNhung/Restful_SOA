<!DOCTYPE html>
<html>
  @include('backend.includes.head2')
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('assets/LTE/plugins/datatables/dataTables.bootstrap.css')}}">
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      @include('backend.includes.header2')
      @include('backend.includes.sidebar2')
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List Users</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>image</th>
                        <th>name</th>
                        <th>email</th>
                        <th>role</th>
                        <th>status</th>
                        <th width="10%">info</th>
                        <th width="10%">delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $row)
                      <tr>
                        <td>
                          <?php if(!$row->image) echo "NULL";
                              else {
                          ?>
                          <img src="{{Asset('upload/users/'.$row->image)}}" height="50" width="50">
                          <?php } ?>
                        </td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>
                          <?php 
                            foreach($role as $id){
                              if($row->role_id==$id->id){
                                echo $id->name;
                              }
                            }
                           ?>
                        </td>
                        <td>{{$row->status}}</td>
                        <td><a href="{{url('admin/users',$row->id)}}" class="btn btn-primary">Read</a></td>
                        
                        <td>
                          {!! Form::open(['method' => 'DELETE', 'route'=>['admin.users.destroy', $row->id]]) !!}
                          {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                          {!! Form::close() !!}
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      @include('backend.includes.footer2')
      @include('backend.includes.controlbar2')
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="{{asset('assets/LTE/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('assets/LTE/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- DataTables -->
    <script src="{{asset('assets/LTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/LTE/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
    <!-- SlimScroll -->
    <script src="{{asset('assets/LTE/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('assets/LTE/plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('assets/LTE/dist/js/app.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('assets/LTE/dist/js/demo.js')}}"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
  </body>
</html>

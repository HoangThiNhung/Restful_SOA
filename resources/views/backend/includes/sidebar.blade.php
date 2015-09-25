<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="{{asset('assets/LTE/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>@if(!Auth::guest()) {{ Auth::user()->name }} @endif</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href="{{url('admin')}}">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li>
              <a href="{{url('/')}}">
                <i class="fa fa-home"></i>
                  <span>Home Frontend</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i>
                <span>Role setting</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/addRole')}}"><i class="fa fa-circle-o"></i> Add Role</a></li>
                <li><a href="{{url('admin/updateRole')}}"><i class="fa fa-circle-o"></i> Update Role</a></li>
                <li><a href="{{url('admin/deleteRole')}}"><i class="fa fa-circle-o"></i> Delete Role</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{url('admin/users')}}">
                <i class="fa fa-users"></i>
                <span>User Management</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/users')}}"><i class="fa fa-circle-o"></i> List Users</a></li>
                <li><a href="{{url('admin/users/create')}}"><i class="fa fa-circle-o"></i> Add New User</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{url('admin/product')}}">
                <i class="fa fa-gift"></i>
                <span>Product Management</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/product')}}"><i class="fa fa-circle-o"></i> List Products</a></li>
                <li><a href="{{url('admin/product/create')}}"><i class="fa fa-circle-o"></i> Add New Product</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{url('admin/category')}}">
                <i class="glyphicon glyphicon-th-list"></i>
                <span>Category Management</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/category')}}"><i class="fa fa-circle-o"></i> List Category</a></li>
                <li><a href="{{url('admin/category/create')}}"><i class="fa fa-circle-o"></i> Add New Category</a></li>
              </ul>
            </li>
            <li>
              <a href="{{url('admin/uploadimg')}}">
                <i class="fa fa-upload"></i>
                  <span>Upload</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="{{url('admin/slider')}}">
                <i class="fa fa-spinner"></i>
                <span>Slider</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/slider')}}"><i class="fa fa-circle-o"></i> Slider</a></li>
                <li><a href="{{url('admin/slider/create')}}"><i class="fa fa-circle-o"></i> Add New Slider</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="{{url('admin/news')}}">
                <i class="glyphicon glyphicon-tags"></i>
                <span>news</span><i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{url('admin/news')}}"><i class="fa fa-circle-o"></i> News</a></li>
                <li><a href="{{url('admin/news/create')}}"><i class="fa fa-circle-o"></i> Add New News</a></li>
              </ul>
            </li>
            <li>
              <a href="{{url('admin/order')}}">
                <i class="fa fa-shopping-cart"></i>
                  <span>Order</span><i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
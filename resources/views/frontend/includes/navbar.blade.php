<style type="text/css">
    .col-sm-3 .menutop a {
        color: #fff;
    }
</style>
<div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="{{url('/')}}" data-animate-hover="bounce">
                    <img src="{{asset('/assets/frontend/img/logo.png')}}" alt="Obaju logo" class="hidden-xs">
                    <img src="{{asset('/assets/frontend/img/logo-small.png')}}" alt="Obaju logo" class="visible-xs"><span class="sr-only">Obaju - go to homepage</span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="{{url('/')}}">Home</a>
                    </li>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Danh mục sản phẩm <b class="caret"></b></a>
                        
                         <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                         

                                            <?php print_r($menu_top) ?>
                                        
                                            
                                    </div>
                                </div>
                                
                            </li>
                        </ul>

                    </li>
                    <li class=""><a href="{{url('tu-van')}}">Tư vấn thời trang</a>
                    <li class=""><a href="{{url('news')}}">Tin tức</a>
                    <li class=""><a href="{{url('chat')}}">Chat</a>
                    <li class="dropdown yamm-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Giải trí <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="yamm-content">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <ul>
                                                <li><a href="{{url('tetris')}}">Tetris</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.yamm-content -->
                            </li>
                        </ul>
                    </li>
                    <li class=""><a href="{{url('contact')}}">Liên hệ</a>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <!-- Begin Cart  -->
                <?php
                  $data=  Session::get('cart');
                  $totalpriceproduct =0;
                  if(!is_null($data)){ $numberproduct = count($data); }else{ $numberproduct =0;};
                ?>

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="{{url('cart')}}" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm"><?php echo $numberproduct; ?> sản phẩm</span></a>
                </div>

               <!--  End cart -->


                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search" >

                <form action="{{url('search')}}" class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                        <span class="input-group-btn">

			                 <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		                  </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
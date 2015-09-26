@include('frontend.includes.head')
@section('title')
        Page Not Found

    @endsection
<div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <div class="row" id="error-page">
<!--                         <div class="col-sm-8 col-sm-offset-2"> -->
                            <div class="box">

                                <p class="text-center">
                                    <img src="{{asset('assets/frontend/img/page_not_found.png')}}" alt="Obaju template">
                                </p>

                                <h3>We are sorry - this page is not here anymore</h3>
                                <h4 class="text-muted">Error 404 - Page not found</h4>

                                <p class="text-center">To continue please use the <strong>Search form</strong> or <strong>Menu</strong> above.</p>

                                <p class="buttons"><a href="{{url('/')}}" class="btn btn-primary"><i class="fa fa-home"></i> Go to Homepage</a>
                                </p>
                            </div>
                        <!-- </div> -->
                    </div>


                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

    </div>
    <!-- /#all -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Sản phẩm đã xem</h3>
                        </div>

                        <div class="panel-body">

                            <?php 
                            $data = Session::get('cookie');
                            if(!is_null($data)){
                                foreach ($data as $value) {
                                    $slug = convert_vi_to_en($value['name']);
                        ?>
                            <div class="product same-height">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="front">
                                            <a href="{{url('product-details/'.$value['id'].'-product-'.$slug.'.html')}}">
                                                <img src="{{asset('upload/product/'.$value['thumbnail'])}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="back">
                                            <a href="{{url('product-details/'.$value['id'].'-product-'.$slug.'.html')}}">
                                                <img src="{{asset('upload/product/'.$value['thumbnail'])}}" alt="" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('product-details/'.$value['id'].'-product-'.$slug.'.html')}}" class="invisible">
                                    <img src="{{asset('upload/product/'.$value['thumbnail'])}}" alt="" class="img-responsive">
                                </a>
                                <div class="text">
                                    <a href="{{url('product-details/'.$value['id'].'-product-'.$slug.'.html')}}">
                                        <h3>{{$value['name']}}</h3>
                                    </a>
                                    <p class="price">{{price_formate( $value['price'])}} VND</p>
                                </div>
                            </div>

                        <?php } } ?>

                        </div>
                    </div>
@extends('layouts.home')

@section('content')

<section id="page-content" class="page-wrapper">
    <!-- SHOP SECTION START -->
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-xs-12">
                    <!-- single-product-area start -->
                    <div class="single-product-area mb-80">
                        <div class="row">
                            <!-- imgs-zoom-area start -->
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="imgs-zoom-area">
                                    <img id="zoom_03" src="anh/anhsp/{{$sanpham->hinhanh}}" height="335px" width="482px" data-zoom-image="anh/anhsp/{{$sanpham->hinhanh}}" alt="">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div id="gallery_01" class="carousel-btn slick-arrow-3 mt-30">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- imgs-zoom-area end -->
                            <!-- single-product-info start -->

                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="single-product-info">
                                    <h3 class="text-black-1">{{$sanpham->name}}</h3>
                                    <h6 class="brand-name-2">{{$sanpham->hangsp}}</h6>
                                    <!-- hr -->
                                    <hr>
                                    <!-- plus-minus-pro-action -->
                                    <div class="plus-minus-pro-action clearfix">
                                        <div class="sin-plus-minus f-left clearfix">
                                            <p class="color-title f-left">Số lượng</p>
                                            <div class="cart-plus-minus f-left">
                                                <input type="text" value="01" name="qtybutton" class="cart-plus-minus-box">
                                            </div>
                                        </div>
                                        <div class="sin-pro-action f-right">
                                            <ul class="action-button">
                                                <li>
                                                    <a href="#" title="Wishlist" tabindex="0"><i class="zmdi zmdi-favorite"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Compare" tabindex="0"><i class="zmdi zmdi-refresh"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" title="Add to cart" tabindex="0"  data-cart='add' data-id="{{$sanpham->id}}"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- plus-minus-pro-action end -->
                                    <!-- hr -->
                                    <hr>
                                    <!-- single-product-price -->
                                    <h3 class="pro-price">{{number_format($sanpham->gia)}} VNĐ</h3>
                                    <!--  hr -->
                                    <hr>
                                    <div>
                                        <a href="#" class="button extra-small button-black" tabindex="-1">
                                            <span class="text-uppercase">MUA NGAY</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- single-product-info end -->
                        </div>
                        <!-- single-product-tab -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- hr -->
                                <hr>
                                <div class="single-product-tab">
                                    <ul class="reviews-tab mb-20">
                                        <li class="active"><a href="#description" data-toggle="tab">Thông tin chi tiết</a></li>
                                        <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="description">
                                            <table>
                                                <tr>
                                                    <td>Màn hình:</td>
                                                    <td>{{$sanpham->manhinh}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Hệ điều hành:</td>
                                                    <td>{{$sanpham->hedieuhanh}}</td>
                                                </tr>
                                                <tr>
                                                    <td>CPU:</td>
                                                    <td>{{$sanpham->cpu}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Camere Sau:</td>
                                                    <td>{{$sanpham->camerasau}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Camera Trước:</td>
                                                    <td>{{$sanpham->cameratruoc}}</td>
                                                </tr>
                                                <tr>
                                                    <td>RAM:</td>
                                                    <td>{{$sanpham->ram}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Bộ nhớ trong:</td>
                                                    <td>{{$sanpham->bonho}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Thẻ Sim:</td>
                                                    <td>{{$sanpham->sim}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Dung lượng Pin</td>
                                                    <td>{{$sanpham->pin}}</td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="reviews">
                                            <!-- reviews-tab-desc -->
                                            <div class="reviews-tab-desc">
                                                <!-- single comments -->
                                                <div class="media mt-30">
                                                    <div class="media-left">
                                                        <a href="#"><img class="media-object" src="../assets/home/img/author/1.jpg" alt="#"></a>
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="clearfix">
                                                            <div class="name-commenter pull-left">
                                                                <h6 class="media-heading"><a href="#">Gerald Barnes</a></h6>
                                                                <p class="mb-10">27 Jun, 2017 at 2:30pm</p>
                                                            </div>
                                                            <div class="pull-right">
                                                                <ul class="reply-delate">
                                                                    <li><a href="#">Reply</a></li>
                                                                    <li>/</li>
                                                                    <li><a href="#">Delate</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer accumsan egestas .</p>
                                                    </div>
                                                </div>
                                                <!-- single comments -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  hr -->
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!-- single-product-area end -->
                </div>
                <div class="col-md-3 col-xs-12">
                    <aside class="widget widget-product box-shadow">
                        <h6 class="widget-title border-left mb-20">Sản Phẩm liên quan</h6>
                        <!-- product-item start -->
                        @foreach ($sanphamlq as $item)
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="{{route('sanpham', ['id'=>$item->id]) }}">
                                        <img src="anh/anhsp/{{$item->hinhanh}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="{{route('sanpham', ['id'=>$item->id]) }}">{{$item->name}}</a>
                                    </h6>
                                    <h3 class="pro-price">{{number_format($item->gia)}} VNĐ</h3>
                                </div>
                            </div>
                        @endforeach
                        <!-- product-item end -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- SHOP SECTION END -->
</section>

@endsection
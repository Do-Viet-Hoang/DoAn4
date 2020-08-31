@extends('layouts.home')

@section('content')
<div class="slider-area  plr-185  mb-80">
    <div class="container-fluid">
        <div class="slider-content">
            <div class="row">
                <div class="active-slider-1 slick-arrow-1 slick-dots-1">
                    <!-- layer-1 Start -->
                    <div class="col-md-12">
                        <div class="layer-1">
                            <div class="slider-img">
                                <img src=" assets/home/img/slider/slider-1/1.jpg" alt="">
                            </div>
                            <div class="slider-info gray-bg">
                                <div class="slider-info-inner">
                                    <h1 class="slider-title-1 text-uppercase text-black-1">Điện Thoại Đỗ Việt Hoàng</h1>
                                    <div class="slider-brief text-black-2">
                                        <p>Chào mừng bạn đến với cửa hàng của Đỗ Việt Hoàng. Cửa hàng có đầy đủ các mẫu mã mới nhất, đảm bảo chất lượng. Đặt uy tin lên hàng đầu. Cung cấp các sản phẩm chất lượng nhất cho khách hàng. Facebook: Đỗ Việt Hoàng</p>
                                    </div>
                                    <a href="#" class="button extra-small button-black">
                                        <span class="text-uppercase">MUA NGAY</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- layer-1 end -->
                    <!-- layer-1 Start -->
                    <div class="col-md-12">
                        <div class="layer-1">
                            <div class="slider-img">
                                <img src=" assets/home/img/slider/slider-1/2.jpg" alt="">
                            </div>
                            <div class="slider-info gray-bg">
                                <div class="slider-info-inner">
                                    <h1 class="slider-title-1 text-uppercase text-black-1">Điện Thoại Đỗ Việt Hoàng</h1>
                                    <div class="slider-brief text-black-2">
                                        <p>Chào mừng bạn đến với cửa hàng của Đỗ Việt Hoàng. Cửa hàng có đầy đủ các mẫu mã mới nhất, đảm bảo chất lượng. Đặt uy tin lên hàng đầu. Cung cấp các sản phẩm chất lượng nhất cho khách hàng. Facebook: Đỗ Việt Hoàng</p>
                                    </div>
                                    <a href="#" class="button extra-small button-black">
                                        <span class="text-uppercase">MUA NGAY</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- layer-1 end -->
                </div>
            </div>
        </div>
    </div>
</div>
<section id="page-content" class="page-wrapper">
    <!-- BY BRAND SECTION START-->
    <div class="by-brand-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">SẢN PHẨM MỚI RA MẮT</h2>
                        <h6>Những mẫu mới ra mắt năm 2019</h6>
                    </div>
                </div>
            </div>
            <div class="by-brand-product">
                <div class="row active-by-brand slick-arrow-2">
                    <!-- single-brand-product start -->
                    @foreach ($new as $item)
                    <div class="col-xs-12">
                        <div class="product-item">
                            <div class="product-img">
                                <a href="{{ route('sanpham', ['id'=>$item->id]) }}">
                                    <img src="anh/anhsp/{{$item->hinhanh}}" alt="" />
                                </a>
                            </div>
                            <div class="product-info">
                                <h6 class="product-title">
                                    <a href="{{ route('sanpham', ['id'=>$item->id]) }}">{{$item->name}}</a>
                                </h6>
                                <div class="pro-rating">
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                </div>
                                <h3 class="pro-price">{{number_format($item->gia)}} VNĐ</h3>
                                <ul class="action-button">
                                    <li>
                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"  data-cart='add' data-id="{{$item->id}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>  
                @endforeach

                    <!-- single-brand-product end -->
                </div>
            </div>
        </div>
    </div>
    <!-- BY BRAND SECTION END -->
    <!-- FEATURED PRODUCT SECTION START -->
    <div class="featured-product-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">Danh sách sản phẩm</h2>
                        <h6>Các mẫu sản phẩm đang bán chạy tại shop</h6>
                    </div>
                </div>
            </div>
            <div class="featured-product">
                <div class="row active-featured-product slick-arrow-2">
                    <!-- product-item start -->
                    @foreach ($list as $item)
                        <div class="col-xs-12">
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="{{ route('sanpham', ['id'=>$item->id]) }}">
                                        <img src="anh/anhsp/{{$item->hinhanh}}" alt="" />
                                    </a>
                                </div>
                                <div class="product-info">
                                    <h6 class="product-title">
                                        <a href="{{ route('sanpham', ['id'=>$item->id]) }}">{{$item->name}}</a>
                                    </h6>
                                    <div class="pro-rating">
                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                        <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                    </div>
                                    <h3 class="pro-price">{{number_format($item->gia)}} VNĐ</h3>
                                    <ul class="action-button">
                                        <li>
                                            <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                        </li>
                                        <li>
                                            <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"  data-cart='add' data-id="{{$item->id}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>  
                    @endforeach
                    <!-- product-item end -->
                </div>
            </div>
        </div>
    </div>
    <!-- FEATURED PRODUCT SECTION END -->
    <!-- UP COMMING PRODUCT SECTION START -->
    <div class="up-comming-product-section mb-80">
        <div class="container">
            <div class="row">
                <!-- up-comming-pro -->
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="up-comming-pro gray-bg clearfix">
                        <div class="up-comming-pro-img f-left">
                            <a href="#">
                                <img src=" assets/home/img/up-comming/1.jpg" alt="">
                            </a>
                        </div>
                        <div class="up-comming-pro-info f-left">
                            <h3><a href="#">Sản phẩm giảm giá</a></h3>
                            <p>Từng bưng khuyến mãi giảm giá 70% cho điện thoại OPPO Reno 2. Chương trình áp dụng cho 100 khác hàng đầu tiên. Nhanh tay đặt mua ngay. Để được hưởng trọn ưu đãi của cửa hàng</p>
                            <div class="up-comming-time">
                                <div data-countdown="2020/08/06"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hidden-sm col-xs-12">
                    <div class="banner-item banner-1">
                        <div class="ribbon-price">
                            <span>$ 896.00</span>
                        </div>
                        <div class="banner-img">
                            <a href="#"><img src=" assets/home/img/banner/1.jpg" alt=""></a>
                        </div>
                        <div class="banner-info">
                            <h3><a href="#">SAMSUNG A80</a></h3>
                            <ul class="banner-featured-list">
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>Thiết kế sang trọng</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>Thời lượng Pin Cao</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>Hỗ trợ sạc nhanh</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span> Hỗ trợ 2 SIM</span>
                                </li>
                                <li>
                                    <i class="zmdi zmdi-check"></i><span>Cấu hình khủng</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- UP COMMING PRODUCT SECTION END -->
    <!-- PRODUCT TAB SECTION START -->
    <div class="product-tab-section mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="section-title text-left mb-40">
                        <h2 class="uppercase">DANH SÁCH SẢN PHẨM THEO LOẠI</h2>
                        <h6>Các sản phẩm tiêu biểu của cửa hàng</h6>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="pro-tab-menu text-right">
                        <!-- Nav tabs -->
                        <ul class="">
                            @foreach ($loai as $item)
                                <li><a href="#loai-{{$item->id}}" data-toggle="tab">{{$item->name}}</a></li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="product-tab">
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- popular-product start -->
                    @foreach ($loai as $key => $item)
                        <div class="tab-pane {{$key==0?'active':''}}" id="loai-{{$item->id}}">
                            <div class="row">
                                <!-- product-item start -->
                                @forelse ($item->product as $product)
                                    <div class="col-md-3 col-sm-4 col-xs-12">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="{{route('sanpham', ['id'=>$product->id]) }}">
                                                    <img src="anh/anhsp/{{$product->hinhanh}}" alt="" />
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <h6 class="product-title">
                                                <a href="{{route('sanpham', ['id'=>$product->id]) }}">{{$product->name}}</a>
                                                </h6>
                                                <div class="pro-rating">
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-half"></i></a>
                                                    <a href="#"><i class="zmdi zmdi-star-outline"></i></a>
                                                </div>
                                                <h3 class="pro-price">{{number_format($product->gia)}} VNĐ</h3>
                                                <ul class="action-button">
                                                    <li>
                                                        <a href="#" title="Wishlist"><i class="zmdi zmdi-favorite"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-toggle="modal" data-target="#productModal" title="Quickview"><i class="zmdi zmdi-zoom-in"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" title="Compare"><i class="zmdi zmdi-refresh"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" data-cart='add' data-id="{{$product->id}}" title="Add to cart"><i class="zmdi zmdi-shopping-cart-plus"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                <!-- product-item end -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

{{-- <form action="{{route('cart.add')}}" method="post">
    @csrf
    <input type="text" name="id">
    <button type="submit">ok</button>
</form> --}}
@endsection

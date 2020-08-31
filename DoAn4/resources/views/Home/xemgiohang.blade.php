@extends('layouts.home')

@section('style')
    <style>
        .quantity {
            border: 1px solid #333 !important;
            padding: 5px !important;
            color: #333 !important;
            width: 34px !important;
            text-align: center;
        }
    </style>
@endsection

@section('content')

<section id="page-content" class="page-wrapper">
    <div class="shop-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12">
                    <ul class="cart-tab">
                        <li>
                            <a class="active" href="#shopping-cart" data-toggle="tab">
                                <span>01</span>
                                Xem giỏ hàng
                            </a>
                        </li>
                        <li>
                            <a href="#checkout" data-toggle="tab">
                                <span>02</span>
                                Đặt hàng
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 col-sm-12">
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- shopping-cart start -->
                        <div class="tab-pane active" id="shopping-cart">
                            <div class="shopping-cart-content">
                                <div class="table-content table-responsive mb-50">
                                    <table class="text-center">
                                        <thead>
                                            <tr>
                                                <th class="product-thumbnail">Sản phẩm</th>
                                                <th class="product-price">Giá</th>
                                                <th class="product-quantity">Số lượng</th>
                                                <th class="product-subtotal">Tổng tiền</th>
                                                <th class="product-remove">Xoá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- tr -->
                                            @foreach ($giohang as $item)
                                                <tr>
                                                    <td class="product-thumbnail">
                                                        <div class="pro-thumbnail-img">
                                                            <img src="anh/anhsp/{{$item->hinhanh}}" alt="" />
                                                        </div>
                                                        <div class="pro-thumbnail-info text-left">
                                                            <h6 class="product-title-2">
                                                                <a href="{{ route('sanpham', ['id'=>$item->id]) }}">{{$item->name}}</a>
                                                            </h6>
                                                        </div>
                                                    </td>
                                                    <td class="product-price">{{number_format($item->gia)}} VNĐ</td>
                                                    <td class="product-quantity">
                                                        <div class="f-left" data-product-code="{{$item->id}}">
                                                            <input class="quantity" type="text" onkeyup="changesoluong(this)" data-id="{{$item->id}}" value="{{$item ->soluong}}">
                                                        </div>
                                                    </td>
                                                    <td class="product-subtotal">{{number_format($item->tong)}} VNĐ</td>
                                                    <td class="product-remove">
                                                        <a href="{{route('xoact', ['id'=>$item->id])}}" ><i class="zmdi zmdi-close"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="payment-details box-shadow p-30 mb-50">
                                            <h6 class="widget-title border-left mb-20">Check Out</h6>
                                            <table>
                                                <tr>
                                                    <td class="td-title-1">Tổng tiền</td>
                                                    <td class="td-title-2" id="total">
                                                        {{$tong}} VNĐ
                                                    </td>
                                                </tr>
                                            </table>
                                            <a href="#checkout" data-toggle="tab" class="button extra-small button-black">
                                                <span class="text-uppercase">Đặt hàng ngay</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shopping-cart end -->
                        <!-- wishlist start -->
                        <!-- wishlist end -->
                        <!-- checkout start -->
                        <div class="tab-pane" id="checkout">
                            <div class="checkout-content box-shadow p-30">
                                <form action="{{route('cart.checkout')}}" method="post">
                                    b{{ csrf_field() }}
                                    <div class="row">
                                        <!-- billing details -->
                                        <div class="col-md-6">
                                            <div class="billing-details pr-10">
                                                <h6 class="widget-title border-left mb-20">billing details</h6>
                                            
                                                <input type="text" id="hoten" name="hoten" placeholder="Họ Tên Người Nhận" value="{{$user->hoten}}">
                                                <input type="text" id="sdt" name="sdt" placeholder="Số điện thoại" value="{{$user->sdt}}">
                                                <input type="text" id="diachi" name="diachi" placeholder="Địa chỉ người nhận" value="{{$user->diachi}}">
                                            
                                                <textarea class="custom-textarea" id="chuthich" name="chuthich" placeholder="Chú thích thêm ..."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- our order -->
                                            <div class="payment-details pl-10 mb-50">
                                                <h6 class="widget-title border-left mb-20">our order</h6>
                                                <table>
                                                    
                                                    <tr>
                                                        <td class="td-title-1">Tổng tiền sản phẩm</td>
                                                        <td class="td-title-2" id="checkout-subtotal">{{number_format($tong)}} VNĐ</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td class="td-title-1">Phí Ship</td>
                                                        <td class="td-title-2">30.000 VNĐ</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="td-title-1">Tổng tiền</td>
                                                        <td class="td-title-2" id="checkout-total">{{number_format($tong+30000)}} VNĐ</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <button class="submit-btn-1 mt-30 btn-hover-1" type="submit">Đặt hàng ngày nào !</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
    <script>
        function changesoluong(e) {
            let id = $(e).attr("data-id");
            let soluong = $(e).val();

            $.get('{{ route('cart.change') }}', { id: id, soluong: soluong }, function(data, status) {
                let a = $(e).parent().parent().parent();
                let subtotal = $(a).find('.product-subtotal');

                subtotal.html(data.subtotal + "VNĐ");
                $('#total').html(data.total + "VNĐ");
            });
        }
    </script>
@endsection
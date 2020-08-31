@extends('layouts.home')

@section('content')

<div id="page-content" class="page-wrapper">
    <!-- LOGIN SECTION START -->
    <div class="login-section mb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="registered-customers">
                        <h6 class="widget-title border-left mb-50">Đănhg nhập</h6>
                        <form method="post" action="{{route('dangnhap')}}">
                                @csrf
                            <div class="login-account p-30 box-shadow">
                                <p>Nếu bạn đã có tài khoản, vui lòng đăng nhập</p>
                                @foreach ($errors->all() as $error)
                                <div class="alert alert-danger">
                                {{$error}}
                                </div>
                                @endforeach
                                @if(Session::has('flag'))
                                    <div class="alert alert-{{Session::get('flag')}}">
                                    {{Session::get('message')}}
                                    </div>
                                @endif
                                <input type="text" name="username" placeholder="Tên tài khoản">
                                <input type="password" name="password" placeholder="Mật Khẩu">
                                <p><small><a href="#">Forgot our password?</a></small></p>
                                <button class="submit-btn-1 btn-hover-1" type="submit">đăng nhập</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- new-customers -->
                <div class="col-md-6">
                    <div class="new-customers">
                        <form method="post" action="{{route('khachhangthem')}}">
                            @csrf
                            <h6 class="widget-title border-left mb-50">Tài khoản mới</h6>
                            <div class="login-account p-30 box-shadow">
                            @if(Session::has('ok'))
                                <div class="alert alert-success">
                                    {{Session::get('ok')}}
                                </div>
                            @endif 

                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" id="username" name="username" placeholder="Nhập tên tài khoản">
                                    </div>
                                    <div class="col-sm-6">
                                        <input  id="password"  name="password" type="password" placeholder="Nhập mật khẩu">
                                    </div>
                                </div>
                                <input type="text" id="hoten" name="hoten" placeholder="Nhập họ tên">
                                <input type="text" id="diachi" name="diachi" placeholder="Nhập địa chỉ">
                                <input type="text" id="sdt" name="sdt" placeholder="Nhập số điện thoại">
                                <input type="text" id="email" name="email" placeholder="Email">
                                <div class="row">
                                    <div class="col-md-6">
                                        <button class="submit-btn-1 mt-20 btn-hover-1" type="submit">Đăng kí</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Làm mới</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
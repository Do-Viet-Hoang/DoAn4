@extends('layouts.admin')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Quản lý khách hàng</h4>
                            <button class="btn btn-primary btn-round ml-auto" data-role="add">
                                <i class="fa fa-plus"></i>
                                Thêm khách hàng
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('ok'))
                        <div class="alert alert-success">
                            {{Session::get('ok')}}
                        </div>
                    @endif        
                    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header no-bd">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold">
                                        Thêm</span> 
                                        <span class="fw-light">
                                        Mới</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>              
                            <form action="{{route('admin.tk-add')}}" method="Post">
                                <div class="modal-body">
                                        @csrf
                                        <input type="hidden" id="id" name="id">
                                        <input type="hidden" id="action" name="action"> 
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Tên tài khoản</label>
                                                    <input id="username" name="username" type="text" class="form-control" placeholder="Điền vào">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Mật khẩu</label>
                                                    <input id="password" name="password" type="text" class="form-control" placeholder="Điền vào">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Họ Tên</label>
                                                    <input id="hoten" name="hoten" type="text" class="form-control" placeholder="Điền vào">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Địa chỉ</label>
                                                    <input id="diachi" name="diachi" type="text" class="form-control" placeholder="Điền vào">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Số điện thoại</label>
                                                    <input id="sdt" name="sdt" type="text" class="form-control" placeholder="Điền vào">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Email</label>
                                                    <input id="email" name="email" type="text" class="form-control" placeholder="Điền vào">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="modal-footer no-bd">
                                    <button type="submit" id="addRowButton" class="btn btn-primary">Thực hiện</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 193px;">Mã khách hàng</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Tên tài khoản</th>                                            
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Mật khẩu</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 283px;">Tên khách hàng</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 283px;">Địa chỉ</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">SĐT</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Email</th>
                                            <th style="width: 127px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $item)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$item->id}}</td>
                                                <td>{{$item->username}}</td>
                                                <td>{{$item->password}}</td>
                                                <td>{{$item->hoten}}</td>
                                                <td>{{$item->diachi}}</td>
                                                <td>{{$item->sdt}}</td>
                                                <td>{{$item->email}}</td>
                                                <td>
                                                    <div class="form-button-action">
                                                        <button type="button" data-role="edit" data-id="{{ $item->id }}" class="btn btn-link btn-primary btn-lg" data-original-title="Sửa">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" data-role="delete" data-id="{{ $item->id }}" class="btn btn-link btn-danger" data-original-title="Xoá">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script>
        $("[data-role=edit]").click(function() {
            let id = $(this).attr('data-id');
            $.get('{{route('admin.tk-data')}}', { id: id }, function(data){
                $('#id').val(data.id);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#hoten').val(data.hoten);
                $('#diachi').val(data.diachi);
                $('#sdt').val(data.sdt);
                $('#email').val(data.email);
                $('#action').val('2');
                $('#username').attr("disabled", true);
                $('#modal').modal('show');
            });
        });

        $("[data-role=delete]").click(function(){
            let id = $(this).attr('data-id');
            $.get('{{route('admin.tk-delete')}}', { id: id }, function(data){
                location.reload();
            });
        });

        $("[data-role=add]").click(function(){
                $('#username').val("");
                $('#password').val("");
                $('#hoten').val("");
                $('#diachi').val("");
                $('#sdt').val("");
                $('#email').val("");
            $('#action').val('1');
            $('#username').removeAttr("disabled");
            $('#modal').modal('show');
        });
    </script>
@endsection
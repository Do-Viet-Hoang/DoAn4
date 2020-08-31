@extends('layouts.admin')

@section('content')

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Quản lý Hoá Đơn Bán</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->              
                            @if(Session::has('ok'))
                                <div class="alert alert-success">
                                    {{Session::get('ok')}}
                                </div>
                            @endif        
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>              
                                    <form action="{{route('admin.hdb_edit')}}" method="Post">
                                        <div class="modal-body">
                                           @csrf  
                                                <input type="hidden" id="id" name="id">  
                                                <div class="row">
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
                                                    </div><div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Trạng thái</label>
                                                            <input id="trangthai" name="trangthai" type="text" class="form-control" placeholder="Điền vào">
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
                                                <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 203px;">Mã HĐB</th>
                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Mã khách hàng</th>
                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Tên người nhận</th>
                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Địa chỉ</th>
                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Số điện thoại</th>
                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Chú thích</th>
                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Trạng thái</th>
                                                <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Ngày bán</th>
                                                <th style="width: 127px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($list as $item)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$item->id}}</td>
                                                    <td>{{$item->id_tk}}</td>
                                                    <td>{{$item->hoten}}</td>
                                                    <td>{{$item->diachi}}</td>
                                                    <td>{{$item->sdt}}</td>
                                                    <td>{{$item->chuthich}}</td>
                                                    <td>{{$item->get_status()}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>
                                                        <div class="form-button-action">
                                                            <button class="btn btn-link btn-primary btn-lg" onClick="viewOneHDb('{{$item->id}}')">
                                                                <i class="fa fa-eye"></i>
                                                            </button>
                                                            <button type="button" data-role="edit" data-id="{{ $item->id }}" class="btn btn-link btn-primary btn-lg" data-original-title="Sửa">
                                                                <i class="fa fa-edit"></i>
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
    <!-- modal scroll -->
    <div class="modal fade" id="viewOne" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scrollmodalLabel">Chi tiết đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="display table table-striped table-hover dataTable">
                        <thead>
                            <tr role="row">
                                <td>Mã sản phẩm</td>
                                <td>Hình ảnh</td>
                                <td>Tên sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Giá</td>
                            </tr>
                        </thead>
                        <tbody id="danh-sach-chi-tiet"></tbody>
                    </table>
                    <div class="row">
                        <label class="col-md-6">Tổng sản phẩm: </label>
                        <label class="col-md-6" id="tong-san-pham">0</label>
                    </div>
                    <div class="row">
                        <label class="col-md-6">Tổng tiền: </label>
                        <label class="col-md-6" id="tong-tien">0</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal scroll -->
@endsection
  @section('script')
    <script>
        function viewOneHDb(id) {
        $("#danh-sach-chi-tiet").html("");
        $.get('{{route('admin.hdb_ct')}}', { id: id }, function (data) {
            $.each(data.ds, function (i, val) {
                $("#danh-sach-chi-tiet").append(
                `<tr role="row" class="odd">
                    <td>${val.id} </td>
                    <td><img src="anh/anhsp/${val.hinhanh}" style="width: 100px; height: 111px;"></td>
                    <td>${val.name}</td>
                    <td>${val.soluong}</td>
                    <td>${val.gia} VNĐ</td>
                </tr>`
                );
            });
            $("#tong-san-pham").html(data.soluong);
            $("#tong-tien").html(data.tongtien);
            console.log(data)
            $('#viewOne').modal("show");
        });
    }

            $("[data-role=edit]").click(function() {
            let id = $(this).attr('data-id');
            $.get('{{route('admin.hdb_data')}}', { id: id }, function(data){
                $('#id').val(data.id);
                $('#diachi').val(data.diachi);
                $('#sdt').val(data.sdt);
                $('#trangthai').val(data.trangthai);
                $('#modal').modal('show');
            });
        });
    </script>
@endsection
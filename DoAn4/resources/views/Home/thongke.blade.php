@extends('layouts.admin')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Thống kê theo ngày bán</h4>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-3"> 
                               <input type="date" id="date" class="form-control" onchange="change_time(this)">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="col-sm-12">
                                <table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 200px;">Ngày Bán</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Mã sản phẩm</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Giá bán</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">Số lượng</th>
                                        </tr>
                                    </thead>
                                    <tbody id="danh-sach">
                                    </tbody>
                                    <tr>
                                        <td>Tổng doanh thu: </td>
                                        <td colspan="4" id="tong-tien">0</td>
                                    </tr>
                                    <tr>
                                        <td>Tổng số lượng: </td>
                                        <td colspan="4" id="so-luong">0</td>
                                    </tr>
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

<script>
    function change_time(e) {
        let time = $(e).val();
        
        $.get("{{ route('tinhtien') }}", { time: time }, function (data) {
            $("#tong-tien").html(data.tongtien + " đ");
            $("#so-luong").html(data.soluong);
            $("#danh-sach").html("");

            $.each(data.ds, function (i, val) {
                $("#danh-sach").append("<tr role=\"row\" class=\"odd\">\
                <td class=\"sorting_1\">" + val.created_at + "</td>\
                <td>" + val.id + "</td>\
                <td>" + val.gia + "</td>\
                <td>" + val.soluong + "</td>\
            </tr>");
            });
        });
    }
</script>
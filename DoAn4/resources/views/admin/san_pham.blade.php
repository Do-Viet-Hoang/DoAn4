@extends('layouts.admin')

@section('content')

<div class="main-panel">
    <div class="content">
        <div class="page-inner">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Sản phẩm</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-role="add">
                                    <i class="fa fa-plus"></i>
                                    Thêm sản phẩm
                                </button>
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
                                    <form action="{{route('admin.sanpham-add')}}" method="Post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                           @csrf  
                                                <input type="hidden" id="id" name="id">  
                                                <input type="hidden" id="id_loai" name="id_loai"> 
                                                <input type="hidden" id="action" name="action">  
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Loại</label>
                                                            <select name="id_loai" id="id_loai" class="form-control">
                                                                @foreach ($loai as $item)
                                                                    <option value="{{$item->id}}"> {{$item->name}} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Tên sản phẩm</label>
                                                            <input id="name" name="name" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Hãng</label>
                                                            <input id="hangsp" name="hangsp" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Giá</label>
                                                            <input id="gia" name="gia" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Màn hình</label>
                                                            <input id="manhinh" name="manhinh" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Hệ điều hành</label>
                                                            <input id="hedieuhanh" name="hedieuhanh" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>CPU</label>
                                                            <input id="cpu" name="cpu" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Camera Trước</label>
                                                            <input id="cameratruoc" name="cameratruoc" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Camera Sau</label>
                                                            <input id="camerasau" name="camerasau" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Ram</label>
                                                            <input id="ram" name="ram" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Bộ nhớ</label>
                                                            <input id="bonho" name="bonho" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Sim</label>
                                                            <input id="sim" name="sim" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Pin</label>
                                                            <input id="pin" name="pin" type="text" class="form-control" placeholder="Điền vào">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Hình ảnh</label>
                                                            <input type="file" id="hinhanh" name="hinhanh" class="form-control col-md-7 col-xs-12" >
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
                                <div class="col-sm-12"><table id="add-row" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="add-row_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 193px;">ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 283px;">ID Loại</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Tên</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Hãng</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Giá</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Màn hình</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Hệ điều hành</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">CPU</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Camera Trước</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Camera Sau</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Ram</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Bộ nhớ</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Sim</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Pin</th>
                                            <th class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 152px;">Hình ảnh</th>
                                            <th style="width: 127px;" class="sorting" tabindex="0" aria-controls="add-row" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                        @foreach ($list as $item)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{$item->id}}</td>
                                                <td>{{$item->id_loai}}</td>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->hangsp}}</td>
                                                <td>{{number_format($item->gia)}}</td>
                                                <td>{{$item->manhinh}}</td>
                                                <td>{{$item->hedieuhanh}}</td>
                                                <td>{{$item->cpu}}</td>
                                                <td>{{$item->cameratruoc}}</td>
                                                <td>{{$item->camerasau}}</td>
                                                <td>{{$item->ram}}</td>
                                                <td>{{$item->bonho}}</td>
                                                <td>{{$item->sim}}</td>
                                                <td>{{$item->pin}}</td>
                                                <td><img style="width: 30px; height: 30px;" src="anh/anhsp/{{$item->hinhanh}}" /></td>
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
            $.get('{{route('admin.sanpham-data')}}', { id: id }, function(data){
                $('#id').val(data.id);
                $('#id_loai').val(data.id_loai);
                $('#name').val(data.name);
                $('#hangsp').val(data.hangsp);
                $('#gia').val(data.gia);
                $('#manhinh').val(data.manhinh);
                $('#hedieuhanh').val(data.hedieuhanh);
                $('#cpu').val(data.cpu);
                $('#cameratruoc').val(data.cameratruoc);
                $('#camerasau').val(data.camerasau);
                $('#ram').val(data.ram);
                $('#bonho').val(data.bonho);
                $('#sim').val(data.sim);
                $('#pin').val(data.pin);
                $('#action').val('2');

                $('#modal').modal('show');
            });
        });

        $("[data-role=delete]").click(function(){
            let id = $(this).attr('data-id');
            $.get('{{route('admin.sanpham-delete')}}', { id: id }, function(data){
                location.reload();
            });
        });

        $("[data-role=add]").click(function(){

            $('#id').val('');
            $('#id_loai').val('');
            $('#name').val('');
            $('#hangsp').val('');
            $('#gia').val('');
            $('#manhinh').val('');
            $('#hedieuhanh').val('');
            $('#cpu').val('');
            $('#cameratruoc').val('');
            $('#camerasau').val('');
            $('#ram').val('');
            $('#bonho').val('');
            $('#sim').val('');
            $('#pin').val('');

            $('#action').val('1');
            $('#modal').modal('show');
        });
    </script>
@endsection
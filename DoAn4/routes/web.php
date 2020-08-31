<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
    'as' => 'index', 
    'uses' => 'HomeController@getIndex',
]);

Route::get('loai/{id}', [
    'as' => 'loai', 
    'uses' => 'LoaiController@get_loai',
]);
Route::get('search', [
    'as' => 'search', 
    'uses' => 'TimKiemController@getSeach',
]);
Route::get('sanpham/{id}', [
    'as' => 'sanpham', 
    'uses' => 'SanPhamController@getsp',
]);
Route::get('khachhang', [
    'as' => 'khachhang',
    'uses' => 'KhachHangController@data',
]);

Route::post('khachhangthem', [
    'as' => 'khachhangthem',
    'uses' => 'KhachHangController@post_them',
]);
Route::post('dangnhap', [
    'as' => 'dangnhap',
    'uses' => 'KhachHangController@post_dangnhap',
]);
Route::get('loadgiohang', [
    'as' => 'loadgiohang',
    'uses' => 'KhachHangController@post_dangnhap',
]);
Route::get('load', [
    'as' => 'load',
    'uses' => 'GioHangController@load'
]);
Route::get('xoact', [
    'as' => 'xoact',
    'uses' => 'GioHangController@xoact'
]);
Route::get('out', [
    'as' => 'out',
    'uses' => 'KhachHangController@out'
]);

// group cart

Route::group(['prefix' => 'gio-hang'], function () {
    Route::get('/', [
        'as' => 'cart.list',
        'uses' => 'GioHangController@getList'
    ]);
    Route::get('get', [
        'as' => 'cart.get',
        'uses' => 'GioHangController@getgiohang'
    ]);
    Route::post('add', [
        'as' => 'cart.add',
        'uses' => 'GioHangController@addTogiohang'
    ]);
    Route::get('change', [
        'as' => 'cart.change',
        'uses' => 'GioHangController@changesoluong'
    ]);
    Route::get('remove', [
        'as' => 'cart.remove',
        'uses' => 'GioHangController@removeIngiohang'
    ]);
    Route::post('checkout', [
        'as' => 'cart.checkout',
        'uses' => 'GioHangController@checkout'
    ]);
    
  
});

Route::group(['prefix' => 'admin'], function () {

    // loại sản phẩm

    Route::get('loai-sp', [
        'as' => 'admin.loaisp', 
        'uses' => 'Admin\LoaiSpController@get_loai_sp',
    ]);

    Route::post('loai-sp-add', [
        'as' => 'admin.loaisp-add', 
        'uses' => 'Admin\LoaiSpController@post_add',
    ]);
    
    Route::get('loai-sp-data', [
        'as' => 'admin.loaisp-data', 
        'uses' => 'Admin\LoaiSpController@get_data',
    ]);

    Route::get('loai-sp-delete', [
        'as' => 'admin.loaisp-delete', 
        'uses' => 'Admin\LoaiSpController@get_xoa',
    ]);

    // nhà cung cấp

    Route::get('nha_cung_cap', [
        'as' => 'admin.nhacungcap', 
        'uses' => 'Admin\NhaCungCapController@get_ncc',
    ]);

    Route::post('nha_cung_cap-add',[
        'as' => 'admin.nhacungcap-add',
        'uses' => 'Admin\NhaCungCapController@post_ncc'
    ]);
    
    Route::get('nha_cung_cap_data', [
        'as' => 'admin.nhacungcap-data',
        'uses' => 'Admin\NhaCungCapController@get_data'
    ]);

    Route::get('nha_cung_cap_delete', [
        'as' => 'admin.nhacungcap-delete',
        'uses' => 'Admin\NhaCungCapController@get_delete'
    ]);

    // sản phẩm

    Route::get('san_pham',[
        'as' => 'admin.san_pham',
        'uses' => 'Admin\SanPhamController@get_sp'
    ]);
    
    Route::post('san_pham-add', [
        'as' => 'admin.sanpham-add',
        'uses' => 'Admin\SanPhamController@post_sp'
    ]);
    
    Route::get('san_pham_data', [
        'as' => 'admin.sanpham-data',
        'uses' => 'Admin\SanPhamController@get_data'
    ]);

    Route::get('san_pham_delete', [
        'as' => 'admin.sanpham-delete',
        'uses' => 'Admin\SanPhamController@get_delete'
    ]);
    
    // hóa đơn bán

    Route::get('hdb', [
        'as' => 'admin.hdb',
        'uses' => 'Admin\HoaDonBanController@get_hdb'
    ]);
    
    Route::get('hdb_ct', [
        'as' => 'admin.hdb_ct',
        'uses' => 'Admin\HoaDonBanController@get_cthdb'
    ]);
    Route::get('hdb_data', [
        'as' => 'admin.hdb_data',
        'uses' => 'Admin\HoaDonBanController@get_data'
    ]);
    Route::post('hdb_edit',[
        'as' => 'admin.hdb_edit',
        'uses' => 'Admin\HoaDonBanController@post_hdb'
    ]);

    // Tài khoản

    Route::get('taikhoan',[
        'as' => 'admin.taikhoan',
        'uses' => 'Admin\TaiKhoanController@get_tk'
    ]);

    Route::post('tk-add',[
        'as' => 'admin.tk-add',
        'uses' => 'Admin\TaiKhoanController@post_tk'
    ]);
    
    Route::get('tk_data', [
        'as' => 'admin.tk-data',
        'uses' => 'Admin\TaiKhoanController@get_data'
    ]);

    Route::get('tk_delete', [
        'as' => 'admin.tk-delete',
        'uses' => 'Admin\TaiKhoanController@get_delete'
    ]);

    // thong ke
    Route::get('thongke', [
        'as' => 'thongke',
        'uses' => 'ThongKeController@thongke'
    ]);
    Route::get('tinhtien', [
        'as' => 'tinhtien',
        'uses' => 'ThongKeController@tinhtien'
    ]);



});


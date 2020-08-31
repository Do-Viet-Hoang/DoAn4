<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hoa_don_ban extends Model
{
    protected $table='hoadonban';
    protected $status=[
        'Chưa giao hàng',
        'Đang giao',
        'Giao thành công',
        'Không nhận hàng',
        'Hủy'    
    ];
    public function get_status()
    {
        return $this->status[$this->trangthai];

    }
    public function khachhang() {
        return $this->belongTo('App\Models\User', 'id_tk', 'id');
    }

    public function chi_tiet() {
        return $this->hasMany('App\Models\chi_tiet_hoa_don_ban', 'id_hdb', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chi_tiet_hoa_don_ban extends Model
{
    protected $table='chitiethoadonban';
    
    public function sanpham() {
        return $this->belongsTo('App\Models\san_pham', 'id_sp', 'id');
    }

    public function hoadon() {
        return $this->belongsTo('App\Models\hoa_don_ban', 'id_hdb', 'id');
    }
}

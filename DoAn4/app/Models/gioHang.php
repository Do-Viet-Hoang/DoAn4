<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class gioHang extends Model
{
    protected $table='giohang';
    
    public function product(){
        return $this->belongTo('App\Models\san_pham', 'product_id', 'id');
    }
    
    
    public function taikhoan(){
        return $this->belongTo('App\Models\User', 'id_tk', 'id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class loai_sp extends Model
{
    protected $table='loai_sp';
    
    public function product(){
        return $this->hasMany('App\Models\san_pham', 'id_loai', 'id');
    }
}
 
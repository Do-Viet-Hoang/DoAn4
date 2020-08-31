<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class san_pham extends Model
{
    protected $table='san_pham';
    
    public function product_type()
    {
        return $this->belongTo('App\Models\loai_sp','id_loai', 'id');
    }
}

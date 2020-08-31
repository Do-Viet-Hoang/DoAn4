<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\loai_sp;

use App\Models\san_pham;

class LoaiController extends Controller
{
    public function get_loai($id)
    {
        $list = san_pham::where('id_loai', $id)->get();
        $category = loai_sp::find($id);
        return view('Home.loai', compact('list' , 'category'));
    }
   
}

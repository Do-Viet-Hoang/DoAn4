<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\san_pham;

use App\Models\loai_sp;

class SanPhamController extends Controller
{
   public function getsp($id)
   {
       $sanpham = san_pham::find($id);

       $sanphamlq = san_pham::where("id_loai", $sanpham->id_loai)->where("id", "<>", $sanpham->id)->get()->take(4);
       return view('Home.sanpham', compact('sanpham', "sanphamlq"));
   }
}

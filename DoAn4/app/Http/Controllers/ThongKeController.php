<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hoa_don_ban;


class ThongKeController extends Controller
{
    public function tinhtien(Request $request)
    {
       $hdb= hoa_don_ban::where("created_at", ">=", date("Y-m-d H:i:s", strtotime($request->time)))->get();

       $ds_sp = [];
       $tongtien = 0;
       $soluong = 0;

       foreach ($hdb as $key => $hd) {
           foreach ($hd->chi_tiet as $ct) {
                $ds_sp[] = $ct;
                $tongtien += $ct->gia;
                $soluong += $ct->soluong;
           }
       }

       return response()->json(['ds'=>$ds_sp, 'tongtien'=>$tongtien, 'soluong'=>$soluong]);
    }

    public function thongke()
    {
        return view('Home.thongke');
    } 
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Models\hoa_don_ban;
use App\Models\chi_tiet_hoa_don_ban;

class HoaDonBanController extends Controller
{
    
    public function get_hdb()
    {
        $list = hoa_don_ban::all();
        return view('admin.hoadonban', compact('list'));
    }
    public function get_cthdb(Request $request)
    {
        $hdb=hoa_don_ban::find($request->id)->chi_tiet;
        $soluong=0;
        $tongtien=0;
        $ct = [];
        foreach ($hdb as $item) {
            $ct[] = [
                'id'=>$item->id_sp,
                'name'=>$item->sanpham->name,
                'soluong'=>$item->soluong,
                'hinhanh'=>$item->sanpham->hinhanh,
                'gia'=>$item->gia
            ];
            $soluong += $item->soluong;
            $tongtien = $item->gia * $soluong;
        }

        return response()->json(['ds' => $ct, 'soluong'=>$soluong, 'tongtien' => $tongtien]);
    }

    public function get_data(Request $request)
    {
        $hdb = hoa_don_ban::find($request->id);
        return response()->json($hdb);
    }

    public function post_hdb(Request $request)
    {
        $hdb = hoa_don_ban::find($request->id);
            if($hdb != null)
            {
                $hdb->diachi = $request->diachi;
                $hdb->sdt = $request->sdt;
                $hdb->trangthai = $request->trangthai;
                $hdb->save();
                return redirect()->back()->with('ok', 'Đã sửa thành công!');
            }
    }

}

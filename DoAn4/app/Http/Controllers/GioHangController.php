<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gioHang;
use App\Models\san_pham;
use App\Models\hoa_don_ban;
use App\Models\chi_tiet_hoa_don_ban;
use Session;
use Auth;

class GioHangController extends Controller
{
    public function load()
    {
        $user = Auth::user();
        $giohang = gioHang::all();
        $tong=0;
        foreach($giohang as $item)
        {
            $tong += $item->soluong * $item->gia;
            $item->tong = $item->soluong * $item->gia;
        }
        return view('Home.xemgiohang', compact('giohang', 'tong', 'user'));
    }
    public function getList() {
        $tong = 0;
        $giohang = gioHang::all();
        foreach ($giohang as $item) {
            $tong += $item->gia * $item->soluong;
        }
        return view("pages.giohang", compact('giohang', 'tong'));
    }
    public function getgiohang() {
        $tong = 0;
        $count = 0;
        $giohang = gioHang::all();
        foreach ($giohang as $item) {
            $tong += $item->gia;
            $count += $item->soluong;
        }
        return response()->json([
            'giohang' => $giohang,
            'tong' => $tong,
            'count' => $count
        ]);
    }
    public function addTogiohang(Request $request) {
        if(!Auth::check()){
            return response()->json(['status'=>'login']);
        }
        $id_tk=Auth::user()->id;
        $giohang=gioHang::all();
        $soluong = 1;
        if($request->has('soluong')) {
            $soluong = $request->soluong;
        }
        $sanpham = san_pham::find($request->has("id") ? $request->id : -1);
        if($sanpham != null) {
            $check=gioHang::where('product_id', $request->id)->first();
            if($check) {
                $check->soluong += $soluong;
                $check->tong = $check->soluong * $check->gia;
                $check->save();
            } else {
                $new_giohang = new gioHang();
                $new_giohang->id_tk = $id_tk;
                $new_giohang->soluong = $soluong;
                $new_giohang->product_id=$sanpham->id;
                $new_giohang->name = $sanpham->name;
                $new_giohang->gia = $sanpham->gia;
                $new_giohang->tong = $sanpham->gia;
                $new_giohang->hinhanh = $sanpham->hinhanh;
                $new_giohang->save();
            }
        } else {
            return response()->json(['status'=>'error']);
        }
        return $this->getgiohang();
    }
    public function changesoluong(Request $request) {

        $check = gioHang::find($request->id);
        if($check) {
            $check->soluong = $request->soluong;
            $check->tong = $check->soluong * $check->gia;
            $check->save();

            $tong = 0;
            $giohang = gioHang::all();
            foreach ($giohang as $item) {
                $tong += $item->tong;
            }

            return response()->json(['subtotal'=>$check->tong, 'total'=>$tong]);
        } else {
            return response()->json(['status'=>'error']);
        }
    }
    public function removeIngiohang(Request $request) {
        gioHang::find($request->id)->delete();
        return $this->getgiohang();
    }
    
    public function xoact(Request $request ) {
        gioHang::find($request->id)->delete();
        return redirect()->back();
    }

    public function checkout(Request $request) {
        $hoadon = new hoa_don_ban();

        $hoadon->id_tk = Auth::user()->id;
        $hoadon->hoten = $request->hoten;
        $hoadon->diachi = $request->diachi;
        $hoadon->sdt = $request->sdt;
        $hoadon->chuthich = $request->chuthich;
        $hoadon->trangthai = 0;

        $hoadon->save();
        
        $giohang=gioHang::all();
        foreach ($giohang as $item) {
            $chitiet = new chi_tiet_hoa_don_ban();

            $chitiet->id_hdb = $hoadon->id;
            $chitiet->id_sp = $item->product_id;
            $chitiet->soluong = $item->soluong;
            $chitiet->gia = $item->gia;

            $chitiet->save();

            $item->delete();
        }
        return redirect()->route('index');
    }
}

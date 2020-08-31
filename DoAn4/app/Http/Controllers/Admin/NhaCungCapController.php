<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\nha_cung_cap;

class NhaCungCapController extends Controller
{
    public function get_ncc()
    {
        $list = nha_cung_cap::all();
        return view('admin.nha_cung_cap', compact('list'));
    }
    public function post_ncc(Request $request)
    {
        if($request->action == 1)
        {
            $ncc = new nha_cung_cap();
            $ncc->name = $request->name;
            $ncc->diachi = $request->diachi;
            $ncc->sdt = $request->sdt;
            $ncc->save();
            return redirect()->back()->with('ok', 'Đã thêm thành công!');
        }
        else {
            $ncc = nha_cung_cap::find($request->id);
            if($ncc != null)
            {
                $ncc->name = $request->name;
                $ncc->diachi = $request->diachi;
                $ncc->sdt = $request->sdt;
                $ncc->save();
                return redirect()->back()->with('ok', 'Đã sửa thành công!');
            }
        }
    }

    public function get_data(Request $request)
    {
        $ncc = nha_cung_cap::find($request->id);
        return response()->json($ncc);
    }
    
    public function get_delete(Request $request)
    {
        $ncc = nha_cung_cap::find($request->id);
        $ncc->delete($request->id);
    }
}

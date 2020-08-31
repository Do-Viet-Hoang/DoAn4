<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\loai_sp;

class LoaiSpController extends Controller
{
    public function get_loai_sp()
    {
        $list = loai_sp::all();
        return view('admin.loai_sp', compact('list'));
    }
    
    public function post_add(Request $request)
    {
        if($request->action == 1)
        {
            $lsp = new loai_sp();
            $lsp->name = $request->name;
            $lsp->mota = $request->mota;
            $lsp->save();
            return redirect()->back()->with('ok', 'Đã thêm thành công!');
        }
        else {
            $lsp= loai_sp::find($request->id);
            if($lsp != null)
            {
                $lsp->name = $request->name;
                $lsp->mota = $request->mota;
                $lsp->save();
                return redirect()->back()->with('ok', 'Đã sửa thành công!');
            }
        }
    }
    public function get_data(Request $request)
    {
        $lsp= loai_sp::find($request->id);

        return response()->json($lsp);
    }

    public function get_xoa(Request $request)
    {
        $lsp= loai_sp::find($request->id);

        $lsp->delete($request->id);
    }
}

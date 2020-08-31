<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class TaiKhoanController extends Controller
{
    public function get_tk()
    {
        $list = User::all();
        return view('admin.taikhoan', compact('list'));
    }
    public function post_tk(Request $request)
    {
        if($request->action == 1)
        {
            $tk = new User();
            $tk->username = $request->username;
            $kh->password = Hash::make($request->password);
            $tk->hoten = $request->hoten;
            $tk->diachi = $request->diachi;
            $tk->sdt = $request->sdt;
            $tk->email = $request->email;
            $tk->save();
            return redirect()->back()->with('ok', 'Đã thêm thành công!');
        }
        else {
            $tk = User::find($request->id);
            if($tk != null)
            {
                $tk->password = $request->password;
                $tk->hoten = $request->hoten;
                $tk->diachi = $request->diachi;
                $tk->sdt = $request->sdt;
                $tk->email = $request->email;
                $tk->save();
                return redirect()->back()->with('ok', 'Đã sửa thành công!');
            }
        }
    }

    public function get_data(Request $request)
    {
        $tk = User::find($request->id);
        return response()->json($tk);
    }
    
    public function get_delete(Request $request)
    {
        $tk = User::find($request->id);
        $tk->delete($request->id);
    }
}

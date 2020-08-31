<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class KhachHangController extends Controller
{
    public function data()
    {
        return view('Home.khachhang');
    }

    public function post_dangnhap(Request $request)
    {
        $this->validate($request,
            [
                'username' => 'required',
                'password'=>'required|min:3|max:20'
            ],
            [
                'username.required'=>'Vui lòng nhập tài khoản',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 4 ký tự',
                'password.max'=>'Mật khẩu không vượt quá 20 ký tự'
            ]
        );

        if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])) {
            return redirect()->route('index');
        }else {
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

    public function post_them(Request $request)
    {
            $db= new User();
            $db=User::Where('username',$request->username)->first();
            if($db!= null)
            {
                return redirect()->back()->with('ok','Tên tài khoản đã tồn tại >_<'); 
            }
            $kh = new User();
            $kh->username = $request->username;
            $kh->password = Hash::make($request->password);
            $kh->hoten = $request->hoten;
            $kh->diachi = $request->diachi;
            $kh->sdt = $request->sdt;
            $kh->email = $request->email;
            $kh->save();
            return redirect()->back()->with('ok','Tạo tài khoản thành công mời bạn đăng nhập >_<'); 
    }
    public function out()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}

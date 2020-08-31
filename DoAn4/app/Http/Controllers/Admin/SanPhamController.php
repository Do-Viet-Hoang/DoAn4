<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Models\loai_sp;
use Str;
use Storage;

class SanPhamController extends Controller
{
    public function get_sp()
    {
        $list = san_pham::all();
        $loai = loai_sp::all();
        return view('admin.san_pham', compact('list','loai'));
    }
    
    public function post_sp(Request $request)
    {
        if($request->action == 1)
        {
            $sp = new san_pham();
            $sp->id_loai = $request->id_loai;
            $sp->name = $request->name;
            $sp->hangsp = $request->hangsp;
            $sp->gia = $request->gia;
            $sp->manhinh = $request->manhinh;
            $sp->hedieuhanh = $request->hedieuhanh;
            $sp->cpu = $request->cpu;
            $sp->cameratruoc = $request->cameratruoc;
            $sp->camerasau = $request->camerasau;
            $sp->ram = $request->ram;
            $sp->bonho = $request->bonho;
            $sp->sim = $request->sim;
            $sp->pin = $request->pin;

            $file = $request->hinhanh;

            $file_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();

            $file_name = Str::random(10).'_'.time().'.'.$file_extension;

            $path = Storage::disk('anh')->putFileAs(
                'anhsp',
                $file,
                $file_name
            );

            $sp->hinhanh=$file_name;

            $sp->save();
            return redirect()->back()->with('ok', 'Đã thêm thành công'); 
        }
        else {
            $sp = san_pham::find($request->id);
            if($sp != null)
            {
                $sp->name = $request->name;
                $sp->hangsp = $request->hangsp;
                $sp->gia = $request->gia;
                $sp->manhinh = $request->manhinh;
                $sp->hedieuhanh = $request->hedieuhanh;
                $sp->cpu = $request->cpu;
                $sp->cameratruoc = $request->cameratruoc;
                $sp->camerasau = $request->camerasau;
                $sp->ram = $request->ram;
                $sp->bonho = $request->bonho;
                $sp->sim = $request->sim;
                $sp->pin = $request->pin;

                if($request->hasFile('hinhanh'))
                {
                    $file = $request->hinhanh;
    
                    $file_name = $file->getClientOriginalName();
                    $file_extension = $file->getClientOriginalExtension();
    
                    $file_name = Str::random(10).'_'.time().'.'.$file_extension;
    
                    $path = Storage::disk('anh')->putFileAs(
                        'anhsp',
                        $file,
                        $file_name
                    );
    
                    $sp->hinhanh=$file_name;
                }

                $sp->save();
                return redirect()->back()->with('ok', 'Đã sửa thành công');
            }
        }
    }

    public function get_data(Request $request)
    {
        $sp = san_pham::find($request->id);
        return response()->json($sp);
    }

    public function get_delete(Request $request)
    {
        $sp = san_pham::find($request->id);
        $sp->delete($request->id);
    }
}

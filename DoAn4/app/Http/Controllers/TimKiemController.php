<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\san_pham;

class TimKiemController extends Controller
{
    public function getSeach(Request $request)
    {
        $sp = san_pham::where('name', 'like', '%'.$request->ten.'%')
                       ->orwhere('gia', $request->ten)
                       ->get();
        return view('Home.timkiem', compact('sp'));
    }
}

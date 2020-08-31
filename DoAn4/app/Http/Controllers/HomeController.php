<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\san_pham;
use App\Models\loai_sp;

class HomeController extends Controller
{
    public function getIndex()
    {
        $list = san_pham::all();
        $new = san_pham::orderBy('id', 'desc')->get();
        $loai= loai_sp::all();
        return view('Home.Index', compact('list', 'loai', 'new'));
    }
    
}

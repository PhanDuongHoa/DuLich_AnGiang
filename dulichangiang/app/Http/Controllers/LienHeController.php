<?php

namespace App\Http\Controllers;

use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Exports\LienHeExport;
use Maatwebsite\Excel\Facades\Excel;

class LienHeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getDanhSach()
    {
        $lienhe = LienHe::orderBy('created_at', 'desc')->get();
        return view('admin.lienhe.danhsach', compact('lienhe'));
    }  
    
    public function getXuat()
    {
        return Excel::download(new LienHeExport,'lienhe.xlsx');
    }
}
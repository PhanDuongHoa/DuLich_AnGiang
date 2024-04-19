<?php

namespace App\Http\Controllers;

use App\Models\DoiTac;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class DoiTacController extends Controller
{
    public function getDanhSach()
    {
        $doitac = DoiTac::all();
        return view('admin.doitac.danhsach', compact('doitac'));
    }
    public function getThem()
    {
        return view('admin.doitac.them');
    }
    public function postThem(Request $request)
    {
        // Kiểm tra
        $request->validate([
            'tendoitac' => ['required', 'string', 'max:191', 'unique:doitac'],
        ]);

        $orm = new DoiTac();
        $orm->tendoitac = $request->tendoitac;
        $orm->tendoitac_slug = Str::slug($request->tendoitac, '-');
        $orm->save();
        // Sau khi thêm thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.doitac');
    }
    public function getSua($id)
    {
        $doitac = DoiTac::find($id);
        return view('admin.doitac.sua', compact('doitac'));
    }
    public function postSua(Request $request, $id)
    {
        // Kiểm tra
        $request->validate([
            'tendoitac' => ['required', 'string', 'max:191', 'unique:doitac,tendoitac,' . $id],
        ]);

        $orm = DoiTac::find($id);
        $orm->tendoitac = $request->tendoitac;
        $orm->tendoitac_slug = Str::slug($request->tendoitac, '-');
        $orm->save();
        // Sau khi sửa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.doitac');
    }
    public function getXoa($id)
    {
        $orm = DoiTac::find($id);
        $orm->delete();
        // Sau khi xóa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.doitac');
    }
}

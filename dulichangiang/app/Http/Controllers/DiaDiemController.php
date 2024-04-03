<?php

namespace App\Http\Controllers;

use App\Models\DiaDiem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DiaDiemController extends Controller
{
    public function getDanhSach()
    {
        $diadiem = DiaDiem::all();
        return view('admin.diadiem.danhsach', compact('diadiem'));
    }
    public function getThem()
    {
        return view('admin.diadiem.them');
    }
    public function postThem(Request $request)
    {
        // Kiểm tra
        $request->validate([
            'tendiadiem' => ['required', 'string', 'max:191', 'unique:diadiem'],
        ]);

        $orm = new DiaDiem();
        $orm->tendiadiem = $request->tendiadiem;
        $orm->tendiadiem_slug = Str::slug($request->tendiadiem, '-');
        $orm->save();
        // Sau khi thêm thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.diadiem');
    }
    public function getSua($id)
    {
        $diadiem = DiaDiem::find($id);
        return view('admin.diadiem.sua', compact('diadiem'));
    }
    public function postSua(Request $request, $id)
    {
        // Kiểm tra
        $request->validate([
            'tendiadiem' => ['required', 'string', 'max:191', 'unique:diadiem, tendiadiem,' . $id],
        ]);

        $orm = DiaDiem::find($id);
        $orm->tendiadiem = $request->tendiadiem;
        $orm->tendiadiem_slug = Str::slug($request->tentendiadiemchude, '-');
        $orm->save();
        // Sau khi sửa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.diadiem');
    }
    public function getXoa($id)
    {
        $orm = DiaDiem::find($id);
        $orm->delete();
        // Sau khi xóa thành công thì tự động chuyển về trang danh sách
        return redirect()->route('admin.diadiem');
    }
}

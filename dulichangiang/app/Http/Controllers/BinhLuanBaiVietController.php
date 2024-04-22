<?php

namespace App\Http\Controllers;

use App\Models\BaiViet;
use App\Models\BinhLuanBaiViet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class BinhLuanBaiVietController extends Controller
{
    public function getDanhSach()
    {
        $binhluanbaiviet = BinhLuanBaiViet::orderBy('created_at', 'desc')->get();
        return view('admin.binhluanbaiviet.danhsach', compact('binhluanbaiviet'));
    }
    public function getThem()
    {
        $baiviet = BaiViet::orderBy('created_at', 'desc')->get();
        $user = User::all();
        return view('admin.binhluanbaiviet.them', compact('user','baiviet'));
    }
    public function postThem(Request $request)
    {
        // Kiểm tra
        $request->validate([
            'baiviet_id' => ['required'],
            'user_id' => ['required'],
        ]);
        $orm = new BinhLuanBaiViet();
        $orm->baiviet_id = $request->baiviet_id;
         /* $orm->user_id = Auth::user()->id; */
        $orm->user_id = $request->user_id; 
        $orm->noidungbinhluan = $request->noidungbinhluan;
        $orm->save();
        // Sau khi thêm thành công thì tự động chuyển về trang danh sách
        return redirect()->back();
    }
    public function getSua($id)
    {
        $binhluanbaiviet = BinhLuanBaiViet::find($id);
        if (!$binhluanbaiviet) {
            return redirect()->route('frontend.home')->with('error', 'Bình luận không tồn tại.');
        }
        return view('frontend.binhluanbaiviet.sua', compact('binhluanbaiviet'));
    }

    public function postSua(Request $request, $id)
    {
        $request->validate([
            'noidungbinhluan' => 'required|string|max:255', // Cập nhật quy định về nội dung bình luận nếu cần thiết
        ]);

        $binhluanbaiviet = BinhLuanBaiViet::find($id);
        if (!$binhluanbaiviet) {
            return redirect()->route('frontend.home')->with('error', 'Bình luận không tồn tại.');
        }

        $binhluanbaiviet->noidungbinhluan = $request->noidungbinhluan;
        $binhluanbaiviet->save();

        return redirect()->route('frontend.baiviet.chitiet', ['tendiadiem_slug' => $binhluanbaiviet->baiviet->tieude, 'tenchude_slug' => $binhluanbaiviet->baiviet->chude->tenchude_slug, 'tieude_slug' => $binhluanbaiviet->baiviet->tieude_slug . '-' . $binhluanbaiviet->baiviet->id . '.html'])->with('success', 'Bình luận đã được cập nhật thành công.');
    }

    public function getXoa($id) {
        $binhluanbaiviet = BinhLuanBaiViet::findOrFail($id);

        // Kiểm tra xem người dùng hiện tại có quyền xóa bình luận không
        if(Auth::check() && Auth::user()->id == $binhluanbaiviet->user_id) 
        {
            $binhluanbaiviet->delete();
            return redirect()->back()->with('success', 'Bình luận đã được xóa thành công.');
        } 
        else 
        {
            return redirect()->back()->with('error', 'Bạn không có quyền xóa bình luận này.');
        }
    }

    // public function getXoa($id)
    // {
    //     $orm = BinhLuanBaiViet::find($id);
    //     $orm->delete();
    //     // Sau khi xóa thành công thì tự động chuyển về trang danh sách
    //     return redirect()->route('admin.binhluanbaiviet');
    // }
    public function getKiemDuyet($id)
    {
        $orm = BinhLuanBaiViet::find($id);
        $orm->kiemduyet = 1 - $orm->kiemduyet;

        $orm->save();
        return redirect()->route('admin.binhluanbaiviet');
    }
    public function getKichHoat($id)
    {
        $orm = BinhLuanBaiViet::find($id);
        $orm->kichhoat = 1 - $orm->kichhoat;
        $orm->save();
        return redirect()->route('admin.binhluanbaiviet');
    }
}
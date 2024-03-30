<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;


class KhachHangController extends Controller
{
    public function getHome()
    {

        if(Auth::check())
        {
            $nguoidung = User::find(Auth::user()->id);
            return view('user.home', compact('nguoidung'));
        }
        else
            return redirect()->route('user.dangnhap');
    }

    public function getHoSoCaNhan()
    {
        return redirect()->route('user.home');
    }

    public function postHoSoCaNhan(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate([
        'name' => ['required', 'string', 'max:100'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $id],
        'password' => ['confirmed'],
        ]);
        $orm = User::find($id);
        $orm->name = $request->name;
        $orm->username = Str::before($request->email, '@');
        $orm->email = $request->email;
        if(!empty($request->password)) $orm->password = Hash::make($request->password);
        $orm->save();
        return redirect()->route('user.home')->with('success', 'Đã cập nhật thông tin thành công.');
    }

    public function postDangXuat(Request $request)
    {
        // Bổ sung code tại đây
        return redirect()->route('frontend.home');
    }
}
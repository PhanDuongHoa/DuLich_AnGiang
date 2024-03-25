<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserController extends Controller
{
public function getDanhSach()
{
$nguoidung = User::all();
return view('nguoidung.danhsach', compact('nguoidung'));
}
public function getThem()
{
return view('nguoidung.them');
}
public function postThem(Request $request)
{
// Kiểm tra
$request->validate([
'name' => ['required', 'string', 'max:100'],
'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
'role' => ['required'],
'password' => ['required', 'min:4', 'confirmed'],
]);
$orm = new User();
$orm->name = $request->name;
$orm->username = Str::before($request->email, '@');
$orm->email = $request->email;
$orm->password = Hash::make($request->password);
$orm->role = $request->role;
$orm->save();
// Sau khi thêm thành công thì tự động chuyển về trang danh sách
return redirect()->route('nguoidung');
}
public function getSua($id)
{
$nguoidung = User::find($id);
return view('nguoidung.sua', compact('nguoidung'));
}
public function postSua(Request $request, $id)
{
// Kiểm tra
$request->validate([
'name' => ['required', 'string', 'max:100'],
'email' => ['required', 'string', 'email', 'max:191', 'unique:users,email,' . $id],
'role' => ['required'],
'password' => ['confirmed'],
]);
$orm = User::find($request->id);
$orm->name = $request->name;
$orm->username = Str::before($request->email, '@');
$orm->email = $request->email;
$orm->role = $request->role;
if(!empty($request->password)) $orm->password = Hash::make($request->password);
$orm->save();
// Sau khi sửa thành công thì tự động chuyển về trang danh sách
return redirect()->route('nguoidung');
}
public function getXoa($id)
{
$orm = User::find($id);
$orm->delete();
// Sau khi xóa thành công thì tự động chuyển về trang danh sách
return redirect()->route('nguoidung');
}
}
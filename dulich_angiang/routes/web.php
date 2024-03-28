<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChuDeController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\BinhLuanBaiVietController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\DoiTacController;
use App\Http\Controllers\DiaDiemController;
use App\Http\Controllers\DatTourController;
use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\AdminController;


Auth::routes();

// Các trang dành cho khách chưa đăng nhập
Route::name('frontend.')->group(function() {
    // Trang chủ
    Route::get('/', [HomeController::class, 'getHome'])->name('home');
    Route::get('/home', [HomeController::class, 'getHome'])->name('home');
    
    // Tin tức
    Route::get('/bai-viet', [HomeController::class, 'getBaiViet'])->name('baiviet');
    Route::get('/bai-viet/{tenchude_slug}', [HomeController::class, 'getBaiViet'])->name('baiviet.chude');
    Route::get('/bai-viet/{tenchude_slug}/{tieude_slug}', [HomeController::class, 'getBaiViet_ChiTiet'])->name('baiviet.chitiet');

    // Tuyển dụng
    Route::get('/tuyen-dung', [HomeController::class, 'getTuyenDung'])->name('tuyendung');
    // Liên hệ
    Route::get('/lien-he', [HomeController::class, 'getLienHe'])->name('lienhe');
});

// Trang khách hàng
Route::get('/khach-hang/dang-ky', [HomeController::class, 'getDangKy'])->name('user.dangky');
Route::get('/khach-hang/dang-nhap', [HomeController::class, 'getDangNhap'])->name('user.dangnhap');

// Trang tài khoản khách hàng
Route::prefix('khach-hang')->name('user.')->group(function() {
    // Trang chủ
    Route::get('/', [KhachHangController::class, 'getHome'])->name('home');
    Route::get('/home', [KhachHangController::class, 'getHome'])->name('home');

    // Cập nhật thông tin tài khoản
    Route::get('/ho-so-ca-nhan', [KhachHangController::class, 'getHoSoCaNhan'])->name('hosocanhan');
    Route::post('/ho-so-ca-nhan', [KhachHangController::class, 'postHoSoCaNhan'])->name('hosocanhan');
    // Đăng xuất
    Route::post('/dang-xuat', [KhachHangController::class, 'postDangXuat'])->name('dangxuat');
});

// Trang tài khoản quản lý
Route::prefix('admin')->name('admin.')->group(function() {
    // Trang chủ
    Route::get('/', [AdminController::class, 'getHome'])->name('home');
    Route::get('/home', [AdminController::class, 'getHome'])->name('home');
    
    // Quản lý Tài khoản người dùng
    Route::get('/nguoidung', [UserController::class, 'getDanhSach'])->name('nguoidung');
    Route::get('/nguoidung/them', [UserController::class, 'getThem'])->name('nguoidung.them');
    Route::post('/nguoidung/them', [UserController::class, 'postThem'])->name('nguoidung.them');
    Route::get('/nguoidung/sua/{id}', [UserController::class, 'getSua'])->name('nguoidung.sua');
    Route::post('/nguoidung/sua/{id}', [UserController::class, 'postSua'])->name('nguoidung.sua');
    Route::get('/nguoidung/xoa/{id}', [UserController::class, 'getXoa'])->name('nguoidung.xoa');

    // Quản lý Chủ đề
    Route::get('/chude', [ChuDeController::class, 'getDanhSach'])->name('chude');
    Route::get('/chude/them', [ChuDeController::class, 'getThem'])->name('chude.them');
    Route::post('/chude/them', [ChuDeController::class, 'postThem'])->name('chude.them');
    Route::get('/chude/sua/{id}', [ChuDeController::class, 'getSua'])->name('chude.sua');
    Route::post('/chude/sua/{id}', [ChuDeController::class, 'postSua'])->name('chude.sua');
    Route::get('/chude/xoa/{id}', [ChuDeController::class, 'getXoa'])->name('chude.xoa');
    
    // Quản lý Bài viết
    Route::get('/baiviet', [BaiVietController::class, 'getDanhSach'])->name('baiviet');
    Route::get('/baiviet/them', [BaiVietController::class, 'getThem'])->name('baiviet.them');
    Route::post('/baiviet/them', [BaiVietController::class, 'postThem'])->name('baiviet.them');
    Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua');
    Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.sua');
    Route::get('/baiviet/xoa/{id}', [BaiVietController::class, 'getXoa'])->name('baiviet.xoa');
    Route::get('/baiviet/kiemduyet/{id}', [BaiVietController::class, 'getKiemDuyet'])->name('baiviet.kiemduyet');
    Route::get('/baiviet/kichhoat/{id}', [BaiVietController::class, 'getKichHoat'])->name('baiviet.kichhoat');
    
    // Quản lý Bình luận bài viết
    Route::get('/binhluanbaiviet', [BinhLuanBaiVietController::class, 'getDanhSach'])->name('binhluanbaiviet');
    Route::get('/binhluanbaiviet/them', [BinhLuanBaiVietController::class, 'getThem'])->name('binhluanbaiviet.them');Route::post('/binhluanbaiviet/them', [BinhLuanBaiVietController::class, 'postThem'])->name('binhluanbaiviet.them');
    Route::get('/binhluanbaiviet/sua/{id}', [BinhLuanBaiVietController::class, 'getSua'])->name('binhluanbaiviet.sua');
    Route::post('/binhluanbaiviet/sua/{id}', [BinhLuanBaiVietController::class, 'postSua'])->name('binhluanbaiviet.sua');
    Route::get('/binhluanbaiviet/xoa/{id}', [BinhLuanBaiVietController::class, 'getXoa'])->name('binhluanbaiviet.xoa');
    Route::get('/binhluanbaiviet/kiemduyet/{id}', [BinhLuanBaiVietController::class, 'getKiemDuyet'])->name('binhluanbaiviet.kiemduyet');
    Route::get('/binhluanbaiviet/kichhoat/{id}', [BinhLuanBaiVietController::class, 'getKichHoat'])->name('binhluanbaiviet.kichhoat');
});

// Trang chủ
// Route::get('/', [HomeController::class, 'getHome'])->name('frontend');
// Route::get('/home', [HomeController::class, 'getHome'])->name('frontend');

// // Quản lý Tài khoản người dùng
// Route::get('/nguoidung', [UserController::class, 'getDanhSach'])->name('nguoidung');
// Route::get('/nguoidung/them', [UserController::class, 'getThem'])->name('nguoidung.them');
// Route::post('/nguoidung/them', [UserController::class, 'postThem'])->name('nguoidung.them');
// Route::get('/nguoidung/sua/{id}', [UserController::class, 'getSua'])->name('nguoidung.sua');
// Route::post('/nguoidung/sua/{id}', [UserController::class, 'postSua'])->name('nguoidung.sua');
// Route::get('/nguoidung/xoa/{id}', [UserController::class, 'getXoa'])->name('nguoidung.xoa');

// // Quản lý Chủ đề
// Route::get('/chude', [ChuDeController::class, 'getDanhSach'])->name('chude');
// Route::get('/chude/them', [ChuDeController::class, 'getThem'])->name('chude.them');
// Route::post('/chude/them', [ChuDeController::class, 'postThem'])->name('chude.them');
// Route::get('/chude/sua/{id}', [ChuDeController::class, 'getSua'])->name('chude.sua');
// Route::post('/chude/sua/{id}', [ChuDeController::class, 'postSua'])->name('chude.sua');
// Route::get('/chude/xoa/{id}', [ChuDeController::class, 'getXoa'])->name('chude.xoa');

// // Quản lý Bài viết
// Route::get('/baiviet', [BaiVietController::class, 'getDanhSach'])->name('baiviet');
// Route::get('/baiviet/them', [BaiVietController::class, 'getThem'])->name('baiviet.them');
// Route::post('/baiviet/them', [BaiVietController::class, 'postThem'])->name('baiviet.them');
// Route::get('/baiviet/sua/{id}', [BaiVietController::class, 'getSua'])->name('baiviet.sua');
// Route::post('/baiviet/sua/{id}', [BaiVietController::class, 'postSua'])->name('baiviet.sua');
// Route::get('/baiviet/xoa/{id}', [BaiVietController::class, 'getXoa'])->name('baiviet.xoa');
// Route::get('/baiviet/kiemduyet/{id}', [BaiVietController::class, 'getKiemDuyet'])->name('baiviet.kiemduyet');
// Route::get('/baiviet/kichhoat/{id}', [BaiVietController::class, 'getKichHoat'])->name('baiviet.kichhoat');

// // Quản lý Bình luận bài viết
// Route::get('/binhluanbaiviet', [BinhLuanBaiVietController::class, 'getDanhSach'])->name('binhluanbaiviet');
// Route::get('/binhluanbaiviet/them', [BinhLuanBaiVietController::class, 'getThem'])->name('binhluanbaiviet.them');
// Route::post('/binhluanbaiviet/them', [BinhLuanBaiVietController::class, 'postThem'])->name('binhluanbaiviet.them');
// Route::get('/binhluanbaiviet/sua/{id}', [BinhLuanBaiVietController::class, 'getSua'])->name('binhluanbaiviet.sua');
// Route::post('/binhluanbaiviet/sua/{id}', [BinhLuanBaiVietController::class, 'postSua'])->name('binhluanbaiviet.sua');
// Route::get('/binhluanbaiviet/xoa/{id}', [BinhLuanBaiVietController::class, 'getXoa'])->name('binhluanbaiviet.xoa');
// Route::get('/binhluanbaiviet/kiemduyet/{id}', [BinhLuanBaiVietController::class, 'getKiemDuyet'])->name('binhluanbaiviet.kiemduyet');
// Route::get('/binhluanbaiviet/kichhoat/{id}', [BinhLuanBaiVietController::class, 'getKichHoat'])->name('binhluanbaiviet.kichhoat');

// // Các route cho quản lý Booking
// //Route::resource('dattour', DatTourController::class);

// Route::get('/dattour', [ChuDeController::class, 'getDanhSach'])->name('dattour');
// Route::get('/dattour/them', [ChuDeController::class, 'getThem'])->name('dattour.them');
// Route::post('/dattour/them', [ChuDeController::class, 'postThem'])->name('dattour.them');
// Route::get('/dattour/sua/{id}', [ChuDeController::class, 'getSua'])->name('dattour.sua');
// Route::post('/dattour/sua/{id}', [ChuDeController::class, 'postSua'])->name('dattour.sua');
// Route::get('/dattour/xoa/{id}', [ChuDeController::class, 'getXoa'])->name('dattour.xoa');

// // Các route cho quản lý Partners
// //Route::resource('doitac', DoiTacController::class);

// Route::get('/doitac', [ChuDeController::class, 'getDanhSach'])->name('doitac');
// Route::get('/doitac/them', [ChuDeController::class, 'getThem'])->name('doitac.them');
// Route::post('/doitac/them', [ChuDeController::class, 'postThem'])->name('doitac.them');
// Route::get('/doitac/sua/{id}', [ChuDeController::class, 'getSua'])->name('doitac.sua');
// Route::post('/doitac/sua/{id}', [ChuDeController::class, 'postSua'])->name('doitac.sua');
// Route::get('/doitac/xoa/{id}', [ChuDeController::class, 'getXoa'])->name('doitac.xoa');

// // Các route cho quản lý Destinations
// //Route::resource('diadiem', DiaDiemController::class);

// Route::get('/diadiem', [ChuDeController::class, 'getDanhSach'])->name('diadiem');
// Route::get('/diadiem/them', [ChuDeController::class, 'getThem'])->name('diadiem.them');
// Route::post('/diadiem/them', [ChuDeController::class, 'postThem'])->name('diadiem.them');
// Route::get('/diadiem/sua/{id}', [ChuDeController::class, 'getSua'])->name('diadiem.sua');
// Route::post('/diadiem/sua/{id}', [ChuDeController::class, 'postSua'])->name('diadiem.sua');
// Route::get('/diadiem/xoa/{id}', [ChuDeController::class, 'getXoa'])->name('diadiem.xoa');
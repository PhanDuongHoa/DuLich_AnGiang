<?php

namespace App\Http\Controllers;

use App\Models\ChuDe;
use App\Models\BaiViet;
use App\Models\BinhLuanBaiViet;
use App\Models\DiaDiem;
use App\Models\DoiTac;
use App\Models\User;
use App\Models\LienHe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
        
            $user = Socialite::driver('facebook')->user();
         
            $finduser = User::where('facebook_id', $user->id)->first();
         
            if($finduser){
         
                Auth::login($finduser);
       
                return redirect()->route('user.home');
         
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                        'name' => $user->name,
                        'facebook_id'=> $user->id,
                        'password' => encrypt('1234')
                    ]);
        
                Auth::login($newUser, true);
                return redirect()->route('user.home');
            }
       
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('user.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
        }
    }

    public function getGoogleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function getGoogleCallback()
    {
        try
        {
            $user = Socialite::driver('google')
            ->setHttpClient(new \GuzzleHttp\Client(['verify' => false]))
            ->stateless()
            ->user();
        }
        catch(Exception $e)
        {
            return redirect()->route('user.dangnhap')->with('warning', 'Lỗi xác thực. Xin vui lòng thử lại!');
        }

        $existingUser = User::where('email', $user->email)->first();
        if($existingUser)
        {
            // Nếu người dùng đã tồn tại thì đăng nhập
            Auth::login($existingUser, true);
            return redirect()->route('user.home');
        }
        else
        {
            // Nếu chưa tồn tại người dùng thì thêm mới
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'username' => Str::before($user->email, '@'),
                'password' => Hash::make('1234'), // Gán mật khẩu tự do
            ]);// Sau đó đăng nhập

            Auth::login($newUser, true);
            return redirect()->route('user.home');
        }
    }

    public function getBaiViet($tenchude_slug = '', $tendiadiem_slug = '', $tendoitac_slug = '')
    {
        if(empty($tenchude_slug) && empty($tendiadiem_slug))
        {
            $title = 'Tin tức';
            $baiviet = BaiViet::where('kichhoat', 1)
                ->where('kiemduyet', 1)
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        }
        else
        {
            $diadiem = DiaDiem::where('tendiadiem_slug', $tendiadiem_slug)
            ->firstOrFail();
            $chude = ChuDe::where('tenchude_slug', $tenchude_slug)
                ->firstOrFail();
            $doitac = DoiTac::where('tendoitac_slug', $tendoitac_slug)
            ->firstOrFail();
            $title = $chude->tenchude;
            $baiviet = BaiViet::where('kichhoat', 1)
                ->where('kiemduyet', 1)
                ->where('chude_id', $chude->id)
                ->where('diadiem_id', $diadiem->id)
                ->where('doitac_id', $doitac->id)
                ->orderBy('created_at', 'desc')
                ->paginate(9);
        }
        return view('frontend.baiviet', compact('title', 'baiviet'));
    }

    public function getHome()
    {
        // Bổ sung code tại đây
        $baiviet = BaiViet::all();
        return view('frontend.home', compact('baiviet'));
    }

    public function getBaiVietChuDe($tenchude_slug = '')
    {
        if(empty($tenchude_slug))
        {
            $title = 'Tin tức';
            $baiviet = BaiViet::where('kichhoat', 1)
            ->where('kiemduyet', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        }
        else
        {
            $chude = ChuDe::where('tenchude_slug', $tenchude_slug)
            ->firstOrFail();
            $title = $chude->tenchude;
            $baiviet = BaiViet::where('kichhoat', 1)
            ->where('kiemduyet', 1)
            ->where('chude_id', $chude->id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        }
        return view('frontend.baiviet', compact('title', 'baiviet'));
    }

    public function getBaiVietDoiTac($tendoitac_slug = '')
    {
        if(empty($tendoitac_slug))
        {
            $title = 'Tin tức';
            $baiviet = BaiViet::where('kichhoat', 1)
            ->where('kiemduyet', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        }
        else
        {
            $doitac = DoiTac::where('tendoitac_slug', $tendoitac_slug)
            ->firstOrFail();
            $title = $doitac->tendoitac;
            $baiviet = BaiViet::where('kichhoat', 1)
            ->where('kiemduyet', 1)
            ->where('doitac_id', $doitac->id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        }
        return view('frontend.baiviet', compact('title', 'baiviet'));
    }

    public function getBaiVietDiaDiem($tendiadiem_slug = '')
    {
        if(empty($tendiadiem_slug))
        {
            $title = 'Tin tức';
            $baiviet = BaiViet::where('kichhoat', 1)
            ->where('kiemduyet', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        }
        else
        {
            $diadiem = DiaDiem::where('tendiadiem_slug', $tendiadiem_slug)
            ->firstOrFail();
            $title = $diadiem->tendiadiem;
            $baiviet = BaiViet::where('kichhoat', 1)
            ->where('kiemduyet', 1)
            ->where('diadiem_id', $diadiem->id)
            ->orderBy('created_at', 'desc')
            ->paginate(9);
        }
        return view('frontend.baiviet', compact('title', 'baiviet'));
    }

    public function getBaiViet_ChiTiet($tendiadiem_slug = '', $tenchude_slug = '', $tieude_slug = '')
    {
        $tieude_id = explode('.', $tieude_slug);
        $tieude = explode('-', $tieude_id[0]);
        $baiviet_id = $tieude[count($tieude) - 1];
        
        $baiviet = BaiViet::where('kichhoat', 1)
            ->where('kiemduyet', 1)
            ->where('id', $baiviet_id)
            ->firstOrFail();
        if(!$baiviet) abort(404);
        
        // Cập nhật lượt xem
        $daxem = 'BV' . $baiviet_id;
        if(!session()->has($daxem))
        {
            $orm = BaiViet::find($baiviet_id);
            $orm->luotxem = $baiviet->luotxem + 1;
            $orm->save();
            session()->put($daxem, 1);
        }
        
        $binhluanbaiviet = BinhLuanBaiViet::where('baiviet_id', $baiviet_id)->get();
        
        $baivietcungchuyemuc = BaiViet::where('kichhoat', 1)
        ->where('kiemduyet', 1)
        ->where('chude_id', $baiviet->chude_id)
        ->where('id', '!=', $baiviet_id)
        ->orderBy('created_at', 'desc')
        ->take(4)->get();

        return view('frontend.baiviet_chitiet', compact('baiviet', 'baivietcungchuyemuc', 'binhluanbaiviet'));
    }

    public function getTuyenDung()
    {
        return view('frontend.tuyendung');
    }

    public function getLienHe()
    {
        $user = User::all();   
        //$chude = ChuDe::all();     
        return view('frontend.lienhe');
    }

    public function postLienHe(Request $request)
    {
        $orm = new LienHe();
        $orm->hoten = $request->hoten;
        $orm->email = $request->email;
        $orm->dienthoai = $request->dienthoai;
        $orm->chude = $request->chude;
        $orm->noidung = $request->noidung;
        $orm->save();
        return redirect()->route('frontend.home');
    }

    // Trang đăng ký dành cho khách hàng
    public function getDangKy()
    {
        return view('user.dangky');
    }

    // Trang đăng nhập dành cho khách hàng
    public function getDangNhap()
    {
        return view('user.dangnhap');
    } 

    public function getTimkiem(Request $request)
    {
        $searchTerm = $request->query('tieude');
        $chude = ChuDe::all();

        $baiviet = BaiViet::where('tieude', 'like', '%' . $searchTerm . '%')->get();
        //var_dump($baiviet);
        return view('frontend.timkiem', compact('baiviet', 'chude'));
    }

    public function getGioiThieu()
    {
        return view('frontend.gioithieu');
    }
}
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/logo-180.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/img/logo-32x32.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/img/logo-32x32.png') }}" />

    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('public/admin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('public/admin/css/style.css') }}">

    <!-- CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" />

    @yield('css')
</head>
<body>
    <div class="container-scroller d-flex">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item sidebar-category">
            <p>{{ config('app.name', 'Laravel') }}</p>
            <span></span>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Trang chủ Admin</span>
            </a>
            </li>
            <li class="nav-item sidebar-category">
            <p>Quản lý</p>
            <span></span>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-palette menu-icon"></i>
                    <span class="menu-title">Quản lý bài viết</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item"> <a class="nav-link text-light" href="{{ route('admin.chude') }}">Chủ đề</a></li>
                        <li class="nav-item"> <a class="nav-link text-light" href="{{ route('admin.diadiem') }}">Khu vực</a></li>
                        <li class="nav-item"> <a class="nav-link text-light" href="{{ route('admin.doitac') }}">Đối tác</a></li>
                        <li class="nav-item"> <a class="nav-link text-light" href="{{ route('admin.baiviet') }}">Bài viết</a></li>
                        <li class="nav-item"> <a class="nav-link text-light" href="{{ route('admin.binhluanbaiviet') }}">Bình luận bài viết</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.lienhe')}}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Liên hệ</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Thống kê</span>
            </a>
            </li>
            <li class="nav-item sidebar-category">
            <p>Quản lý tài khoản</p>
            <span></span>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="mdi mdi-account menu-icon"></i>
                <span class="menu-title">Tài khoản</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"> Đăng nhập</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"> Đăng ký</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="nav flex-column sub-menu" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="mdi mdi-logout"></i> Đăng xuất
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.nguoidung') }}">
            <i class="mdi mdi-file-document-box-outline menu-icon"></i>
            <span class="menu-title">Danh sách tài khoản</span>
          </a>
        </li>
        </ul>
        </nav>
        <div class="container-fluid page-body-wrapper">
        <!-- partial:./partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
                </button>
                <div class="navbar-brand-wrapper">
                    <a class="navbar-brand brand-logo" href="{{ route('admin.home') }}"><img src="{{ asset ('public/img/logo-32x32.png') }}" alt="logo"/></a>
                </div>
                <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Chào mừng đến với Du Lịch An Giang</h4>
                <ul class="navbar-nav navbar-nav-right">
                    @php
                        // Tạo một đối tượng Carbon từ ngày hiện tại
                        $ngay_hien_tai = \Carbon\Carbon::now();

                        // Đặt ngôn ngữ hiển thị là tiếng Việt
                        $ngay_hien_tai->locale('vi');

                        // Chuẩn bị định dạng cho ngày hiện tại (ngày/tháng/năm)
                        $ngay_hien_tai_formatted = $ngay_hien_tai->isoFormat('DD/MM/YYYY');
                    @endphp

                    <li class="nav-item">
                        <h4 class="mb-0 font-weight-bold d-none d-xl-block">{{ $ngay_hien_tai_formatted }}</h4>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>

        <hr class="shadow-sm" />
        <footer>
          <div class="card mt-4">
            <div class="card-body">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Bản quyền &copy; {{ date('Y') }} bởi {{ config('app.name', 'Laravel') }}.</span>
              </div>
            </div>
          </div>
        </footer>
    </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    @yield('javascript')
    <!-- base:js -->
    <script src="{{ asset('public/admin/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{ asset('public/admin/vendors/chart.js/Chart.min.js') }}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('public/admin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('public/admin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('public/admin/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{ asset('public/admin/js/dashboard.js') }}"></script>
    <!-- End custom js for this page-->
</body>
</html>
@extends('layouts.frontend')

@section('title', 'Giới thiệu')

@section('content')
    <div class="bg-dark py-3">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
            <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                        <li class="breadcrumb-item">
                            <a class="text-nowrap text-light" href="{{ route('frontend.home') }}"><i class="ci-home"></i>Trang chủ</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active text-light" aria-current="page">Giới thiệu</li>
                    </ol>
                </nav>
            </div>
            <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
                <h1 class="h3 mb-0 text-light">Về chúng tôi</h1>
            </div>
        </div>
    </div>
    
    <div class="container-fluid px-0" id="tour1">
        <div class="row g-0">
            <div class="col-lg-6 iframe-full-height-wrap mt-3">
                <img style="height: 450px; width: 600px" src="{{ asset('public/img/angiang.png') }}"/>
            </div>
            <div class="col-lg-6 px-4 px-xl-5 py-5 border-top">
                <h2 class="h3 mb-2">Giới thiệu</h2>
                <p style="text-align: justify;">Chào mừng bạn đến với trang web giới thiệu du lịch của tỉnh An Giang - một điểm đến tuyệt vời cho những người yêu thích khám phá văn hóa và thiên nhiên Việt Nam. Với sự phong phú về cảnh đẹp thiên nhiên, di sản văn hóa và con người hiền hòa, An Giang là một điểm đến hấp dẫn không thể bỏ qua trong hành trình khám phá miền Tây Nam bộ của đất nước chúng ta. Từ những cánh đồng lúa bát ngát đến những con sông êm đềm và những ngôi chùa cổ kính, An Giang mang lại cho du khách trải nghiệm đầy ấn tượng và đa dạng. Bạn có thể tham quan các điểm đến nổi tiếng như Chợ nổi Long Xuyên, Đất Mũi Tàu Ô, hay thả mình vào làn nước xanh mát của hồ Bàu Đức và hồ Sam. Hơn nữa, với nền văn hóa đa dạng của các dân tộc thiểu số như Khmer, Hoa và Kinh, du khách sẽ có cơ hội khám phá những nét đặc trưng văn hóa độc đáo thông qua lễ hội, trang phục truyền thống và ẩm thực đậm đà. Chúng tôi hy vọng rằng trang web này sẽ giúp bạn có cái nhìn tổng quan và chi tiết về vẻ đẹp và sức hút của tỉnh An Giang, từ đó khám phá và trải nghiệm những điều thú vị mà vùng đất này mang lại. Hãy cùng chúng tôi khám phá và tận hưởng hành trình du lịch tuyệt vời tại An Giang - "Vùng đất hứa hẹn của miền Tây Nam bộ".</p>
            </div>
        </div>
    </div>
@endsection

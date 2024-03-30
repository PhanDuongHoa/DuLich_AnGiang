@extends('layouts.frontend')

@section('title', 'Trang chủ')

@section('content')
    <section class="container mt-4 mb-grid-gutter">
        <div class="bg-faded-light rounded-3 py-4" style="margin-right:-.0625rem;">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="px-4 pe-sm-0 ps-sm-5">
                        <span class="badge bg-danger">Du Lịch An Giang</span>
                        <h3 class="mt-4 mb-1 text-body fw-light">Địa điểm du lịch</h3>
                        <h2 class="mb-1">nổi tiếng</h2>
                        <p class="h5 text-body fw-light">tại An Giang</p>
                        <a class="btn btn-accent" href="{{ route('frontend.baiviet') }}">Xem tất cả<i class="ci-arrow-right fs-ms ms-1"></i></a>
                    </div>
                </div>
                <div class="col-md-7"><img src="{{ asset('public/img/angiang.png') }}"/></div>
            </div>
        </div>
    </section>
    
    <section class="container">
        <div class="tns-carousel border-end mx-4 mb-4" style="margin-right:-.0625rem;">
            <div class="tns-carousel-inner" data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/chomoi.jpg') }}" style="width:165px;" />
                    </a>
                </div>
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/triton.jpg') }}" style="width:165px;" />
                    </a>
                </div>
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/longxuyen.jpg') }}" style="width:165px;" />
                    </a>
                </div>
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/chaudoc.jpg') }}" style="width:165px;" />
                    </a>
                </div>
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/chauthanh.jpg') }}" style="width:165px;" />
                    </a>
                </div>
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/tinhbien.jpg') }}" style="width:165px;" />
                    </a>
                </div>
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/phutan.jpg') }}" style="width:165px;" />
                    </a>
                </div>
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/anphu.jpg') }}" style="width:165px;" />
                    </a>
                </div>
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/tanchau.jpg') }}" style="width:165px;" />
                    </a>
                </div>
                <div>
                    <a class="d-block bg-white border py-4 py-sm-5 px-2" href="#" style="margin-right:-.0625rem;">
                        <img class="d-block mx-auto" src="{{ asset('public/img/brands/thoaison.jpg') }}" style="width:165px;" />
                    </a>
                </div>
            </div>
        </div>
    </section>
    @php
        function LayHinhDauTien($strNoiDung)
        {
            $first_img = '';
            ob_start();
            ob_end_clean();
            $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
            if(empty($output))
            return asset('public/img/noimage.png');
            else
            return str_replace('&amp;', '&', $matches[1][0]);
        }
    @endphp
    
    <div class="container">
    <h2 class="mx-4 mt-4">Bài viết nổi bật</h2>
    @foreach($baiviet as $value)
        <article class="masonry-grid-item mx-4 mt-4 mb-4">
        <div class="card" style="max-width:800px">
        <a class="blog-entry-thumb" href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
        <img class="card-img-top" src="{{ LayHinhDauTien($value->noidung) }}" style="width: 150px; height: 150px;"/>
        </a>
        <div class="card-body">
        <h2 class="h6 blog-entry-title">
        <a href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
        {{ $value->tieude }}
        </a>
        </h2>
        <p class="fs-sm" style="text-align:justify">{{ $value->tomtat }}</p>
        <a class="btn-tag me-2 mb-2" href="{{ route('frontend.baiviet.chude', ['tenchude_slug' => $value->ChuDe->tenchude_slug]) }}">{{ $value->ChuDe->tenchude }}</a>
        </div>
        <div class="card-footer d-flex align-items-center fs-xs">
        <a class="blog-entry-meta-link" href="{{ route('user.home') }}">
        <div class="blog-entry-author-ava"><img src="{{ asset('public/img/03.jpg') }}" /></div>{{ $value->User->name }}
        </a>
        <div class="ms-auto text-nowrap">
        <a class="blog-entry-meta-link text-nowrap" href="#date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y') }}</a>
        <span class="blog-entry-meta-divider mx-2"></span>
        <a class="blog-entry-meta-link text-nowrap" href="#view"><i class="ci-eye"></i>{{ $value->luotxem }}</a>
        </div>
        </div>
        </div>
        </article>
    @endforeach
    </div>
@endsection
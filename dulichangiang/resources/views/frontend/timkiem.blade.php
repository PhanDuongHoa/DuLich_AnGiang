@extends('layouts.frontend')

@section('title', 'Kết quả tìm kiếm')

@section('content')
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
    @if($baiviet->count())
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Kết quả tìm kiếm</h6>
                    <h1>Bài viết</h1>
                </div>
                <div class="row">
                @foreach($baiviet->sortByDesc('created_at')->take(5) as $value)
            <article class="masonry-grid-item mx-4 mt-4 mb-4">
                <div class="card" style="max-width:800px">
                    <a class="blog-entry-thumb" href="{{ route('frontend.baiviet.chitiet', ['tendiadiem_slug' => $value->DiaDiem->tendiadiem_slug, 'tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
                        <img class="card-img-top" src="{{ LayHinhDauTien($value->noidung) }}" style="width: 150px; height: 150px;"/>
                    </a>
                    <div class="card-body">
                        <h2 class="h6 blog-entry-title">
                            <a href="{{ route('frontend.baiviet.chitiet', ['tendiadiem_slug' => $value->DiaDiem->tendiadiem_slug, 'tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
                                {{ $value->tieude }}
                            </a>
                        </h2>
                        <p class="fs-sm" style="text-align:justify">{{ $value->tomtat }}</p>
                        <a class="btn-tag me-2 mb-2" href="{{ route('frontend.baiviet.chude', ['tenchude_slug' => $value->ChuDe->tenchude_slug]) }}">{{ $value->ChuDe->tenchude }}</a>
                        <a class="btn-tag me-2 mb-2" href="{{ route('frontend.baiviet.diadiem', ['tendiadiem_slug' => $value->DiaDiem->tendiadiem_slug]) }}">{{ $value->DiaDiem->tendiadiem }}</a>
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
            </div>
        </div>
    @else
        <p>Không tìm thấy bài viết liên quan.</p>
    @endif
@endsection
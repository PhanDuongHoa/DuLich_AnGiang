@extends('layouts.frontend')
@section('title', 'Kết quả tìm kiếm')
@section('content')
    @if($baiviet->count())
        <!-- Packages Start -->
        <div class="container-fluid py-5">
            <div class="container pt-5 pb-3">
                <div class="text-center mb-3 pb-3">
                    <h6 class="text-primary text-uppercase" style="letter-spacing: 5px;">Bài viết</h6>
                    <h1>Bài viết</h1>
                </div>
                <div class="row">
                    @foreach($baiviet as $blog)
                    <div class="col-md-6 mb-4 pb-2">
                        <div class="blog-item">
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="{{ env('APP_URL') . '/storage/app/' . $blog->hinhanh }}" alt="">
                            </div>
                            <div class="bg-white p-4">
                                <div class="d-flex mb-2">
                                    <a class="text-primary text-uppercase text-decoration-none" href="">Bài viết</a>
                                    <span class="text-primary px-2">|</span>
                                    <a class="text-primary text-uppercase text-decoration-none" href="">Tìm kiếm</a>
                                </div>
                                <a class="h5 m-0 text-decoration-none" href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $blog->ChuDe->tenchude_slug, 'tieude_slug' => $blog->tieude_slug . '-' . $blog->id . '.html']) }}">{{$blog->tieude}}</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @else
        <p>Không tìm thấy bài viết liên quan.</p>
    @endif
<!-- Packages End -->
@endsection
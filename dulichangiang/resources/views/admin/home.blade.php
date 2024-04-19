@extends('layouts.app')

@section('content')
<section class="container mt-4 mb-grid-gutter">
        <h3 class="text-center">Trang chủ quản trị</h3>
        <div class="bg-faded-light rounded-3 py-4" style="margin-right:-.0625rem;">
            <div class="row align-items-center">
                <div class="col-md-5">
                    <div class="px-4 pe-sm-0 ps-sm-5">
                        <span class="badge bg-danger">Du Lịch An Giang</span>
                        <h3 class="mt-4 mb-1 text-body fw-light">Giới thiệu địa điểm du lịch</h3>
                        <h2 class="mb-1">nổi tiếng</h2>
                        <p class="h5 text-body fw-light">tại An Giang</p>
                    </div>
                </div>
                <div class="col-md-7"><img src="{{ asset('public/img/angiang.png') }}"/></div>
            </div>
        </div>
    </section>
@endsection

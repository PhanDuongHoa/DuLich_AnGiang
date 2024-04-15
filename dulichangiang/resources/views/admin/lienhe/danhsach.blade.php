@extends('layouts.app')

@section('content')
<section id="main-content">
<section class="wrapper">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           
        <div class="card bg-faded-info">
            <div class="card-header">Liên hệ</div>

            <div class="card-body table-responsive">
            <table class="table table-bordered table-hover table-sm mb-0">
            <thead>
                    <tr>
                            <th width="5%">STT</th>
                            <th width="20%">Họ và tên</th>
                            <th width="20%">Email</th>
                            <th width="10%">Điện thoại</th>
                            <th width="10%">Tiêu đề</th>
                            <th width="10%">Nội dung</th>
                    </tr>
            </thead>
            <tbody>
                 @foreach($lienhe as $value)
                    <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->hoten }}</td>
                            <td>{{ $value->dienthoai }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->chude }}</td>
                            <td>{{ $value->noidung }}</td>
                        </tr>
            @endforeach
            </tbody>
            </table>
            </div>
        </div>
       </div>
 </div>
</div>
</section>
</section>
@endsection
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Địa điểm</div>
        <div class="card-body table-responsive">
            <p><a href="{{ route('admin.diadiem.them') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Thêm mới</a></p>
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="45%">Tên địa điểm</th>
                        <th width="40%">Tên địa điểm không dấu</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($diadiem as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tendiadiem }}</td>
                            <td>{{ $value->tendiadiem_slug }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.diadiem.sua', ['id' => $value->id]) }}">
                                    <i class="bi bi-gear"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.diadiem.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa địa điểm {{ $value->tendiadiem }} không?')">
                                    <i class="fbi bi-x-lg text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
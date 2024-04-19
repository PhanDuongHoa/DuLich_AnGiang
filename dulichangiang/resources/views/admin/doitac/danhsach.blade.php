@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Đối tác</div>
        <div class="card-body table-responsive">
            <p><a href="{{ route('admin.doitac.them') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Thêm mới</a></p>
            <table class="table table-bordered table-hover table-sm mb-0">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="45%">Tên Đối tác</th>
                        <th width="40%">Tên Đối tác không dấu</th>
                        <th width="5%">Sửa</th>
                        <th width="5%">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doitac as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->tendoitac }}</td>
                            <td>{{ $value->tendoitac_slug }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.doitac.sua', ['id' => $value->id]) }}">
                                    <i class="bi bi-gear"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.doitac.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa Đối tác {{ $value->tendoitac }} không?')">
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
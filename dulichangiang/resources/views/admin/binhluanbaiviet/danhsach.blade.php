@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-header">Bình luận bài viết</div>
		<div class="card-body table-responsive">
			<p><a href="{{ route('frontend.binhluanbaiviet.them') }}" class="btn btn-primary"><i class="bi bi-plus"></i> Thêm mới</a></p>
			<table class="table table-bordered table-hover table-sm mb-0">
				<thead>
					<tr>
						<th style="vertical-align: middle;text-align: center" width="5%">STT</th>
						<th style="vertical-align: middle;text-align: center" width="20%">Người đăng</th>
						<th style="vertical-align: middle;text-align: center" width="55%">Thông tin bình luận</th>
						<th style="vertical-align: middle;text-align: center" width="20%" colspan="4" class="text-center">Hành động</th>
					</tr>
				</thead>

				<tbody>
					@foreach($binhluanbaiviet as $value)
						<tr>
							<td style="vertical-align: middle;text-align: center" >{{ $loop->iteration }}</td>
							<td style="vertical-align: middle;text-align: center">{{ $value->User->name }}</td>
							<td style="text-align:justify">
								<span class="d-block fw-bold text-primary"><a href="{{ route('admin.binhluanbaiviet.sua', ['id' => $value->id]) }}">{{ $value->BaiViet->tieude }}</a></span>
								<span class="d-block small">
									Ngày đăng: <strong>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</strong>
									<br />Nội dung bình luận: <strong>{{ $value->noidungbinhluan }}</strong>
								</span>
							</td>

							<td style="vertical-align: middle;text-align: center" class="text-center" title="Trạng thái kiểm duyệt">
								<a href="{{ route('admin.binhluanbaiviet.kiemduyet', ['id' => $value->id]) }}">
									@if($value->kiemduyet == 1)
										<i class="bi bi-check-circle"></i>
									@else
										<i class="bi bi-check-circle-fill"></i>
									@endif
								</a>
							</td>

							<td style="vertical-align: middle;text-align: center" class="text-center" title="Trạng thái hiển thị">
								<a href="{{ route('admin.binhluanbaiviet.kichhoat', ['id' => $value->id]) }}">
									@if($value->kichhoat == 1)
										<i class="bi bi-eye"></i>
									@else
										<i class="bi bi-eye-slash"></i>
									@endif
								</a>
							</td>

							<td style="vertical-align: middle;text-align: center" class="text-center">
								<a href="{{ route('admin.binhluanbaiviet.sua', ['id' => $value->id]) }}">
									<i class="bi bi-gear"></i>
								</a>
							</td>

							<td style="vertical-align: middle;text-align: center" class="text-center">
								<a href="{{ route('admin.binhluanbaiviet.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa bình luận của bài viết {{ $value->BaiViet->tieude }} không?')">
									<i class="bi bi-x-lg text-danger"></i>
								</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
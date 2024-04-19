@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">Thêm bài viết</div>
        <div class="card-body">
        <form action="{{ route('admin.baiviet.them') }}" method="post">
            @csrf
            <!-- Địa điểm -->
            <div class="mb-3">
                <label class="form-label" for="diadiem_id">Địa điểm</label>
                <select class="form-select @error('diadiem_id') is-invalid @enderror" id="diadiem_id" name="diadiem_id" required>
                <option value="">-- Chọn --</option>
            @foreach($diadiem as $value)
                <option value="{{ $value->id }}">{{ $value->tendiadiem }}</option>
            @endforeach
                </select>
            @error('diadiem_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
                </div>
                <div class="mb-3">
                <label class="form-label" for="chude_id">Chủ đề</label>
                <select class="form-select @error('chude_id') is-invalid @enderror" id="chude_id" name="chude_id" required>
                <option value="">-- Chọn --</option>
            @foreach($chude as $value)
                <option value="{{ $value->id }}">{{ $value->tenchude }}</option>
            @endforeach
                </select>
            @error('chude_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
                </div>
                <!-- Đối tác -->
                <div class="mb-3">
                <label class="form-label" for="doitac_id">Đối tác</label>
                <select class="form-select @error('doitac_id') is-invalid @enderror" id="doitac_id" name="doitac_id">
                <option value="">-- Chọn (Có thể không chọn) --</option>
            @foreach($doitac as $value)
                <option value="{{ $value->id }}">{{ $value->tendoitac }}</option>
            @endforeach
                </select>
            @error('doitac_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
                </div>
                <div class="mb-3">
                <label class="form-label" for="tieude">Tiêu đề</label>
                <input type="text" class="form-control @error('tieude') is-invalid @enderror" id="tieude" name="tieude" value="{{ old('tieude') }}" required />@error('tieude')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
                </div>
                <div class="mb-3">
                <label class="form-label" for="tomtat">Tóm tắt</label>
                <textarea class="form-control" id="tomtat" name="tomtat">{{ old('tomtat') }}</textarea>
            @error('tomtat')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
                </div>
                <div class="mb-3">
                <label class="form-label" for="noidung">Nội dung bài viết</label>
                <textarea class="form-control" id="noidung" name="noidung">{{ old('noidung') }}</textarea>
            @error('noidung')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
            @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Thêm vào CSDL</button>
            </form>
        </div>
    </div>
    @endsection
    @section('javascript')
    <script src="{{ asset('public/vendor/ckeditor5/ckeditor.js') }}"></script>
        <script>
        ClassicEditor.create(document.querySelector('#noidung'), {
                licenseKey: '',
            }).then(editor => {
                window.editor = editor;
            }).catch(error => {
            console.error(error);
        });
    </script>
@endsection
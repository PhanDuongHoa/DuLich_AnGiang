@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Sửa bình luận bài viết</div>
        <div class="card-body">
            <form action="{{ route('frontend.binhluanbaiviet.sua', ['id' => $binhluanbaiviet->id]) }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="noidungbinhluan">Nội dung bình luận</label>
                    <textarea class="form-control" id="noidungbinhluan" name="noidungbinhluan" required>{{ $binhluanbaiviet->noidungbinhluan }}</textarea>
                    @error('noidungbinhluan')
                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class="bi bi-pencil"></i> Cập nhật</button>
            </form>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('public/vendor/ckeditor5/ckeditor.js') }}"></script>
    <script>
        ClassicEditor.create(document.querySelector('#noidungbinhluan'), {
            licenseKey: '',
        }).then(editor => {
            window.editor = editor;
        }).catch(error => {
            console.error(error);
        });
    </script>
@endsection
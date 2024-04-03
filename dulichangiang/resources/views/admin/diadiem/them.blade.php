@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Thêm địa điểm</div>
        <div class="card-body">
            <form action="{{ route('admin.diadiem.them') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="tendiadiem">Tên địa điểm</label>
                    <input type="text" class="form-control @error('tendiadiem') is-invalid @enderror" id="tendiadiem" name="tendiadiem" value="{{ old('tendiadiem') }}" required />
                    @error('tendiadiem')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Thêm vào CSDL</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Thêm đối tác</div>
        <div class="card-body">
            <form action="{{ route('admin.doitac.them') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="tendoitac">Tên đối tác</label>
                    <input type="text" class="form-control @error('tendoitac') is-invalid @enderror" id="tendoitac" name="tendoitac" value="{{ old('tendoitac') }}" required />
                    @error('tendoitac')
                        <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary"><i class="bi bi-floppy"></i> Thêm vào CSDL</button>
            </form>
        </div>
    </div>
@endsection
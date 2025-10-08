@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Thêm chuyến bay mới</h2>

  <form action="{{ route('chuyen-bay.store') }}" method="POST">
    @csrf

    <div class="mb-3">
      <label class="form-label">Mã chuyến bay</label>
      <input type="text" name="ma_chuyen" class="form-control" value="{{ old('ma_chuyen') }}" required>
      @error('ma_chuyen') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Sân bay đi</label>
      <input type="text" name="san_bay_di" class="form-control" value="{{ old('san_bay_di') }}" required>
      @error('san_bay_di') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Sân bay đến</label>
      <input type="text" name="san_bay_den" class="form-control" value="{{ old('san_bay_den') }}" required>
      @error('san_bay_den') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Thời gian đi</label>
      <input type="datetime-local" name="thoi_gian_di" class="form-control" value="{{ old('thoi_gian_di') }}" required>
      @error('thoi_gian_di') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Thời gian đến</label>
      <input type="datetime-local" name="thoi_gian_den" class="form-control" value="{{ old('thoi_gian_den') }}">
      @error('thoi_gian_den') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Số ghế</label>
      <input type="number" name="so_ghe" class="form-control" value="{{ old('so_ghe', 150) }}" min="1" required>
      @error('so_ghe') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Giá vé (VNĐ)</label>
      <input type="number" name="gia" class="form-control" value="{{ old('gia') }}" min="0" required>
      @error('gia') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button type="submit" class="btn btn-success">Thêm chuyến bay</button>
    <a href="{{ route('chuyen-bay.index') }}" class="btn btn-secondary">Quay lại</a>
  </form>
</div>
@endsection

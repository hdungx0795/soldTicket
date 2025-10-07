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
      <label class="form-label">Nơi đi</label>
      <input type="text" name="noi_di" class="form-control" value="{{ old('noi_di') }}" required>
      @error('noi_di') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Nơi đến</label>
      <input type="text" name="noi_den" class="form-control" value="{{ old('noi_den') }}" required>
      @error('noi_den') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Ngày giờ khởi hành</label>
        <input type="datetime-local" name="ngay_gio_khoi_hanh" class="form-control" value="{{ old('ngay_gio_khoi_hanh') }}" required>
        @error('ngay_gio_khoi_hanh') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Giá vé (VNĐ)</label>
        <input type="number" name="gia_ve" class="form-control" value="{{ old('gia_ve') }}" min="0" required>
        @error('gia_ve') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Số ghế còn</label>
      <input type="number" name="so_ghe_con" class="form-control" value="{{ old('so_ghe_con', 100) }}" min="0" required>
      @error('so_ghe_con') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button type="submit" class="btn btn-success">Thêm chuyến bay</button>
    <a href="{{ route('chuyen-bay.index') }}" class="btn btn-secondary">Quay lại</a>
  </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Sửa thông tin chuyến bay</h2>

  <form action="{{ route('chuyen-bay.update', $chuyen_bay->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Mã chuyến bay</label>
      <input type="text" name="ma_chuyen" class="form-control" value="{{ old('ma_chuyen', $chuyen_bay->ma_chuyen) }}" required>
      @error('ma_chuyen') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Nơi đi</label>
      <input type="text" name="noi_di" class="form-control" value="{{ old('noi_di', $chuyen_bay->noi_di) }}" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Nơi đến</label>
      <input type="text" name="noi_den" class="form-control" value="{{ old('noi_den', $chuyen_bay->noi_den) }}" required>
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Ngày giờ khởi hành</label>
        <input type="datetime-local" name="ngay_gio_khoi_hanh" class="form-control"
               value="{{ old('ngay_gio_khoi_hanh', \Carbon\Carbon::parse($chuyen_bay->ngay_gio_khoi_hanh)->format('Y-m-d\TH:i')) }}" required>
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Giá vé (VNĐ)</label>
        <input type="number" name="gia_ve" class="form-control" value="{{ old('gia_ve', $chuyen_bay->gia_ve) }}" min="0" required>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Số ghế còn</label>
      <input type="number" name="so_ghe_con" class="form-control" value="{{ old('so_ghe_con', $chuyen_bay->so_ghe_con) }}" min="0" required>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('chuyen-bay.index') }}" class="btn btn-secondary">Quay lại</a>
  </form>
</div>
@endsection

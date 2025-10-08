@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Sửa thông tin chuyến bay</h2>

  <form action="{{ route('chuyen-bay.update', $chuyenBay->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Mã chuyến bay</label>
      <input type="text" name="ma_chuyen" class="form-control" value="{{ old('ma_chuyen', $chuyenBay->ma_chuyen) }}" required>
      @error('ma_chuyen') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Sân bay đi</label>
      <input type="text" name="san_bay_di" class="form-control" value="{{ old('san_bay_di', $chuyenBay->san_bay_di) }}" required>
      @error('san_bay_di') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Sân bay đến</label>
      <input type="text" name="san_bay_den" class="form-control" value="{{ old('san_bay_den', $chuyenBay->san_bay_den) }}" required>
      @error('san_bay_den') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Thời gian khởi hành</label>
        <input type="datetime-local" name="thoi_gian_di" class="form-control"
               value="{{ old('thoi_gian_di', $chuyenBay->thoi_gian_di ? \Carbon\Carbon::parse($chuyenBay->thoi_gian_di)->format('Y-m-d\TH:i') : '') }}" required>
        @error('thoi_gian_di') <small class="text-danger">{{ $message }}</small> @enderror
      </div>

      <div class="col-md-6 mb-3">
        <label class="form-label">Thời gian đến (nếu có)</label>
        <input type="datetime-local" name="thoi_gian_den" class="form-control"
               value="{{ old('thoi_gian_den', $chuyenBay->thoi_gian_den ? \Carbon\Carbon::parse($chuyenBay->thoi_gian_den)->format('Y-m-d\TH:i') : '') }}">
        @error('thoi_gian_den') <small class="text-danger">{{ $message }}</small> @enderror
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label">Tổng số ghế</label>
      <input type="number" name="so_ghe" class="form-control" value="{{ old('so_ghe', $chuyenBay->so_ghe) }}" min="1" required>
      @error('so_ghe') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Số ghế còn</label>
      <input type="number" name="so_ghe_con" class="form-control" value="{{ old('so_ghe_con', $chuyenBay->so_ghe_con) }}" min="0" required>
      @error('so_ghe_con') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Giá vé (VNĐ)</label>
      <input type="number" step="0.01" name="gia" class="form-control" value="{{ old('gia', $chuyenBay->gia) }}" min="0" required>
      @error('gia') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
    <a href="{{ route('chuyen-bay.index') }}" class="btn btn-secondary">Quay lại</a>
  </form>
</div>
@endsection

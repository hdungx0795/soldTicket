@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Chi tiết chuyến bay</h2>

  <table class="table table-bordered">
    <tr>
      <th>Mã chuyến bay</th>
      <td>{{ $chuyen_bay->ma_chuyen }}</td>
    </tr>
    <tr>
      <th>Nơi đi</th>
      <td>{{ $chuyen_bay->noi_di }}</td>
    </tr>
    <tr>
      <th>Nơi đến</th>
      <td>{{ $chuyen_bay->noi_den }}</td>
    </tr>
    <tr>
      <th>Ngày giờ khởi hành</th>
      <td>{{ \Carbon\Carbon::parse($chuyen_bay->ngay_gio_khoi_hanh)->format('d/m/Y H:i') }}</td>
    </tr>
    <tr>
      <th>Giá vé</th>
      <td>{{ number_format($chuyen_bay->gia_ve, 0, ',', '.') }} ₫</td>
    </tr>
    <tr>
      <th>Số ghế còn</th>
      <td>{{ $chuyen_bay->so_ghe_con }}</td>
    </tr>
  </table>

  <a href="{{ route('chuyen-bay.edit', $chuyen_bay->id) }}" class="btn btn-warning">Sửa</a>
  <a href="{{ route('chuyen-bay.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection

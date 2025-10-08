@extends('layouts.app')

@section('content')
<div class="container">
  <h2>Chi tiết chuyến bay</h2>

  <table class="table table-bordered">
    <tr>
      <th>Mã chuyến bay</th>
      <td>{{ $chuyenBay->ma_chuyen }}</td>
    </tr>
    <tr>
      <th>Sân bay đi</th>
      <td>{{ $chuyenBay->san_bay_di }}</td>
    </tr>
    <tr>
      <th>Sân bay đến</th>
      <td>{{ $chuyenBay->san_bay_den }}</td>
    </tr>
    <tr>
      <th>Thời gian đi</th>
      <td>{{ \Carbon\Carbon::parse($chuyenBay->thoi_gian_di)->format('d/m/Y H:i') }}</td>
    </tr>
    <tr>
      <th>Thời gian đến</th>
      <td>
        @if($chuyenBay->thoi_gian_den)
          {{ \Carbon\Carbon::parse($chuyenBay->thoi_gian_den)->format('d/m/Y H:i') }}
        @else
          <em>Chưa cập nhật</em>
        @endif
      </td>
    </tr>
    <tr>
      <th>Giá vé</th>
      <td>{{ number_format($chuyenBay->gia, 0, ',', '.') }} ₫</td>
    </tr>
    <tr>
      <th>Tổng số ghế</th>
      <td>{{ $chuyenBay->so_ghe }}</td>
    </tr>
    <tr>
      <th>Số ghế còn</th>
      <td>{{ $chuyenBay->so_ghe_con }}</td>
    </tr>
  </table>

  <a href="{{ route('chuyen-bay.edit', $chuyenBay->id) }}" class="btn btn-warning">Sửa</a>
  <a href="{{ route('chuyen-bay.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
</div>
@endsection

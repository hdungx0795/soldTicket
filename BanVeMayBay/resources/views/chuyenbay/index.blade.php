@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách chuyến bay</h1>
    <a href="{{ route('chuyen-bay.create') }}" class="btn btn-primary">Thêm chuyến bay</a>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Mã</th><th>Đi</th><th>Đến</th><th>Khởi hành</th><th>Ghế còn</th><th>Giá</th><th></th>
            </tr>
        </thead>
        <tbody>
        @foreach($chuyenbays as $cb)
            <tr>
                <td>{{ $cb->ma_chuyen }}</td>
                <td>{{ $cb->san_bay_di }}</td>
                <td>{{ $cb->san_bay_den }}</td>
                <td>{{ $cb->thoi_gian_di }}</td>
                <td>{{ $cb->so_ghe_con }}</td>
                <td>{{ number_format($cb->gia,0,',','.') }} ₫</td>
                <td>
                    <a href="{{ route('chuyen-bay.show', $cb->id) }}" class="btn btn-sm btn-info">Xem</a>
                    <a href="{{ route('chuyen-bay.edit', $cb->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    <form action="{{ route('chuyen-bay.destroy', $cb->id) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Xóa?')">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $chuyenbays->links() }}
</div>
@endsection

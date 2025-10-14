<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChuyenBay;
use Illuminate\Http\Request;

class ChuyenBayController extends Controller
{
    // Lấy danh sách chuyến bay
    public function index()
    {
        return response()->json(ChuyenBay::all());
    }

    // Thêm chuyến bay mới
    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_chuyen' => 'required|unique:chuyen_bays',
            'san_bay_di' => 'required|string|max:255',
            'san_bay_den' => 'required|string|max:255',
            'thoi_gian_di' => 'required|date',
            'thoi_gian_den' => 'required|date|after:thoi_gian_di',
            'so_ghe' => 'required|integer|min:1',
            'so_ghe_con' => 'required|integer|min:0|max:' . $request->input('so_ghe'),
            'gia' => 'required|numeric|min:0',
        ]);

        $chuyenBay = ChuyenBay::create($data);
        return response()->json($chuyenBay, 201);
    }

    // Xem chi tiết 1 chuyến bay
    public function show($id)
    {
        return response()->json(ChuyenBay::findOrFail($id));
    }

    // Cập nhật chuyến bay
    public function update(Request $request, $id)
    {
        $chuyenBay = ChuyenBay::findOrFail($id);

        $data = $request->validate([
            'san_bay_di' => 'sometimes|required|string|max:255',
            'san_bay_den' => 'sometimes|required|string|max:255',
            'thoi_gian_di' => 'sometimes|required|date',
            'thoi_gian_den' => 'sometimes|required|date|after:thoi_gian_di',
            'so_ghe' => 'sometimes|required|integer|min:1',
            'so_ghe_con' => 'sometimes|required|integer|min:0|max:' . $request->input('so_ghe', $chuyenBay->so_ghe),
            'gia' => 'sometimes|required|numeric|min:0',
        ]);

        $chuyenBay->update($data);
        return response()->json($chuyenBay);
    }

    // Xóa chuyến bay
    public function destroy($id)
    {
        ChuyenBay::destroy($id);
        return response()->json(['message' => 'Đã xóa thành công']);
    }
}

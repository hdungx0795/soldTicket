<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    // Lấy danh sách khách hàng
    public function index()
    {
        $data = KhachHang::orderBy('id', 'desc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Danh sách khách hàng',
            'data' => $data
        ], 200);
    }

    // Xem chi tiết
    public function show($id)
    {
        $kh = KhachHang::find($id);
        if (!$kh) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy khách hàng'], 404);
        }
        return response()->json(['status' => true, 'data' => $kh], 200);
    }

    // Thêm mới
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ho_ten' => 'required|string|max:100',
            'email' => 'required|email|unique:khach_hangs,email',
            'so_dt' => 'nullable|string|max:20',
        ]);

        $kh = KhachHang::create($validated);
        return response()->json(['status' => true, 'message' => 'Tạo thành công', 'data' => $kh], 201);
    }

    // Cập nhật
    public function update(Request $request, $id)
    {
        $kh = KhachHang::find($id);
        if (!$kh) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy khách hàng'], 404);
        }

        $validated = $request->validate([
            'ho_ten' => 'sometimes|string|max:100',
            'email' => 'sometimes|email|unique:khach_hangs,email,' . $id,
            'so_dt' => 'nullable|string|max:20',
        ]);

        $kh->update($validated);
        return response()->json(['status' => true, 'message' => 'Cập nhật thành công', 'data' => $kh], 200);
    }

    // Xóa
    public function destroy($id)
    {
        $kh = KhachHang::find($id);
        if (!$kh) {
            return response()->json(['status' => false, 'message' => 'Không tìm thấy khách hàng'], 404);
        }

        $kh->delete();
        return response()->json(['status' => true, 'message' => 'Xóa khách hàng thành công'], 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $khachhangs = KhachHang::orderBy('id', 'desc')->paginate(10);
        return view('khachhang.index', compact('khachhangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('khachhang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ho_ten' => 'required|string|max:100',
            'email' => 'required|email|unique:khach_hangs,email',
            'so_dt' => 'nullable|string|max:20',
        ]);

        KhachHang::create($data);

        return redirect()->route('khach-hang.index')
                         ->with('success', 'Thêm khách hàng thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(KhachHang $khachHang)
    {
        return view('khachHang.show', compact('khachHang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KhachHang $khachHang)
    {
        return view('khachHang.edit', compact('khachHang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KhachHang $khachHang)
    {
        $data = $request->validate([
            'ho_ten' => 'required|string|max:100',
            'email' => 'required|email|unique:khach_hangs,email,' . $khachHang->id,
            'so_dt' => 'nullable|string|max:20',
        ]);

        $khachHang->update($data);

        return redirect()->route('khach-hang.index')
                         ->with('success', 'Cập nhật khách hàng thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KhachHang $khachHang)
    {
        $khachHang->delete();

        return redirect()->route('khach-hang.index')
                         ->with('success', 'Xóa khách hàng thành công!');
    }
}

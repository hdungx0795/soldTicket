<?php

namespace App\Http\Controllers;

use App\Models\Ve;
use App\Models\ChuyenBay;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ves = Ve::with(['chuyenBay', 'khachHang'])
                 ->orderBy('id', 'desc')
                 ->paginate(10);
        return view('ve.index', compact('ves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $chuyenBays = ChuyenBay::where('so_ghe_con', '>', 0)->get();
        $khachHangs = KhachHang::all();
        return view('ve.create', compact('chuyenBays', 'khachHangs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_ve' => 'required|unique:ves,ma_ve',
            'chuyen_bay_id' => 'required|exists:chuyen_bays,id',
            'khach_hang_id' => 'required|exists:khach_hangs,id',
            'hang_ve' => 'required|string|max:50',
            'gia' => 'required|numeric|min:0',
        ]);

        DB::transaction(function () use ($data) {
            $chuyenBay = ChuyenBay::lockForUpdate()->find($data['chuyen_bay_id']);

            if ($chuyenBay->so_ghe_con <= 0) {
                throw new \Exception('Không còn ghế trống cho chuyến bay này!');
            }

            // Tạo vé
            Ve::create($data);

            // Giảm ghế còn lại
            $chuyenBay->decrement('so_ghe_con');
        });

        return redirect()->route('ve.index')->with('success', 'Đặt vé thành công!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Ve $ve)
    {
        $ve->load(['chuyenBay', 'khachHang']);
        return view('ve.show', compact('ve'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ve $ve)
    {
        $chuyenBays = ChuyenBay::all();
        $khachHangs = KhachHang::all();
        return view('ve.edit', compact('ve', 'chuyenBays', 'khachHangs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ve $ve)
    {
        $data = $request->validate([
            'ma_ve' => 'required|unique:ves,ma_ve,' . $ve->id,
            'chuyen_bay_id' => 'required|exists:chuyen_bays,id',
            'khach_hang_id' => 'required|exists:khach_hangs,id',
            'hang_ve' => 'required|string|max:50',
            'gia' => 'required|numeric|min:0',
            'trang_thai' => 'required|in:đã_đặt,đã_hủy,đã_sử_dụng',
        ]);

        $ve->update($data);

        return redirect()->route('ve.index')->with('success', 'Cập nhật vé thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ve $ve)
    {
        DB::transaction(function () use ($ve) {
            $chuyenBay = ChuyenBay::lockForUpdate()->find($ve->chuyen_bay_id);
            $ve->delete();
            // Tăng lại số ghế còn nếu vé bị xóa
            $chuyenBay->increment('so_ghe_con');
        });

        return redirect()->route('ve.index')->with('success', 'Xóa vé thành công!');
    }
}

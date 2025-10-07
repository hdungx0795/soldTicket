<?php

namespace App\Http\Controllers;

use App\Models\ChuyenBay;
use Illuminate\Http\Request;

class ChuyenBayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chuyenbays = ChuyenBay::orderBy('thoi_gian_di', 'asc')->paginate(10);
        return view('chuyenbay.index', compact('chuyenbays'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('chuyenbay.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'ma_chuyen' => 'required|unique:chuyen_bays,ma_chuyen',
            'san_bay_di' => 'required',
            'san_bay_den' => 'required',
            'thoi_gian_di' => 'required|date',
            'thoi_gian_den' => 'nullable|date|after_or_equal:thoi_gian_di',
            'so_ghe' => 'required|integer|min:1',
            'gia' => 'required|numeric|min:0',
        ]);

        $data['so_ghe_con'] = $data['so_ghe'];
        ChuyenBay::create($data);

        return redirect()->route('chuyen-bay.index')->with('success', 'Tạo chuyến bay thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(ChuyenBay $chuyenBay)
    {
        return view('chuyenbay.show', compact('chuyen_bay'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChuyenBay $chuyenBay)
    {
         return view('chuyenbay.edit', compact('chuyen_bay'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChuyenBay $chuyenBay)
    {
        $data = $request->validate([
            'ma_chuyen' => 'required|unique:chuyen_bays,ma_chuyen,' . $chuyen_bay->id,
            'san_bay_di' => 'required',
            'san_bay_den' => 'required',
            'thoi_gian_di' => 'required|date',
            'thoi_gian_den' => 'nullable|date|after_or_equal:thoi_gian_di',
            'so_ghe' => 'required|integer|min:1',
            'gia' => 'required|numeric|min:0',
        ]);

        // nếu giảm số ghế, cập nhật so_ghe_con tương ứng (đơn giản)
        if ($data['so_ghe'] < $chuyen_bay->so_ghe) {
            $chuyen_bay->so_ghe_con = min($chuyen_bay->so_ghe_con, $data['so_ghe']);
        } else {
            $chuyen_bay->so_ghe_con += ($data['so_ghe'] - $chuyen_bay->so_ghe);
        }

        $chuyen_bay->update($data);

        return redirect()->route('chuyen-bay.index')->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChuyenBay $chuyenBay)
    {
        $chuyen_bay->delete();
        return redirect()->route('chuyen-bay.index')->with('success', 'Xóa thành công');
    }
}

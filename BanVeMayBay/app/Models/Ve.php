<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ve extends Model
{
    use HasFactory;
    protected $table = 'ves';
    protected $fillable = ['ma_ve', 'chuyen_bay_id', 'khach_hang_id', 'hang_ve', 'gia', 'trang_thai'];

    public function chuyenBay()
    {
        return $this->belongsTo(ChuyenBay::class, 'chuyen_bay_id');
    }

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id');
    }
}

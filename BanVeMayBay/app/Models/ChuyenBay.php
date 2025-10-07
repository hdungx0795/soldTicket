<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChuyenBay extends Model
{
    use HasFactory;
    protected $table = 'chuyen_bays';
    protected $fillable = [
        'ma_chuyen', 'san_bay_di', 'san_bay_den',
        'thoi_gian_di', 'thoi_gian_den', 'so_ghe', 'so_ghe_con', 'gia'
    ];

    public function ves()
    {
        return $this->hasMany(Ve::class, 'chuyen_bay_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\KategoriModel;

class StockModel extends Model
{
    use HasFactory;

    use HasFactory;

    protected $table = 't_stok';
    protected $primaryKey = 'stok_id';
    public $timestamps = false;

    protected $fillable = [
        'stok_id',
        'barang_id',
        'user_id',
        'stok_tanggal',
        'stok_jumlah'
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(UserModel::class, 'User_id');
    }

    public function barang() : BelongsTo {
        return $this->belongsTo(barangModel::class, 'Barang_id');
    }

}

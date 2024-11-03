<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\KategoriModel;

class barangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang';
    protected $primaryKey = 'barang_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'kategori_id',
        'barang_kode',
        'barang_nama',
        'harga_beli',
        'harga_jual',
    ];

    public function kategori() : BelongsTo {
        return $this->belongsTo(KategoriModel::class, 'kategori_id');
    }

    public function user() : BelongsTo {
        return $this->belongsTo(StockModel::class);
    }
}

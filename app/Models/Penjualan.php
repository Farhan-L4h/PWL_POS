<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Penjualan extends Model
{

    use HasFactory;

    protected $table = 't_penjualan';
    protected $primaryKey = 'penjualan_id';
    public $timestamps = true; // Adjusted to true to match the migration file

    protected $fillable = [
        'user_id',
        'pembeli', // Adjusted to match the migration file
        'penjualan_kode',
        'tanggal',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'user_id'); // Adjusted to match the class name convention
    }
}

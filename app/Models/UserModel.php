<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\LevelModel;
use App\Models\StockModel;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'level_id',
        'username',
        'nama',
        'password'
    ];


    public function stok(): BelongsTo
    {
        return $this->belongsTo(StockModel::class, 'stok_id');
    }

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'level_id');
    }
}

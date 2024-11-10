<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'satuan';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = [
        'nama_satuan',
    ];

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}

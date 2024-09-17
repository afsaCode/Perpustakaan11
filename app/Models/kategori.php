<?php

namespace App\Models;
use App\Models\bukuinduk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $fillable = [
        'id_kat',
        'kategori',
        'waktu_peminjaman',
        'harga_keterlambatan',
    ];

    protected $primaryKey = 'id_kat';
    protected $keyType = 'string';
    public $incrementing = false;
    
    public $timestamps = false;
    public function bukuinduk()
    {
        return $this->hasMany(bukuinduk::class);
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}

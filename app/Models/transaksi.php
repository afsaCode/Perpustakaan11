<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory; 
    protected $table = 'transaksi';
    protected $fillable = ['id_transaksi','id_buku_anak','nis_nik','tgl_buku_kembali','tgl_peminjaman','tgl_pengembalian',];
    protected $keyType = 'string'; 
    protected $primaryKey = 'id_transaksi'; 
    protected static function boot()
    {
        parent::boot();

        static::creating(function($transaksi){
            if (empty($transaksi->id_transaksi)) {
                $transaksi->id_transaksi = 'T' . str_pad((string) (transaksi::count() + 1), 3, '0', STR_PAD_LEFT);
            }
        });
    }
    public function bukuanak()
    {
        return $this->belongsTo(bukuanak::class, 'id_buku_anak');
    }
    public function member()
    {
        return $this->belongsTo(Member::class, 'nis_nik', 'nis_nik');
    }
    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
    
    public function jenis_denda()
    {
        return $this->belongsTo(jenis_denda::class);
    }
    public function denda()
    {
        return $this->hasMany(denda::class);
    }
    
    public $timestamps = false;
}

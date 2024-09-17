<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class denda extends Model
{
    use HasFactory;
    protected $table = 'denda';
    protected $keyType = 'string'; 
    protected $guarded = []; 

    protected static function boot()
    {
        parent::boot();

        static::creating(function($denda){
            if (empty($denda->id_denda)) {
                $denda->id_denda = 'D' . str_pad((string) (denda::count() + 1), 3, '0', STR_PAD_LEFT);
            }
        });
    }
    protected $primaryKey = 'id_denda'; 

    public function transaksi()
    {
        return $this->belongsTo(transaksi::class, 'id_buku_anak');
    }
    public function jenis_denda()
    {
        return $this->belongsTo(jenis_denda::class, 'id_buku_anak');
    }
    public function pegawai()
    {
        return $this->belongsTo(pegawai::class, 'nip');
    }


}

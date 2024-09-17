<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukuinduk extends Model
{
    use HasFactory;
    protected $table = 'bukuinduk';

    protected $primaryKey= 'id_bukuinduk';
    protected $fillable = ['id_bukuinduk','kategori','rak', 'judul', 'penulis','penerbit','tahun_terbit','isbn','jml_hal','sinopsis','stok','jumlah','sampul','ebook','harga'];
    
    public $timestamps = false;

    protected $keyType = 'string'; 

    public function kategori()
    {
        return $this->belongsTo(kategori::class);
    }
    public function rak()
    {
        return $this->belongsTo(rak::class);
    }
    public function bukuanak()
    {
        return $this->hasMany(bukuanak::class, 'id_bukuinduk', 'id_bukuinduk');
    }
    public function getJumlahBukuAttribute()
    {
        return $this->bukuanak()->count();
    }
    
}

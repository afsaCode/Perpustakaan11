<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bukuanak extends Model
{
    use HasFactory;
    protected $table = 'bukuanak';
    protected $fillable = ['id','id_bukuinduk', 'status'];
    protected $keyType = 'string'; 
    
    public $timestamps = false;
    public function bukuInduk()
    {
        return $this->belongsTo(BukuInduk::class, 'id_bukuinduk', 'id_bukuinduk');
    }
    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
    
}

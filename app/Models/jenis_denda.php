<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_denda extends Model
{
    use HasFactory;

    protected $table = 'jenis_denda';
    protected $guarded = []; 

    protected $primaryKey='id_jenis_denda';
    
    protected $keyType='string';  
    public function transaksi()
    {
    return $this->hasMany(transaksi::class);
    }  
    public function denda()
    {
    return $this->hasMany(denda::class);
    }  
}

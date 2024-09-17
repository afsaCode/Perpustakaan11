<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $guarded = []; 
    protected $keyType = 'string';  
    protected $primaryKey = 'nip';

    public function denda()
    {
        return $this->hasMany(denda::class);
    }
}

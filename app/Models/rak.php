<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\bukuinduk;
use Illuminate\Database\Eloquent\Model;

class rak extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'rak';
    protected $fillable = [
        'id_rak',
        'rak',
    ];
    public function bukuinduk()
    {
        return $this->hasMany(bukuinduk::class);
    }
}

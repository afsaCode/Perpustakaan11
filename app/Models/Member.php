<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $guarded = []; 

    protected $primaryKey='nis_nik';
    
    protected $keyType='string';  
    public function user()
    {
    return $this->belongsTo(User::class);
    }  
    public function transaksi()
    {
    return $this->hasMany(transaksi::class);
    }  
    
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function($user){
    //         if (empty($user->id_user)) {
    //             $user->id_user = 'U' . str_pad((string) (User::count() + 1), 3, '0', STR_PAD_LEFT);
    //         }
    //     });
    // }

    
    public $timestamps = false;
}

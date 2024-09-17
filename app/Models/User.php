<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Member;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    public function member()
{
    return $this->hasMany(Member::class);
}
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'role',
    ];
    
    protected $keyType = 'string'; 

    protected static function boot()
    {
        parent::boot();

        static::creating(function($user){
            if (empty($user->id_user)) {
                $user->id_user = 'U' . str_pad((string) (User::count() + 1), 3, '0', STR_PAD_LEFT);
            }
        });
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
    // /**
    //  * Interact with the user's first name.
    //  *
    //  * @param  string  $value
    //  * @return \Illuminate\Database\Eloquent\Casts\Attribute
    //  */
    // protected function type(): Attribute
    // {
    //     return new Attribute(
    //         get: fn ($value) =>  ["user", "admin", "kepala"][$value],
    //     );
    // }

}

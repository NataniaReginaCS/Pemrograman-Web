<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;

    public $timestamps = false;
    protected $table = "users";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }

    public function peserta(){
        return $this->hasMany(Peserta::class);
    }
}

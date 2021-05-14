<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Str;
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded=[];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $fillable = [
//        'name',
//
//        'email',
//        'password',
//    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Check if user has confirmed email
     *
     * @return bool
     */

    public function isConfirmed(){
        return !! $this->is_confirmed;
    }

    /**
     * @return string
     */
    public function getEmailConfirmationToken(){

        $this->update([
            'confirmation_token'=> $token=Str::random(),
        ]);
        return $token;
    }

    /**
     * @return App\User
     *
     */
    public function confirm(){
        $this->update(['is_confirmed'=>true,
            'confirmation_token'=>null,
            ]) ;
        return $this;
    }
}

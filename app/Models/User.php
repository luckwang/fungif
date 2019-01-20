<?php

namespace App\Models;

use App\Score;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use QCod\ImageUp\HasImageUploads;

class User extends Authenticatable
{
    use Notifiable;
    use HasImageUploads;

    protected static $imageFields = [
        'avatar' => [
            'path' => 'avatars',
            'width' => '200',
            'height' => '200'
        ]
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'introduction'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function gifs()
    {
        return $this->hasMany(Gif::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}

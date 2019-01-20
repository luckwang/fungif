<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    protected $fillable = ['user_id', 'gif_id'];
}

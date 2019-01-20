<?php

namespace App\Models;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function gifs()
    {
        return $this->belongsToMany(Gif::class)->withTimestamps();
    }
}

<?php

namespace App\Models;

class Reply extends Model
{
    protected $fillable = ['content', 'gif_id'];

    public function gif()
    {
        return $this->belongsTo(Gif::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

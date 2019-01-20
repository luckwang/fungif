<?php

namespace App\Models;

use QCod\ImageUp\HasImageUploads;

class Gif extends Model
{
    use HasImageUploads;
    use Traits\Scoreable;
    use Traits\Tagable;

    protected static $imageFields = ['path'];
    protected $fillable = ['path', 'title', 'tag_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
}

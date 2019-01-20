<?php

namespace App\Models\Traits;

use App\Models\Tag;

trait Tagable
{
    public function syncTags($tags)
    {
        $tagIds = [];
//		设置 tag
        if (isset($tags) && is_array($tags)) {
            foreach ($tags as $tag) {
                $gifTag = Tag::firstOrNew(['name' => $tag]);
                $gifTag->save();
                $tagIds[] = $gifTag->id;
            }
            $this->tags()->sync($tagIds);
        }
    }

}
<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = factory(Tag::class)->times(50)->make();

        Tag::insert($tags->toArray());
    }

}


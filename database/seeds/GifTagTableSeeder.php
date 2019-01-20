<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\User;

class GifTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = User::all()->pluck('id');
        $tag_ids = Tag::all()->pluck('id');

        App\Models\Gif::all()->each(function ($gif, $index) use ($tag_ids, $user_ids) {
            $gif->tags()->attach(
                mt_rand(1, $tag_ids->count())
            );
            $gif->user_id = mt_rand(1, $user_ids->count());
        });
    }
}

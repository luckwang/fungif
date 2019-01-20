<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;
use App\Models\User;
use App\Models\Gif;

class RepliesTableSeeder extends Seeder
{
    public function run()
    {
        $user_ids = User::all()->pluck('id');
        $gif_ids = Gif::all()->pluck('id');
        $replies = factory(Reply::class)->times(50)->make()->each(function ($reply, $index) use ($user_ids, $gif_ids) {
            $reply->user_id = mt_rand(1, $user_ids->count());
            $reply->gif_id = mt_rand(1, $gif_ids->count());
        });

        Reply::insert($replies->toArray());
    }

}


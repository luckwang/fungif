<?php

use Illuminate\Database\Seeder;
use App\Models\Gif;
use App\Models\User;

class GifsTableSeeder extends Seeder
{
    public function run()
    {
        $images = [
            'uploads/9359fb49ea83770bb1501b901c41d0a6e3cc61ca184a0-ImMj4O_fw658.jpg',
            'uploads/0178648bcf94b93a59102730b4c2714d5101ba0037558-y2d5wW_fw658.jpg',
            'uploads/06d3030016c08656d2c197d7c799040d3abb77db15624-Ucbxyt_fw658.jpg',
            'uploads/a248afb856e80e62c9afe3793639f0bff2d8e16a23e3f-IAcmkO_fw658.jpg',
            'uploads/4d092a71ad9d0abc3266737079e99e62b11658de1b0c9-1Uaqp6_fw658.jpg',
            'uploads/107a7ff977594cd50070523fc514da325d6b9880162ce-4k9uwP_fw658.jpg',
        ];
        $user_ids = User::all()->pluck('id');
        $gifs = factory(Gif::class)->times(50)->make()->each(function ($gif, $index) use ($user_ids, $images) {
            $gif->user_id = mt_rand(1, $user_ids->count());
            $gif->path = $images[mt_rand(0, count($images)-1)];
        });
        Gif::insert($gifs->toArray());
    }

}

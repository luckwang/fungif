<?php

namespace App\Models\Traits;

use App\Models\Score;

trait Scoreable
{
    public function getAvgScore()
    {
        return Score::where('gif_id' ,'=', $this->id)->avg('point');
    }

    public function getScore()
    {
        $score = Score::where([['user_id', '=', \Auth::id()], ['gif_id', '=', $this->id]])->first();
        if (empty($score)) {
            return 0;
        }
        return $score->point;
    }

    public function storeScore($point)
    {
        $score = Score::updateOrCreate(['user_id' => \Auth::id(), 'gif_id' => $this->id]);
        $score->point = $point;
        $score->save();
    }

}
<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Gif;

class GifPolicy extends Policy
{
    public function update(User $user, Gif $gif)
    {
        return $gif->user_id === $user->id;
    }

    public function destroy(User $user, Gif $gif)
    {
        return $gif->user_id === $user->id;
    }
}

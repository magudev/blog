<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function author(User $user, Post $post)
    {
        if ($post->user_id == $user->id) {
            return true;
        } else {
            return false;
        }
    }

    public function published(?User $user, Post $post)
    {
        if ($post->status == '2') {
            return true;
        } else {
            return false;
        }
    }
}

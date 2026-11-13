<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    // الأدمن يعدّي على كل شي
    public function before(User $user, string $ability): ?bool
    {
        if ($user->type === 'admin') {
            return true;
        }
        return null; // كمّل للقواعد العادية
    }

    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }

    public function delete(User $user, Post $post): bool
    {
        return $user->id === $post->user_id;
    }
}

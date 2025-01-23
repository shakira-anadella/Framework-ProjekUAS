<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;

class ReviewPolicy
{
    public function delete(User $user, Review $review)
{
    // Admin atau pemilik review yang bisa menghapus
    return $user->is_admin || $user->id === $review->user_id;
}


}

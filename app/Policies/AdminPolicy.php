<?php

namespace App\Policies;

use App\Models\User;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
        public function adminAccess(User $user)
    {
        return $user->is_admin; // Misalnya Anda menggunakan atribut is_admin pada user untuk menentukan admin
    }

}

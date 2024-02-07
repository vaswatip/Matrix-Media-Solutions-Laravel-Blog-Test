<?php

namespace App\Contracts\User;

interface UserContract
{
    /**
     * Get the current user.
     *
     * @return mixed The current user.
     */
    public function getCurrentUser();
}
<?php

namespace App\Models\Auth\Traits\Method;

/**
 * Trait ServerMethod.
 */
trait ServerMethod
{
    /**
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->name === config('access.users.admin_role');
    }
}

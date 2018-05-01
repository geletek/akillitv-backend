<?php

namespace App\Models\Traits\Methods;

/**
 * Trait CategoryMethod.
 */
trait CategoryMethod
{

    public function getPicture($size = false)
    {
        switch ($this->avatar_type) {
            case 'gravatar':
                if (! $size) {
                    $size = config('gravatar.default.size');
                }

                return gravatar()->get($this->email, ['size' => $size]);

            case 'storage':
                return url('storage/'.$this->avatar_location);
        }

        $social_avatar = $this->providers()->where('provider', $this->avatar_type)->first();
        if ($social_avatar && strlen($social_avatar->avatar)) {
            return $social_avatar->avatar;
        }

        return false;
    }


    public function isActive()
    {
        return $this->active == 1;
    }

    public function isConfirmed()
    {
        return $this->confirmed == 1;
    }
}

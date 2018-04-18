<?php

namespace App\Events\Backend\Auth\Server;

use Illuminate\Queue\SerializesModels;

/**
 * Class ServerUpdated.
 */
class ServerUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $server;

    /**
     * @param $role
     */
    public function __construct($role)
    {
        $this->role = $role;
    }
}

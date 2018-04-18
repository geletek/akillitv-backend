<?php

namespace App\Events\Backend\Auth\Server;

use Illuminate\Queue\SerializesModels;

/**
 * Class ServerDeleted.
 */
class ServerDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $server;

    /**
     * @param $server
     */
    public function __construct($server)
    {
        $this->server = $server;
    }
}

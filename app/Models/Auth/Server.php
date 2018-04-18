<?php

namespace App\Models\Auth;

use App\Models\Auth\Traits\Method\ServerMethod;
use App\Models\Auth\Traits\Attribute\ServerAttribute;

/**
 * Class Server.
 */
class Server extends \Spatie\Permission\Models\Server
{
    use ServerAttribute, ServerMethod;
}

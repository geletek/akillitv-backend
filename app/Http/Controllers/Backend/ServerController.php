<?php

namespace App\Http\Controllers\Backend\Server;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\ServerRepository;
use App\Http\Requests\Backend\Server\StoreServerRequest;
use App\Http\Requests\Backend\Server\ManageServerRequest;
use App\Http\Requests\Backend\Server\UpdateServerRequest;

class ServerController extends Controller
{
    protected $serverRepository;

    public function __construct(ServerRepository $serverRepository)
    {
        $this->serverRepository = $serverRepository;
    }
    public function index()
    {
        return view('backend.server.index')->withServers($this->serverRepository->getActivePaginated(25, 'id', 'asc'));
    }
}

<?php

namespace App\Http\Controllers\Backend\Auth\Server;

use App\Models\Auth\Server;
use App\Http\Controllers\Controller;
use App\Events\Backend\Auth\Server\ServerDeleted;
use App\Repositories\Backend\Auth\ServerRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\Server\StoreServerRequest;
use App\Http\Requests\Backend\Auth\Server\ManageServerRequest;
use App\Http\Requests\Backend\Auth\Server\UpdateServerRequest;


/**
 * Class ServerController.
 */
class ServerController extends Controller
{
    /**
     * @var ServerRepository
     */
    protected $serverRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @param ServerRepository       $serverRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(ServerRepository $serverRepository, PermissionRepository $permissionRepository)
    {
        $this->serverRepository = $serverRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param ManageServerRequest $request
     *
     * @return mixed
     */
    public function index(ManageServerRequest $request)
    {
        return view('backend.auth.server.index')
            ->withServers($this->serverRepository
                ->with('users', 'permissions')
                ->orderBy('id', 'asc')
                ->paginate(25));
    }

    /**
     * @param ManageServerRequest $request
     *
     * @return mixed
     */
    public function create(ManageServerRequest $request)
    {
        return view('backend.auth.server.create')
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * @param StoreServerRequest $request
     *
     * @return mixed
     */
    public function store(StoreServerRequest $request)
    {
        $this->serverRepository->create($request->only('name', 'associated-permissions', 'permissions', 'sort'));

        return redirect()->route('admin.auth.server.index')->withFlashSuccess(__('alerts.backend.servers.created'));
    }

    /**
     * @param Server              $server
     * @param ManageServerRequest $request
     *
     * @return mixed
     */
    public function edit(Server $server, ManageServerRequest $request)
    {
        if ($server->isAdmin()) {
            return redirect()->route('admin.auth.server.index')->withFlashDanger('You can not edit the administrator server.');
        }

        return view('backend.auth.server.edit')
            ->withServer($server)
            ->withServerPermissions($server->permissions->pluck('name')->all())
            ->withPermissions($this->permissionRepository->get());
    }

    /**
     * @param Server              $server
     * @param UpdateServerRequest $request
     *
     * @return mixed
     */
    public function update(Server $server, UpdateServerRequest $request)
    {
        $this->serverRepository->update($server, $request->only('name', 'permissions'));

        return redirect()->route('admin.auth.server.index')->withFlashSuccess(__('alerts.backend.servers.updated'));
    }

    /**
     * @param Server $server
     * @param ManageServerRequest $request
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(Server $server, ManageServerRequest $request)
    {
        if ($server->isAdmin()) {
            return redirect()->route('admin.auth.server.index')->withFlashDanger(__('exceptions.backend.access.servers.cant_delete_admin'));
        }

        $this->serverRepository->deleteById($server->id);

        event(new ServerDeleted($server));

        return redirect()->route('admin.auth.server.index')->withFlashSuccess(__('alerts.backend.servers.deleted'));
    }
}

<?php

namespace App\Http\Controllers\Backend\Server;

use App\Models\Server;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\ServerRepository;
use App\Http\Requests\Backend\Server\ManageServerRequest;

/**
 * Class ServerStatusController.
 */
class ServerStatusController extends Controller
{
    /**
     * @var ServerRepository
     */
    protected $serverRepository;

    /**
     * @param ServerRepository $serverRepository
     */
    public function __construct(ServerRepository $serverRepository)
    {
        $this->serverRepository = $serverRepository;
    }

    /**
     * @param ManageServerRequest $request
     *
     * @return mixed
     */
    public function getDeactivated(ManageServerRequest $request)
    {
        return view('backend.server.deactivated')
            ->withServers($this->serverRepository->getInactivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageServerRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageServerRequest $request)
    {
        return view('backend.server.deleted')
            ->withServers($this->serverRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Server              $server
     * @param                   $status
     * @param ManageServerRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function mark(Server $server, $status, ManageServerRequest $request)
    {
        $this->serverRepository->mark($server, $status);

        return redirect()->route($status == 1 ?
            'admin.server.index' :
            'admin.server.deactivated'
        )->withFlashSuccess(__('alerts.backend.server.updated'));
    }

    /**
     * @param Server              $deletedServer
     * @param ManageServerRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Server $deletedServer, ManageServerRequest $request)
    {
        $this->serverRepository->forceDelete($deletedServer);

        return redirect()->route('admin.server.deleted')->withFlashSuccess(__('alerts.backend.server.deleted_permanently'));
    }

    /**
     * @param Server              $deletedServer
     * @param ManageServerRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Server $deletedServer, ManageServerRequest $request)
    {
        $this->serverRepository->restore($deletedServer);

        return redirect()->route('admin.server.index')->withFlashSuccess(__('alerts.backend.server.restored'));
    }
}

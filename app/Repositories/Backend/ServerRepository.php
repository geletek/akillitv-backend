<?php

namespace App\Repositories\Backend;

use App\Models\Server;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ServerRepository.
 */
class ServerRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Server::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->where('status', 'active')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getInactivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->where('status', 'passive')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @return Server
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Server
    {
        return DB::transaction(function () use ($data) {
            $server = parent::create([
                'title' => $data['title'],
                'ipAddress' => $data['ipAddress'],
                'serverType' => $data['serverType'],
                'defaultUploadPath' => $data['defaultUploadPath'],
                'ftpServername' => $data['ftpServername'],
                'ftpPassword' => $data['ftpPassword'],
                'status' => $data['status'],

            ]);

            if ($server) {
                // Server must have ip address
                if (! count($data['roles'])) {
                    throw new GeneralException(__('exceptions.backend.servers.server_need_ipAddress'));
                }

                return $server;
            }

            throw new GeneralException(__('exceptions.backend.servers.create_error'));
        });
    }

    /**
     * @param Server  $server
     * @param array $data
     *
     * @return Server
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Server $server, array $data) : Server
    {
        $this->ServercheckServerByIPAddress($server, $data['ipAddress']);

        return DB::transaction(function () use ($server, $data) {
            if ($server->update([
              'title' => $data['title'],
              'ipAddress' => $data['ipAddress'],
              'serverType' => $data['serverType'],
              'defaultUploadPath' => $data['defaultUploadPath'],
              'ftpServername' => $data['ftpServername'],
              'ftpPassword' => $data['ftpPassword'],
              'status' => $data['status'],
            ])) {

                return $server;
            }

            throw new GeneralException(__('exceptions.backend.servers.update_error'));
        });
    }

    public function forceDelete(Server $server) : Server
    {
        if (is_null($server->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.servers.delete_first'));
        }

        return DB::transaction(function () use ($server) {
            // Delete associated relationships
            $server->providers()->delete();

            if ($server->forceDelete()) {
                return $server;
            }

            throw new GeneralException(__('exceptions.backend.servers.delete_error'));
        });
    }

    /**
     * @param Server $server
     *
     * @return Server
     * @throws GeneralException
     */
    public function restore(Server $server) : Server
    {
        if (is_null($server->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.servers.cant_restore'));
        }

        if ($server->restore()) {
            event(new ServerRestored($server));

            return $server;
        }

        throw new GeneralException(__('exceptions.backend.servers.restore_error'));
    }

    /**
     * @param Server $server
     * @param      $email
     *
     * @throws GeneralException
     */
    protected function checkServerByIPAddress(Server $server, $ipAddress)
    {
        //Figure out if ip address is not the same
        if ($server->ipAddress != $ipAddress) {
            //Check to see if ip address exists
            if ($this->model->where('ipAddress', '=', $ipAddress)->first()) {
                throw new GeneralException(trans('exceptions.backend.servers.ipAddress_error'));
            }
        }
    }
}

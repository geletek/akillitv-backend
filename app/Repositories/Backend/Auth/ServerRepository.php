<?php

namespace App\Repositories\Backend\Auth;

use App\Models\Auth\Server;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Auth\Server\ServerCreated;
use App\Events\Backend\Auth\Server\ServerUpdated;

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
     * @param array $data
     *
     * @return Server
     * @throws GeneralException
     */
    public function create(array $data) : Server
    {
        // Make sure it doesn't already exist
        if ($this->serverExists($data['name'])) {
            throw new GeneralException('A server already exists with the name '.$data['name']);
        }

        if (! isset($data['permissions']) || ! count($data['permissions'])) {
            $data['permissions'] = [];
        }

        //See if the server must contain a permission as per config
        if (config('access.servers.server_must_contain_permission') && count($data['permissions']) == 0) {
            throw new GeneralException(__('exceptions.backend.access.servers.needs_permission'));
        }

        return DB::transaction(function () use ($data) {
            $server = parent::create(['name' => $data['name']]);

            if ($server) {
                $server->givePermissionTo($data['permissions']);

                event(new ServerCreated($server));

                return $server;
            }

            throw new GeneralException(trans('exceptions.backend.access.servers.create_error'));
        });
    }

    /**
     * @param Server  $server
     * @param array $data
     *
     * @return mixed
     * @throws GeneralException
     */
    public function update(Server $server, array $data)
    {
        if ($server->isAdmin()) {
            throw new GeneralException('You can not edit the administrator server.');
        }

        // If the name is changing make sure it doesn't already exist
        if ($server->name != $data['name']) {
            if ($this->serverExists($data['name'])) {
                throw new GeneralException('A server already exists with the name '.$data['name']);
            }
        }

        if (! isset($data['permissions']) || ! count($data['permissions'])) {
            $data['permissions'] = [];
        }

        //See if the server must contain a permission as per config
        if (config('access.servers.server_must_contain_permission') && count($data['permissions']) == 0) {
            throw new GeneralException(__('exceptions.backend.access.servers.needs_permission'));
        }

        return DB::transaction(function () use ($server, $data) {
            if ($server->update([
                'name' => $data['name'],
            ])) {
                $server->syncPermissions($data['permissions']);

                event(new ServerUpdated($server));

                return $server;
            }

            throw new GeneralException(trans('exceptions.backend.access.servers.update_error'));
        });
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function serverExists($name)
    {
        return $this->model
                ->where('name', $name)
                ->count() > 0;
    }
}

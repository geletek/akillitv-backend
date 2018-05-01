<?php

namespace App\Repositories\Backend;

use App\Models\Video;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class VideoRepository.
 */
class VideoRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Video::class;
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
     * @return Video
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Video
    {
        return DB::transaction(function () use ($data) {
            $video = parent::create([
                'title' => $data['title'],
                'ipAddress' => $data['ipAddress'],
                'videoType' => $data['videoType'],
                'defaultUploadPath' => $data['defaultUploadPath'],
                'ftpVideoname' => $data['ftpVideoname'],
                'ftpPassword' => $data['ftpPassword'],
                'status' => $data['status'],

            ]);

            if ($video) {
                // Video must have ip address
                if (! count($data['roles'])) {
                    throw new GeneralException(__('exceptions.backend.videos.video_need_ipAddress'));
                }

                return $video;
            }

            throw new GeneralException(__('exceptions.backend.videos.create_error'));
        });
    }

    /**
     * @param Video  $video
     * @param array $data
     *
     * @return Video
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Video $video, array $data) : Video
    {
        $this->VideocheckVideoByIPAddress($video, $data['ipAddress']);

        return DB::transaction(function () use ($video, $data) {
            if ($video->update([
              'title' => $data['title'],
              'ipAddress' => $data['ipAddress'],
              'videoType' => $data['videoType'],
              'defaultUploadPath' => $data['defaultUploadPath'],
              'ftpVideoname' => $data['ftpVideoname'],
              'ftpPassword' => $data['ftpPassword'],
              'status' => $data['status'],
            ])) {

                return $video;
            }

            throw new GeneralException(__('exceptions.backend.videos.update_error'));
        });
    }

    public function forceDelete(Video $video) : Video
    {
        if (is_null($video->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.videos.delete_first'));
        }

        return DB::transaction(function () use ($video) {
            // Delete associated relationships
            $video->providers()->delete();

            if ($video->forceDelete()) {
                return $video;
            }

            throw new GeneralException(__('exceptions.backend.videos.delete_error'));
        });
    }

    /**
     * @param Video $video
     *
     * @return Video
     * @throws GeneralException
     */
    public function restore(Video $video) : Video
    {
        if (is_null($video->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.videos.cant_restore'));
        }

        if ($video->restore()) {
            event(new VideoRestored($video));

            return $video;
        }

        throw new GeneralException(__('exceptions.backend.videos.restore_error'));
    }

    /**
     * @param Video $video
     * @param      $email
     *
     * @throws GeneralException
     */
    protected function checkVideoByIPAddress(Video $video, $ipAddress)
    {
        //Figure out if ip address is not the same
        if ($video->ipAddress != $ipAddress) {
            //Check to see if ip address exists
            if ($this->model->where('ipAddress', '=', $ipAddress)->first()) {
                throw new GeneralException(trans('exceptions.backend.videos.ipAddress_error'));
            }
        }
    }
}

<?php

namespace App\Repositories\Backend;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Category::class;
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
     * @return Category
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Category
    {

        return DB::transaction(function () use ($data) {
            $category = parent::create([
                'title' => $data['title'],
                'description' => $data['description'],
                //'thumbnailUrl' => $data['thumbnailUrl'],
                'status' => $data['status'],
                'addedBy' => $data['addedBy'],
                'addedIpAddress' => $data['addedIpAddress'],

            ]);


            return $category;


            throw new GeneralException(__('exceptions.backend.category.create_error'));
        });
    }

    /**
     * @param Category  $category
     * @param array $data
     *
     * @return Category
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Category $category, array $data) : Category
    {
        $this->CategoryCheckCategoryByTitle($category, $data['title']);

        return DB::transaction(function () use ($category, $data) {
            if ($category->update([
              'title' => $data['title'],
              'description' => $data['description'],
              'status' => $data['status']
            ])) {

                return $category;
            }

            throw new GeneralException(__('exceptions.backend.category.update_error'));
        });
    }

    public function forceDelete(Category $category) : Category
    {
        if (is_null($category->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.category.delete_first'));
        }

        return DB::transaction(function () use ($category) {
            // Delete associated relationships
            $category->providers()->delete();

            if ($category->forceDelete()) {
                return $category;
            }

            throw new GeneralException(__('exceptions.backend.category.delete_error'));
        });
    }

    /**
     * @param Category $category
     *
     * @return Category
     * @throws GeneralException
     */
    public function restore(Category $category) : Category
    {
        if (is_null($category->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.category.cant_restore'));
        }

        if ($category->restore()) {
            event(new CategoryRestored($category));

            return $category;
        }

        throw new GeneralException(__('exceptions.backend.category.restore_error'));
    }

    /**
     * @param Category $category
     * @param      $email
     *
     * @throws GeneralException
     */
    protected function CategoryCheckCategoryByTitle(Category $category, $title)
    {
        //Figure out if ip address is not the same
        if ($category->title != $title) {
            //Check to see if ip address exists
            if ($this->model->where('title', '=', $title)->first()) {
                throw new GeneralException(trans('exceptions.backend.category.title_error'));
            }
        }
    }
}

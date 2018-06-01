<?php

namespace App\Http\Controllers\Backend\Video\Category;

use App\Models\Video\Category;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Video\CategoryRepository;
use App\Http\Requests\Backend\Video\Category\ManageCategoryRequest;

/**
 * Class CategoryStatusController.
 */
class CategoryStatusController extends Controller
{
    /**
     * @var CategoryRepository
     */
    protected $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function getDeactivated(ManageCategoryRequest $request)
    {
        return view('backend.video.category.deactivated')
            ->withCategories($this->categoryRepository->getInactivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageCategoryRequest $request)
    {
        return view('backend.video.category.deleted')
            ->withCategories($this->categoryRepository->getDeletedPaginated(25, 'id', 'asc'));
    }

    /**
     * @param Category              $category
     * @param                   $status
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function mark(Category $category, $status, ManageCategoryRequest $request)
    {
        $this->categoryRepository->mark($category, $status);

        return redirect()->route($status == 1 ?
            'admin.video.category.index' :
            'admin.video.category.deactivated'
        )->withFlashSuccess(__('alerts.backend.video.category.category.updated'));
    }

    /**
     * @param Category              $deletedCategory
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function delete(Category $deletedCategory, ManageCategoryRequest $request)
    {
        $this->categoryRepository->forceDelete($deletedCategory);

        return redirect()->route('admin.video.category.deleted')->withFlashSuccess(__('alerts.backend.video.category.deleted_permanently'));
    }

    /**
     * @param Category              $deletedCategory
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(Category $deletedCategory, ManageCategoryRequest $request)
    {
        $this->categoryRepository->restore($deletedCategory);

        return redirect()->route('admin.video.category.index')->withFlashSuccess(__('alerts.backend.video.category.category.restored'));
    }
}

<?php

namespace App\Http\Controllers\Backend\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\CategoryRepository;
use App\Http\Requests\Backend\Category\ManageCategoryRequest;

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
        return view('backend.category.deactivated')
            ->withCategorys($this->categoryRepository->getInactivePaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageCategoryRequest $request
     *
     * @return mixed
     */
    public function getDeleted(ManageCategoryRequest $request)
    {
        return view('backend.category.deleted')
            ->withCategorys($this->categoryRepository->getDeletedPaginated(25, 'id', 'asc'));
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
            'admin.category.index' :
            'admin.category.deactivated'
        )->withFlashSuccess(__('alerts.backend.category.updated'));
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

        return redirect()->route('admin.category.deleted')->withFlashSuccess(__('alerts.backend.category.deleted_permanently'));
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

        return redirect()->route('admin.category.index')->withFlashSuccess(__('alerts.backend.category.restored'));
    }
}

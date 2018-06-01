<?php

namespace App\Http\Controllers\Backend\Video\Category;

use App\Models\Video\Category;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\Video\CategoryRepository;
use App\Http\Requests\Backend\Video\Category\StoreCategoryRequest;
use App\Http\Requests\Backend\Video\Category\ManageCategoryRequest;
use App\Http\Requests\Backend\Video\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        return view('backend.video.category.index')->withCategories($this->categoryRepository->getPaginated(25, 'id', 'asc'));
    }
    public function create(ManageCategoryRequest $request)
    {
        return view('backend.video.category.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->only(
            'title',
            'description',
            'status'
        );
        $data['addedBy'] = $request->user()->id;
        $data['addedIpAddress'] = $request->ip();
        $this->categoryRepository->create($data);

        return redirect()->route('admin.video.category.index')->withFlashSuccess(__('alerts.backend.video.category.created'));
    }

    public function show(Category $category, ManageCategoryRequest $request)
    {
        return view('backend.video.category.show')
            ->withCategory($category);
    }



    public function edit(Category $category, ManageCategoryRequest $request)
    {
        return view('backend.video.category.edit')->withCategory($category);
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $this->categoryRepository->update($category, $request->only(
            'title',
            'description',
            'status'
        ));

        return redirect()->route('admin.video.category.index')->withFlashSuccess(__('alerts.backend.video.category.updated'));
    }

    public function destroy(Category $category, ManageCategoryRequest $request)
    {

        $this->categoryRepository->deleteById($category->id);
        return redirect()->route('admin.video.category.deleted')->withFlashSuccess(__('alerts.backend.video.category.deleted'));
    }




}

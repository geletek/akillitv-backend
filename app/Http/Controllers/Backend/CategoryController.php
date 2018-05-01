<?php

namespace App\Http\Controllers\Backend\Category;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Repositories\Backend\CategoryRepository;
use App\Http\Requests\Backend\Category\StoreCategoryRequest;
use App\Http\Requests\Backend\Category\ManageCategoryRequest;
use App\Http\Requests\Backend\Category\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    public function index()
    {
        return view('backend.category.index')->withCategories($this->categoryRepository->getActivePaginated(25, 'id', 'asc'));
    }
    public function create(ManageCategoryRequest $request)
    {
        return view('backend.category.create');
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

        return redirect()->route('admin.category.index')->withFlashSuccess(__('alerts.backend.category.created'));
    }

    public function show(Category $category, ManageCategoryRequest $request)
    {
        return view('backend.category.show')
            ->withCategory($category);
    }

    

    public function edit(Category $category, ManageCategoryRequest $request)
    {
        return view('backend.category.edit')->withCategory($category);
    }

    public function update(Category $category, UpdateCategoryRequest $request)
    {
        $this->categoryRepository->update($category, $request->only(
            'title',
            'description',
            'status'
        ));

        return redirect()->route('admin.category.index')->withFlashSuccess(__('alerts.backend.category.updated'));
    }

    public function destroy(Category $category, ManageCategoryRequest $request)
    {
        $this->categoryRepository->deleteById($category->id);
        return redirect()->route('admin.category.deleted')->withFlashSuccess(__('alerts.backend.category.deleted'));
    }




}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repository\CategoryRepository;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    protected $category_repository;

    public function __construct(CategoryRepository $category_repository)
    {
        $this->category_repository = $category_repository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = $this->category_repository->categoryList();
        // return $categories;
        return view('categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request , Category $category)
    {
        $res = $this->category_repository->storeNewCategory($request,$category);
        if ($res == true) {
            return redirect()->route('categories.index')->with('success', 'New Category was successfully added.');
        } else {
            return back()->with('error', 'Category Store faild. Try again!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $res = $this->category_repository->updateCategory($request, $category);
        if ($res == true) {
            return redirect()->route('categories.index')->with('success', 'Category was successfully Updated.');
        } else {
            return redirect()->back()->with('error', 'Category was successfully Updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $res = $this->category_repository->deleteCategory($category);
        if ($res == true) {
            return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Category Delete Faild. Try Again!');
        }
    }
}

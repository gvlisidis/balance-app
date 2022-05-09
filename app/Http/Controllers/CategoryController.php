<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index', [
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create($request->validated());

        return to_route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('categories.edit')->with('category', $category);
    }

    public function update(StoreCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return to_route('categories.index');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return to_route('categories.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
  public function show($name)
  {
    return view('category.show')
    ->withCategory(Category::whereName($name)->with('posts.comments')->first());
  }

  public function create()
  {
    return view('category.create');
  }

  public function store(StoreCategoryRequest $request)
  {
    $name = str_replace(' ', '', $request->name);

    // $category = $request->user()->categories()->create($request->validated());
    $category = $request->user()->categories()->create(['name' => $name]);

    return redirect()->route('category.show', $category);
  }

}

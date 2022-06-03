<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin')->except(['show', 'index']);
  }

  public function index()
  {
    return view('category.index')->withCategories(Category::withCount('posts')->paginate());
  }

  public function show(Category $category)
  {
    $category->increment('views');

    return view('category.show')
    ->withPosts(\App\Models\Post::with('comments')->whereCategoryId($category->id)->paginate())
    ->withCategory($category);
  }

  public function create()
  {
    return view('category.create');
  }

  public function store(StoreCategoryRequest $request)
  {
    $data = $request->validate([
      'name' => ['required', 'string', 'unique:categories,name', 'min:3', 'max:8']
    ]);

    $name = str_replace(' ', '', $data['name']);

    $category = $request->user()->categories()->create(['name' => $name]);

    return Category::withCount('posts')->get();
  }

  public function destroy($category)
  {
    $this->authorize('delete', Category::find($category));
    Category::find($category)->delete();
  }

}

<?php

namespace App\Http\Controllers;

use App\Model\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{

  public function __construct()
  {
    $this->middleware('jwt', ['except' => ['index', 'show']]);
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return CategoryResource::collection(Category::latest()->get());
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CategoryRequest $request)
  {
    $validatedData = $request->all();
    $validatedData['slug'] = Str::slug($request->name);
    Category::create($validatedData);
    return response()->json([
      'success' => true,
      'data' => $validatedData,
      'message' => 'New category created successfully'
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Model\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function show(Category $category)
  {
    $categories = new CategoryResource($category);
    return new CategoryResource($categories);
  }


  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Model\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Category $category)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Model\Category  $category
   * @return \Illuminate\Http\Response
   */
  public function destroy(Category $category)
  {
    //
  }
}

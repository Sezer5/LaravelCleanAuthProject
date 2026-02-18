<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use GuzzleHttp\RedirectMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::latest()->get();
        return view('admin.categories.index')->with([
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddCategoryRequest $request)
    {
        //
        if($request->validated()){
            $data=$request->validated();
            $data['slug'] = Str::slug($request->name);
            Category::create($data);
            return redirect()->route('admin.categories.index')->with([
                'success' => 'Category Created'
            ]);
        };
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
         return view('admin.categories.edit')->with([
            'category' => $category
         ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request,Category $category)
    {
        if($request->validated()){
            $data = $request->validated();
            $data['slug'] = Str::slug($request->name);
            $category->update($data);
            return redirect()->route('admin.categories.index')->with([
                'success' => 'Category Updated Successfully'
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with(['success' => 'Category deleted successfully!']);
    }
}

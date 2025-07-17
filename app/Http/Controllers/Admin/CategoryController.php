<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


class CategoryController extends Controller
{
     public function index($slug){
    }

    public function view()
    {
        $user = Auth::user();
        $categories = $user->category;
        return view('auth.admin.category', compact('categories'));
    }

    public function create()
    {
        $user = Auth::user();
        return view('auth.admin.create-category');
    }

    public function store(CategoryRequest $request)
    {
        $request->validated();
        $user = Auth::user();
        $user->category()->create([
            'name'    => $request->name,
        ]);

        return redirect()->route('admin.dashboard.category.view')
            ->with('success', 'Category created successfully!');
    }

    public function edit(Category $category)
    {
        return view('auth.admin.edit-category', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category){
        $request->validated();
        $category->update([
            'name'    => $request->name,
        ]);

        return redirect()->route('admin.dashboard.category.view')
            ->with('success', 'Category updated successfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function add()
    {
        return view('admin.categories.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => ['required']
        ]);

        Category::create($validated);

        return back()->with('message', 'Category Added Successfully');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $category)
    {
        $category = Category::find($category);

        $validate = $request->validate([
            'category_name' => ['required']
        ]);

        $category->update($validate);

        return back()->with('message', 'Category Updated Successfully');
    }

    public function destroy($category)
    {
        $category = Category::findOrFail($category);
        $category->delete();

        return back()->with('message', 'Category Deleted Successfully');
    }
}

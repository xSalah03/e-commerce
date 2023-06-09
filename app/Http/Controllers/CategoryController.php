<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categoriesApp = Category::take(3)->get();
        $categories = Category::all();
        return view('pages.category.index', compact('categories', 'categoriesApp'));
    }

    public function create()
    {
        $categoriesApp = Category::take(3)->get();

        return view('pages.category.create', compact('categoriesApp'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'cover' => 'mimes:png,jpg,webp|max:4096',
        ]);

        $category = new Category();
        $category->name = $validatedData['name'];
        if ($request->hasFile('cover')) {
            $category->cover = $request->file('cover')->store('images/categories');
        }
        $category->save();
        // flashy()->success('Category saved successfully');
        return redirect()->route('category.index');
    }

    public function show(string $id)
    {
        $categoriesApp = Category::where('id', '!=', $id)->take(3)->get();
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();
        return view('pages.category.show', compact('category', 'categoriesApp', 'products'));
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('pages.category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'cover' => 'mimes:png,jpg,webp|max:4096',
        ]);

        $category = Category::findOrFail($id);
        $category->title = $validatedData['title'];
        $category->description = $validatedData['description'];

        if ($request->hasFile('cover')) {
            // Delete previous cover image if it exists
            if ($category->cover) {
                Storage::delete($category->cover);
            }

            $category->cover = $request->file('cover')->store('images/categories');
        }

        $category->save();

        // flashy()->success('Post updated successfully');
        return redirect()->route('category.index');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
        }

        return redirect()->route('category.index')->with('error', 'Failed to delete category.');
    }
}

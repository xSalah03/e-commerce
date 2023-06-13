<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoriesApp = Category::take(3)->get();
        $products = Product::all();
        $cartCount = Cart::count();

        return view('pages.product.index', compact('products', 'categoriesApp', 'cartCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoriesApp = Category::take(3)->get();
        $cartCount = Cart::count();
        $categories = Category::all();

        return view('pages.product.create', compact('categories', 'categoriesApp', 'cartCount'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'price' => 'required|integer',
            'description' => 'required|min:3|max:255',
            'cover' => 'required|mimes:png,jpg,webp|max:4096',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = new Product();
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];
        if ($request->hasFile('cover')) {
            $product->cover = $request->file('cover')->store('images/products');
        }
        $product->stock = $validatedData['stock'];
        $product->publish = $request->has('publish');
        $product->category_id = $validatedData['category_id'];
        $product->save();
        // flashy()->success('Category saved successfully');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $existingCart = Cart::where('product_id', $id)->first();

        $cartCount = Cart::count();

        $categoriesApp = Category::take(3)->get();

        $product = Product::find($id);

        $productsWithSameCategory = Product::where('id', '!=', $id)
            ->where('category_id', $product->category_id)
            ->get();

        return view('pages.product.show', compact('categoriesApp', 'productsWithSameCategory', 'product', 'existingCart', 'cartCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoriesApp = Category::take(3)->get();
        $product = Product::find($id);
        $cartCount = Cart::count();
        $categories = Category::all();
        return view('pages.product.edit', compact('product', 'categoriesApp', 'cartCount', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'price' => 'required|integer',
            'description' => 'required|min:3|max:255',
            'cover' => 'mimes:png,jpg,webp|max:4096',
            'stock' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $validatedData['name'];
        $product->price = $validatedData['price'];
        $product->description = $validatedData['description'];
        if ($request->hasFile('cover')) {
            // Delete previous cover image if it exists
            if ($product->cover) {
                Storage::delete($product->cover);
            }
            $product->cover = $request->file('cover')->store('images/products');
        }
        $product->stock = $validatedData['stock'];
        $product->publish = $request->has('publish');
        $product->category_id = $validatedData['category_id'];
        $product->save();

        // flashy()->success('Category saved successfully');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();
            return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
        }

        return redirect()->route('product.index')->with('error', 'Failed to delete product.');
    }
}

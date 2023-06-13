<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriesApp = Category::take(3)->get();
        $carts = Cart::all();
        $cartCount = Cart::count();
        $total = 0;
        foreach ($carts as $cart) {
            $quantity = $cart->quantity;
            $total += $cart->price * $quantity;
        }

        return view('pages.cart.index', compact('carts', 'categoriesApp', 'cartCount', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $productId = $request->input('product_id');

        $product = Product::findOrFail($productId);

        Cart::create([
            'product_id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'cover' => $product->cover,
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoriesApp = Category::take(3)->get();
        $carts = Cart::all();
        $cartCount = Cart::count();
        $matchedId = Cart::where('id', $id)->first();
        $total = 0;
        foreach ($carts as $cart) {
            $quantity = $cart->quantity;
            $total += $cart->price * $quantity;
        }

        return view('pages.cart.edit', compact('carts', 'categoriesApp', 'cartCount', 'matchedId', 'total'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'quantity' => 'required|numeric|min:0|integer',
        ]);

        $cart = Cart::findOrFail($id);
        $cart->quantity = $validatedData['quantity'];

        $cart->save();

        // flashy()->success('Post updated successfully');
        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cart = Cart::find($id);

        if ($cart) {
            $cart->delete();
            return redirect()->route('cart.index')->with('success', 'Cart deleted successfully.');
        }

        return redirect()->route('cart.index')->with('error', 'Failed to delete cart.');
    }

    public function remove(string $id)
    {
        $cart = Cart::where('product_id', $id)->first();
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }
}

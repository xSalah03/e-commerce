<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function app()
    {
        $categoriesApp = Category::take(3)->get();
        $cartCount = Cart::count();

        return view('index', compact('categoriesApp', 'cartCount'));
    }

    public function home()
    {
        $cartCount = Cart::count();
        $cart = Cart::count();
        $categoriesApp = Category::take(3)->get();
        $productsHome = Product::take(9)->get();
        return view('index', compact('productsHome', 'categoriesApp', 'cart', 'cartCount'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $categoriesApp = Category::take(3)->get();
        $cartCount = Cart::count();

        return view('pages.contact.index', compact('categoriesApp', 'cartCount'));
    }

    public function sendMail(Request $request)
    {
        $request->validate([
            'subject' => 'required|min:3|max:10',
            'email' => 'required|email',
            'message' => 'required|min:3|max:255',
        ]);

        Mail::to('Iqoqa@jomana.com')->send(new ContactMail($request->email, $request->subject, $request->message));

        return back();
    }
}

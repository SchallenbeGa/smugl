<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Category $category,Product $product)
    {  
        return view('product.show', compact('product'));
    }
    public function create(Request $request)
    {  
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string', 'max:255'],
        'captcha' => ['required', 'captcha']
        ]);

        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return view('product.show', compact('product'));
    }
    public function cart()
    {
        $cart = session()->get('cart');

        return view('cart.show', compact('cart'));
    }
    public function addToCart($id)
    {
        $product = Product::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "description"=>$product->description,
            "price" => $product->price,
            "photo" => $product->photo
        ];
 
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove($id)
    {
        if($id) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }
}

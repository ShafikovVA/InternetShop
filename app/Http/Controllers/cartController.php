<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Http\Controllers\Response;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Redirect;

class cartController extends Controller
{
    //
    public function addToCart(Request $request){
        $product = Good::where('id', $request->id)->first();

        if(!isset($_COOKIE['cart_id'])) setcookie('cart_id', uniqid());
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id);

        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'img' => $product->img,
                'slug'=>$product->slug,
                'category' => $request->category_slug,
                'subcategory' => $request->subcategory_slug
            ] 
        ]);

        return response()->json(\Cart::getContent());
    }
    public function removeToCart(Request $request){
        
        $cart_id = $_COOKIE['cart_id'];
        \Cart::session($cart_id)->remove($request->id);
        return redirect()->route('shoppingcart');
    }
    public function updateToCart(Request $request){
        
        $cart_id = $_COOKIE['cart_id'];

        \Cart::session($cart_id)->update($request->id, array(
            'quantity' => array(
                'relative' =>false,
                'value' => $request->quantity
            ),
        ));
        return redirect()->route('shoppingcart');
    }
}

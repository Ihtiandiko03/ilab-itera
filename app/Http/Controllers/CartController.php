<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Get the authenticated user
        // $user = auth()->user();

        // Check if the item is already in the cart
        $cartItem = Cart::where('user_id', 1)
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            // If the item is in the cart, increment the quantity
            $cartItem->increment('quantity');
        } else {
            // If not, create a new cart item
            Cart::create([
                'user_id'    => 1,
                'product_id' => $productId,
                'quantity'   => 1,
            ]);
        }

        // Redirect back or wherever you want
        return redirect()->back();
    }
}

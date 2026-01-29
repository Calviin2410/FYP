<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Assuming user authentication is set up
        //$user = $request->user();

        // Retrieve all cart items for the authenticated user
        //$cartItems = Cart::where('user_id', $user->id)->with('product')->get();
        $cartItems = Cart::where('user_id', 1)->with('product.category')->get();

        $formattedCartItems = $cartItems->map(function ($cartItem) {
            return [
                'id' => $cartItem->id,
                'product' => [
                    'name' => $cartItem->product->name,
                    'image' => url($cartItem->product->image),
                    'price' => $cartItem->product->price,
                    'category' => [
                        'name' => $cartItem->product->category->name,
                    ],
                ],
                'quantity' => $cartItem->quantity,

            ];
        });

        // Return the cart items as a JSON response
        return response()->json($formattedCartItems);
    }

    public function addToCart(Request $request)
    {
        // Assuming user authentication is set up
        $user = $request->user();
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
    
        $cartItem = Cart::firstOrCreate(
            ['user_id' => 1, 'product_id' => $productId],
            ['quantity' => 0]
        );
    
        $cartItem->quantity += $quantity;
        $cartItem->save();
    
        return response()->json(['message' => 'Item added to cart', 'cartItem' => $cartItem]);
    }

    public function removeFromCart(Request $request)
    {
        // Assuming user authentication is set up
        //$user = $request->user();

        // Replace with authenticated user ID for production
        $userId = 1; // For now, using a static user ID

        $productId = $request->input('product_id');

        // Find the cart item for the specified user and product
        $cartItem = Cart::where('id', $productId)
                        ->first();

        if (!$cartItem) {
            return response()->json(['message' => 'Item not found in cart', $productId, $cartItem], 404);
        }

        // Remove the item from the cart
        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart']);
    }

    public function clearCart(Request $request)
    {
        $userId = 1;

        Cart::where('user_id', $userId)->delete();

        return response()->json(['message' => 'All items removed from cart']);
    }
}

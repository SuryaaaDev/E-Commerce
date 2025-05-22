<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $user = Auth::user();
        $carts = $user->product()->withPivot('quantity')->get();

        $subtotal = 0;
        foreach ($carts as $cart) {
            $subtotal += $cart->price * $cart->pivot->quantity;
        }

        $ongkir = $subtotal * 0.02;
        $total = $subtotal + $ongkir;

        return view('store.cart', compact('carts','subtotal', 'ongkir', 'total'));
    }

    public function addCart($id)
    {
        $user = Auth::user();
        $product = Product::findOrFail($id);

        Cart::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);

        return redirect()->route('cart.index');
    }

    public function deleteCart($id)
    {
        $user = auth()->user();
        $user->product()->detach($id);

        return redirect()->route('cart.index');
    }

    public function updateQuantity($userId, $productId, $action)
    {
        $user = User::find($userId); 
        $product = Product::find($productId);

        if ($user && $product) {
            $pivotData = $user->product()->wherePivot('product_id', $productId)->first();

            if ($pivotData) {
                $quantity = $pivotData->pivot->quantity;

                if ($action == 'increase') {
                    $user->product()->updateExistingPivot($productId, [
                        'quantity' => $quantity + 1
                    ]);
                } elseif ($action == 'decrease') {
                    $user->product()->updateExistingPivot($productId, [
                        'quantity' => max($quantity - 1, 1) 
                    ]);
                }
            }
        }

        return redirect()->route('cart.index');
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AdminApiController extends Controller
{
    public function dashboard()
    {
        $productCount = Product::count();
        $userCount = User::count();
        $commentCount = Comment::count();

        return response()->json([
            'status' => true,
            'data' => [
                'product_count' => $productCount,
                'user_count' => $userCount,
                'comment_count' => $commentCount,
            ],
            'message' => 'User Count',
        ]);
    }

    public function allUser()
    {
        $users = User::select('id', 'username', 'email', 'telepon')->get();

        return response()->json([
            'status' => true,
            'data' => $users,
            'message' => 'All Product',
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json([
            'status' => true,
            'data' => $products,
            'message' => 'All Product',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $products = new Product();
        $products->name = $request->name;
        $products->price = $request->price;
        $products->description = $request->description;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product', 'public');
            $products->image = $imagePath;
        }
        $products->save();

        return response()->json([
            'status' => true,
            'data' => $products,
            'message' => 'Product Created',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $products = Product::find($id);

        return response()->json([
            'status' => true,
            'data' => $products,
            'message' => 'products ID',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $path = $request->file('image')->store('product', 'public');
            $product->image = $path;
        }

        $product->save();

        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $products = Product::find($id);

        // Hapus gambar jika ada
        if ($products->image && Storage::exists('public/' . $products->image)) {
            Storage::delete('public/' . $products->image);
        }
        $products->delete();

        return response()->json([
            'status' => true,
            'data' => $products,
            'message' => 'Products Deleted',
        ]);
    }

    public function destroyUser(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return response()->json([
            'status' => true,
            'data' => $user,
            'message' => 'User Deleted',
        ]);
    }
}

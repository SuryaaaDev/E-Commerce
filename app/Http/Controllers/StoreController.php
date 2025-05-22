<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    public function index()
    {
        $products = Product::all()->map(function ($product) {
            $product->description = Str::limit($product->description, 50);
            return $product;
        });

        $client = new Client();
        $url = "http://localhost:8001/api/comments";
        $response = $client->request('GET', $url);
        $commentsJson = $response->getBody()->getContents();
        $commentsArray = json_decode($commentsJson, true)['data'];

        foreach ($commentsArray as $key => $comment) {
            $user = User::find($comment['user_id']);  
            $commentsArray[$key]['user_name'] = $user ? $user->username : 'Unknown';  //kondisi ? nilai_true : nilai_false;
        }

        return view('store.index', compact('products', 'commentsArray'));
    }

    public function productView($id)
    {
        $product = Product::findOrFail($id);
        return view('store.product', compact('product'));
    }

    // public function header()
    // {
    //     $user = Auth::user();
    //     return view('layout.header', compact('user'));
    // }
}

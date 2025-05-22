<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $client = new Client();
        $url = "http://localhost:8001/api/dashboard";
        $response = $client->request('GET', $url);
        $countsJson = $response->getBody()->getContents();
        $countsArray = json_decode($countsJson, true)['data'];

        return view('admin.index', compact('countsArray'));
    }

    public function allUser()
    {
        $client = new Client();
        $url = "http://localhost:8001/api/users";
        $response = $client->request('GET', $url);
        $usersJson = $response->getBody()->getContents();
        $usersArray = json_decode($usersJson, true)['data'];

        return view('admin.users', compact('usersArray'));
    }

    public function allComment()
    {
        $client = new Client();
        $url = "http://localhost:8001/api/comments";
        $response = $client->request('GET', $url);
        $commentsJson = $response->getBody()->getContents();
        $commentsArray = json_decode($commentsJson, true)['data'];

        foreach ($commentsArray as $key => $comment) {
            $user = User::find($comment['user_id']);
            $commentsArray[$key]['user_name'] = $user ? $user->username : 'Unknown';  //kondisi ? nilai_true : nilai_false;
        }

        return view('admin.comments', compact('commentsArray'));
    }

    public function allProduct()
    {
        $client = new Client();
        $url = "http://localhost:8001/api/products";
        $response = $client->request('GET', $url);
        $productsJson = $response->getBody()->getContents();
        $productsArray = json_decode($productsJson, true)['data'];
        return view('admin.products', compact('productsArray'));
    }

    public function addProduct()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $paramenter = [
            'name' => $request['name'],
            'price' => $request['price'],
            'description' => $request['description'],
        ];

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product', 'public');
            $paramenter['image'] = $imagePath;
        }

        $client = new Client();
        $url = "http://localhost:8001/api/products";
        $response = $client->request('POST', $url, [
            'multipart' => [
                [
                    'name'     => 'name',
                    'contents' => $paramenter['name'],
                ],
                [
                    'name'     => 'price',
                    'contents' => $paramenter['price'],
                ],
                [
                    'name'     => 'description',
                    'contents' => $paramenter['description'],
                ],
                [
                    'name'     => 'image',
                    'contents' => fopen(storage_path('app/public/' . $paramenter['image']), 'r'),
                    'filename' => basename($paramenter['image']),
                ],
            ],
        ]);

        return redirect()->route('product');
    }

    public function edit($id)
    {
        $client = new Client();
        $url = "http://localhost:8001/api/products/{$id}";
        $response = $client->request('GET', $url);
        $productsJson = $response->getBody()->getContents();
        $productsArray = json_decode($productsJson, true)['data'];

        return view('admin.edit', compact('productsArray'));
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $client = new Client();
        $url = "http://localhost:8001/api/products/{$id}";
    
        $multipart = [
            [
                'name' => 'name',
                'contents' => $request->name,
            ],
            [
                'name' => 'price',
                'contents' => $request->price,
            ],
            [
                'name' => 'description',
                'contents' => $request->description,
            ],
            [
                'name' => '_method',
                'contents' => 'PUT',
            ],
        ];
    
        if ($request->hasFile('image')) {
            $multipart[] = [
                'name' => 'image',
                'contents' => fopen($request->file('image')->getPathname(), 'r'),
                'filename' => $request->file('image')->getClientOriginalName(),
            ];
        }
    
        $response = $client->request('POST', $url, [  
            'multipart' => $multipart,
        ]);
    
        return redirect()->route('product');
    }
    

    public function destroy($id)
    {
        $client = new Client();
        $url = "http://localhost:8001/api/products/{$id}";
        $response = $client->request('DELETE', $url);

        return redirect()->route('product');
    }

    public function destroyUser($id)
    {
        $client = new Client();
        $url = "http://localhost:8001/api/user/{$id}";
        $response = $client->request('DELETE', $url);

        return redirect()->route('users');
    }

    public function destroyComment($id)
    {
        $client = new Client();
        $url = "http://localhost:8001/api/comments/{$id}";
        $response = $client->request('DELETE', $url);

        return redirect()->route('comment.all');
    }

    public function information()
    {
        return view('admin.information');
    }
}

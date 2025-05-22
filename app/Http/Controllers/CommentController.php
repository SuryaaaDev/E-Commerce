<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $author = Auth::user();

        $paramenter = [
            'user_id' => $author->id,
            'content' => $request['content'],
        ];

        $client = new Client();
        $url = "http://localhost:8001/api/comment/add";
        $response = $client->request('POST', $url, [
            'json' => $paramenter
        ]);

        return redirect()->route('index.store');
    }
}

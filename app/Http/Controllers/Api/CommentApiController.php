<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return response()->json([
            'status' => true,
            'data' => $comments,
            'message' => 'All Comment',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'content' => 'required',
        ]);

        $comment = Comment::create([
            'user_id' => $request['user_id'],
            'content' => $request['content'],
        ]);

        return response()->json([
            'status' => true,
            'data' => $comment,
            'message' => 'Comment Created',
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json([
            'status' => true,
            'data' => $comment,
            'message' => 'Comment Deleted',
        ]);
    }
}

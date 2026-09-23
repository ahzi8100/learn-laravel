<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiPostController extends Controller
{
    public function index()
    {
        // For simplicity, return all blogs but formatted as posts
        $blogs = Blog::with('user')->latest()->get()->map(function ($blog) {
            return [
                'id' => $blog->id,
                'title' => $blog->title,
                'body' => $blog->deskripsi,
                'user_id' => $blog->user_id,
                'author' => $blog->user ? $blog->user->name : 'Unknown',
            ];
        });
        
        return response()->json($blogs);
    }

    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        
        return response()->json([
            'id' => $blog->id,
            'title' => $blog->title,
            'body' => $blog->deskripsi,
            'user_id' => $blog->user_id,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $blog = Blog::create([
            'title' => $request->title,
            'deskripsi' => $request->body,
            'status' => 'draft',
            'user_id' => $request->user()->id,
        ]);

        return response()->json([
            'id' => $blog->id,
            'title' => $blog->title,
            'body' => $blog->deskripsi,
            'user_id' => $blog->user_id,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->where('user_id', $request->user()->id)->firstOrFail();
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $blog->update([
            'title' => $request->title,
            'deskripsi' => $request->body,
        ]);

        return response()->json([
            'id' => $blog->id,
            'title' => $blog->title,
            'body' => $blog->deskripsi,
            'user_id' => $blog->user_id,
        ]);
    }

    public function destroy(Request $request, $id)
    {
        $blog = Blog::where('id', $id)->where('user_id', $request->user()->id)->firstOrFail();
        $blog->delete();
        
        return response()->json(['message' => 'Post deleted successfully']);
    }
}

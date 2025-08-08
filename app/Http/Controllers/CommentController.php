<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'message' => 'required',
        ]);

        Comment::create([
            'commenter_name' => $request->name,
            'comment_text' => $request->message,
            'blog_id' => $id,
        ]);

        return redirect()->route('blogs.detail', $id)->with('success', 'Komentar Berhasil Diposting!');
    }

    public function index() {
        $comments = Comment::with('blog')->get();
        return view('blogs.comment', compact('comments'));
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id)->delete();
        return redirect()->route('comment.index')->with('success', 'Comment Deleted Succesfully!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->title;

        // Query Builder
        // $blogs = DB::table('blogs')->where('title', 'LIKE', '%' . $title . '%')->orderBy('created_at', 'desc')->paginate(10);

        // Eloquent ORM
        $blogs = Blog::where('title', 'LIKE', '%' . $title . '%')->orderBy('created_at', 'desc')->paginate(10);
        return view('blog', ['blogss' => $blogs, 'title' => $title]);
    }

    public function create()
    {
        return view('/blogs/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs|max:20',
            'description' => 'required',
            'status' => 'required',
        ]);

        // Query Builder
        // $data = DB::table('blogs')->insert([
        //     'title' => $request->title,
        //     'deskripsi' => $request->description,
        //     'status' => $request->status,
        //     'user_id' => fake()->numberBetween(206, 305),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);


        $id_min = User::pluck('id')->min();
        $id_max = User::pluck('id')->max();

        // Eloquent ORM
        $data = Blog::create([
            'title' => $request->title,
            'deskripsi' => $request->description,
            'status' => $request->status,
            'user_id' => fake()->numberBetween($id_min, $id_max),
        ]);

        if (!$data) {
            return redirect()->route('blog.index')->with('error', 'Blog Failed to Create!');
        }

        return redirect()->route('blog.index')->with('success', 'New Blog Added Succesfully!');
    }

    public function show($id)
    {
        // Query Builder
        // $blog = DB::table('blogs')->where('id', $id)->first();

        // Eloquent ORM
        $blog = Blog::findOrFail($id);
        // if (!$blog) {
        //     abort(404);
        // }
        return view('blogs/detail', ['blog' => $blog]);
    }

    public function edit($id)
    {
        // Query Builder
        // $blog = DB::table('blogs')->where('id', $id)->first();

        // Eloquent ORM
        $blog = Blog::findOrFail($id);
        return view('blogs/edit', ['blog' => $blog]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs,title,' . $id . '|max:255',
            'description' => 'required',
            'status' => 'required'
        ]);

        // Query Builder
        // DB::table('blogs')->where('id', $id)->update([
        //     'title' => $request->title,
        //     'deskripsi' => $request->description,
        //     'status' => $request->status,
        //     'user_id' => fake()->numberBetween(206, 305),
        //     'updated_at' => now()
        // ]);

        $id_min = User::pluck('id')->min();
        $id_max = User::pluck('id')->max();

        // Eloqeunt ORM
        $blog = Blog::findOrFail($id);
        $blog->update([
            'title' => $request->title,
            'deskripsi' => $request->description,
            'status' => $request->status,
            'user_id' => fake()->numberBetween($id_min, $id_max),
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog Edited Succesfully!');
    }

    public function delete($id)
    {
        // $blog = DB::table('blogs')->where('id', $id)->delete();
        $blog = Blog::destroy($id);

        if (!$blog) {
            return redirect()->route('blog.index')->with('failed', 'Blog Failed to Delete!');
        }

        return redirect()->route('blog.index')->with('success', 'Blog Deleted Succesfully!');
    }

    public function trash()
    {
        $blogs = Blog::onlyTrashed()->get();
        return view('blogs.restore', ['blogs' => $blogs]);
    }

    public function restore($id)
    {
        $blog = Blog::onlyTrashed()->findOrFail($id)->restore();

        if (!$blog) {
            return redirect()->route('blog.index')->with('failed', 'Data blog Failed to Restore!');
        }

        return redirect()->route('blog.index')->with('success', 'Data blog RestoreSuccesfully!');
    }

    public function homepage()
    {
        $blogs = Blog::with('user')->where('status', 'Active')->orderBy('created_at', 'desc')->get();
        return view('blogs.index', compact('blogs'));
    }

    public function detail($id)
    {
        $blog = Blog::with('user')->findOrFail($id);
        return view('blogs.show', compact('blog'));
    }
}

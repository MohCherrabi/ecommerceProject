<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\SubFamilie;
use Illuminate\Http\Request;
use App\Http\Requests\BlogRequest;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $f = 'blogs';
        $nameTable = 'blogs';
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $blogs = Blog::where('title', 'like', '%' . $searchTerm . '%')->paginate(10);
        } else {
            $blogs = Blog::paginate(10);
        }

        return view('back-end.blogs.index', ['blogs' => $blogs, 'b' => $f, 'nameTable' => $nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $b = 'blogs';
        $nameTable = 'blogs';
        $users = User::all();
        $sub_families = SubFamilie::all();
        return view('back-end.blogs.create', compact('b', 'nameTable', 'users', 'sub_families'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $blog = $request->all();
        if ($request->hasFile('image')) {
            $blog['image'] = $request->file('image')->store('imageBlog', 'public');
        }
        Blog::create($blog);
        return redirect()->route('blogs.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $blogs = Blog::orderByDesc('id')->get();
        $sub_families = SubFamilie::join('blogs', 'sub_families.id', '=', 'blogs.sub_familie_id')
            ->select('sub_families.*', DB::raw('COUNT(blogs.id) as blog_count'))
            ->groupBy('sub_families.id')
            ->orderBy('blog_count', 'desc')
            ->distinct()
            ->get();
        $blog = Blog::findOrFail($id);
        return view('front-end.blog', ['blog' => $blog, 'blogs' => $blogs, 'sub_families' => $sub_families]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $f = 'blogs';
        $nameTable = 'blogs';
        $users = User::all();
        $sub_families = SubFamilie::all();
        $blog = Blog::findOrFail($id);
        return view('back-end.blogs.edit', ['blog' => $blog, 'b' => $f, 'nameTable' => $nameTable, 'users' => $users, 'sub_families' => $sub_families]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(BlogRequest $request, int $id)
    {
        $blog = $request->all();
        if ($request->hasFile('image')) {
            $blog['image'] = $request->file('image')->store('imageBlog', 'public');
        }
        $blogs = Blog::findOrFail($id);
        $blogs->update($blog);
        return redirect()->route('blogs.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $Blog = Blog::findOrFail($id);
        $Blog->delete();
        return redirect()->route('blogs.index');
    }
    public function blogsUser(){
        $blogsWithMostComments = Blog::join('comments', 'blogs.id', '=', 'comments.blog_id')
        ->select('blogs.*', DB::raw('COUNT(comments.id) as comment_count'))
        ->groupBy('blogs.id')
        ->orderBy('comment_count', 'desc')
        ->get();

        $sub_families = SubFamilie::join('blogs', 'sub_families.id', '=', 'blogs.sub_familie_id')
            ->select('sub_families.*', DB::raw('COUNT(blogs.id) as blog_count'))
            ->groupBy('sub_families.id')
            ->orderBy('blog_count', 'desc')
            ->distinct()
            ->get();

        $blogs = Blog::orderByDesc('id')->paginate(5);

        return view('front-end.blogs',compact('blogs','blogsWithMostComments','sub_families','blogs'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $c = 'comments';
        $nameTable = 'comments';
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $comments = Comment::where('title', 'like', '%' . $searchTerm . '%')->paginate(10);
        } else {
            $comments = Comment::paginate(10);
        }

        return view('back-end.comments.index',['comments' => $comments,'c'=>$c,'nameTable'=>$nameTable]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $c = 'comments';
        $nameTable = 'comments';
        $users = User::all();
        $blogs = Blog::all();
        return view('back-end.comments.create',compact('c','nameTable','users','blogs'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $comment = $request->all();

        Comment::create($comment);
        if(isset($request->comeFrom)){
        return back();
        }else{
            return redirect()->route('comments.index');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {

        $Comment = Comment::findOrFail($id);
        return view('back-end.comments.show',['Comment'=>$Comment]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $f = 'comments';
        $nameTable = 'comments';
        $users = User::all();
        $blogs = Blog::all();
        $comment = Comment::findOrFail($id);
        return view('back-end.comments.edit',['comment'=>$comment,'c'=>$f,'nameTable'=>$nameTable,'users'=>$users,'blogs'=>$blogs]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(CommentRequest $request, int $id)
    {
        $comment = $request->all();
        if($request->hasFile('image')){
        $comment['image'] = $request->file('image')->store('imageComment','public');
        }
        $comments = Comment::findOrFail($id);
        $comments->update($comment);
        return redirect()->route('comments.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $Comment = Comment::findOrFail($id);
        $Comment->delete();
        return redirect()->route('comments.index');
    }
}

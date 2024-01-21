<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'blog_id' => 'required|exists:blogs,id',
            'parent_id' => 'nullable|exists:comments,id',
        ]);

        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->blog_id = $validatedData['blog_id'];
        if (isset($validatedData['parent_id'])) {
            // Set parent_id only if it's a reply
            $parentComment = Comment::findOrFail($validatedData['parent_id']);
            $comment->parent_id = $parentComment->id;
        }
        $comment->content = $validatedData['content'];
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function reply(Request $request, Comment $parentComment)
    {
        $validatedData = $request->validate([
            'content' => 'required',
            'blog_id' => 'required|exists:blogs,id',
        ]);

        $reply = new Comment();
        $reply->user_id = Auth::id();
        $reply->blog_id = $validatedData['blog_id'];
        $reply->parent_id = $parentComment->id; // Associate the reply with the parent comment
        $reply->content = $validatedData['content'];
        $reply->save();

        return redirect()->back()->with('success', 'Reply added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // Implement logic to check if the current user can delete the comment
        $comment = Comment::find($request->id);

        // Delete the associated replies
        if ($comment->replies()->count() > 0){
            foreach ($comment->replies as $reply){
                $reply->delete();
            }
        }

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}

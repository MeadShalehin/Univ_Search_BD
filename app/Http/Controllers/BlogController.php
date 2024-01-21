<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::with('image', 'user')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('adminpanel.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view('adminpanel.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->category_id = $request->input('category_id');
        $blog->content = $request->input('content');
        $blog->user_id = auth()->user()->id;
        $blog->tag = $request->input('tag');
        $blog->save();

        // $tags = explode(',', $request->input('tags'));
        // $tags = array_map('trim', $tags);

        // $blog->tags()->attach($tags);

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $key => $file) {
                $name = $key . '-' . time() . '.' . $file->extension();
                $file->move(public_path('AdminPanelAsset/img/blog/'), $name);
                $location = 'AdminPanelAsset/img/blog/' . $name;
                $extension = explode('.', $name);

                $image = new Image();
                $image->url = $location;
                $image->type = $extension[1];
                $image->parentable_id = $blog->id;
                $image->parentable_type = Blog::class;
                $image->save();
            }
        }

        // return back()->with('success', 'You have successfully added blog!');
        return redirect()->route('blog.create')
            ->with('success', 'You have successfully added blog!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
        $tags = explode(',', $blog->tag);
        $blog->increment('views'); // Increment views count
        return view('adminpanel.blog.show', compact('blog', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        return view('adminpanel.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $blog->title = $request->input('title');
        $blog->category_id = $request->input('category_id');
        $blog->content = $request->input('content');
        $blog->tag = $request->input('tag'); // Update tags as a comma-separated string
        $blog->save();


        if ($request->hasfile('file')) {

            foreach ($blog->images as $image) {
                if (File::exists($image->url)) {
                    unlink($image->url);
                }
                $image->delete();
            }
            foreach ($request->file('file') as $key => $file) {
                $name = $key . '-' . time() . '.' . $file->extension();
                $file->move(public_path('AdminPanelAsset/img/blog/'), $name);
                $location = 'AdminPanelAsset/img/blog/' . $name;
                $extension = explode('.', $name);

                $image = new Image();
                $image->url = $location;
                $image->type = $extension[1];
                $image->parentable_id = $blog->id;
                $image->parentable_type = Blog::class;
                $image->save();
            }
        }

        return redirect()->route('blog.index')
            ->with('success', 'You have successfully updated blog!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {

        $blog->load('images');
        foreach ($blog->images as $image) {
            if (File::exists($image->url)) {
                unlink($image->url);
            }
            $image->delete();
        }

        $blog->delete();

        return redirect()->route('blog.index')
            ->with('success', 'Blog deleted successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the university by ID
        $blog = Blog::find($id);

        if ($blog) {
            // Toggle the status (assuming 1 for Active and 0 for Inactive)
            $blog->status = $blog->status == 1 ? 0 : 1;
            $blog->save();
        }

        // Redirect back to the index page
        return redirect()->route('blog.index');
    }

    
}

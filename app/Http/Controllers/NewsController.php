<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Image;
use App\Models\Subscription;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Mail\TestMail;
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = News::with( 'image', 'user')->where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('adminpanel.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view( 'adminpanel.news.create' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'categories' => 'required',
        ]);

        $news = new News();
        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->categories = $request->input('categories');
        $news->user_id = auth()->user()->id;
        $news->save();

        if ($request->hasfile('file')) {
            foreach ($request->file('file') as $key => $file) {
                $name = $key . '-' . time() . '.' . $file->extension();
                $file->move(public_path('AdminPanelAsset/img/news/'), $name);
                $location = 'AdminPanelAsset/img/news/' . $name;
                $extension = explode('.' ,$name);

                $image = new Image();
                $image->url = $location;
                $image->type = $extension[1];
                $image->parentable_id = $news->id;
                $image->parentable_type = News::class;
                $image->save();
            }
        }


                
        // $mail = 'your_email_id@gmail.com';
        // Mail::to($mail)->send(new TestMail);

        $subscriber_emails = Subscription::get()->pluck('email')->toArray();
  
        \Mail::to($subscriber_emails)->send(new TestMail);
        // \Mail::to($subscriber_emails)->send(new \App\Mail\ContactMail($details));




        return redirect()->route('news.create')
            ->with('success', 'You have successfully added news!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
        return view( 'adminpanel.news.edit', compact( 'news' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'categories' => 'required',
        ]);

        $news->title = $request->input('title');
        $news->content = $request->input('content');
        $news->categories = $request->input('categories');
        $news->save();

        if ($request->hasfile('file')) {

            foreach ($news->images as $image) {
                if (File::exists($image->url)) {
                    unlink($image->url);
                }
                $image->delete();
            }
            foreach ($request->file('file') as $key => $file) {
                $name = $key . '-' . time() . '.' . $file->extension();
                $file->move(public_path('AdminPanelAsset/img/news/'), $name);
                $location = 'AdminPanelAsset/img/news/' . $name;
                $extension = explode('.' ,$name);

                $image = new Image();
                $image->url = $location;
                $image->type = $extension[1];
                $image->parentable_id = $news->id;
                $image->parentable_type = News::class;
                $image->save();
            }
        }

        return redirect()->route('news.index')
            ->with('success', 'You have successfully updated news!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
        $news = News::with('images')->find($news->id);
        foreach ($news->images as $image) {
            if (File::exists($image->url)) {
                unlink($image->url);
            }
            $image->delete();
        }

        $news->delete();

        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the university by ID
        $news = News::find($id);

        if ($news) {
            // Toggle the status (assuming 1 for Active and 0 for Inactive)
            $news->status = $news->status == 1 ? 0 : 1;
            $news->save();
        }

        // Redirect back to the index page
        return redirect()->route('news.index');

    }
}

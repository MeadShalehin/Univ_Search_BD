<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutUs = AboutUs::first();
        return view('adminpanel.aboutUs.index', compact('aboutUs'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit($aboutUs)
    {
        // dd($aboutUs);
        $aboutUs=AboutUs::find($aboutUs);
        return view('adminpanel.aboutUs.edit', compact('aboutUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$aboutUs)
    {
        $aboutUs=AboutUs::find($aboutUs);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $aboutUs->title = $request->input('title');
        $aboutUs->content = $request->input('content');
        $aboutUs->phone = $request->input('phone');
        $aboutUs->email = $request->input('email');
        if ($request->hasFile('image')) {
            $existingImagePath = $aboutUs->image;

            if (File::exists($existingImagePath)) {
                // Extract the directory path from the existing logo path
                $directoryPath = dirname(public_path($existingImagePath));

                // Check if the directory exists before attempting to unlink
                if (is_dir($directoryPath)) {
                    unlink(public_path($existingImagePath));
                }
            }

            $file = $request->file('image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('AdminPanelAsset/img/aboutUs'), $name);
            $location = 'AdminPanelAsset/img/aboutUs/' . $name;

            $aboutUs->image = $location;
        }
        $aboutUs->save();
        return redirect()->route('aboutUs.index')
            ->with('success', 'You have successfully updated About Us!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutUs $aboutUs)
    {
        //
    }
}

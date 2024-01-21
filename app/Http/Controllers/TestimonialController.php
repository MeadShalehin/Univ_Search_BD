<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\University;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'DESC')->get();
        return view('adminpanel.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $universities = University::all();
        return view('adminpanel.testimonial.create', compact('universities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'content' => 'required',
            'university_id' => 'required',
        ]);
        $testimonial = new Testimonial();
        $testimonial->university_id = $request->input('university_id');
        $testimonial->faculty_name = $request->input('faculty_name');
        $testimonial->faculty_designation = $request->input('faculty_designation');
        $testimonial->content = $request->input('content');
        $testimonial->user_id = Auth::id();
        if ($request->hasFile('faculty_image')) {
            $file = $request->file('faculty_image');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('AdminPanelAsset/img/university/faculty_image/'), $name);
            $location = 'AdminPanelAsset/img/university/faculty_image/' . $name;

            $testimonial->faculty_image = $location;
        }

        $testimonial->save();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        $universities = University::all();
        return view('adminpanel.testimonial.edit', compact('testimonial', 'universities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request ->validate([
            'content' => 'required',
            'university_id' => 'required',
        ]);

        $testimonial->university_id = $request->input('university_id');
        $testimonial->faculty_name = $request->input('faculty_name');
        $testimonial->faculty_designation = $request->input('faculty_designation');
        $testimonial->content = $request->input('content');
        $testimonial->status = $request->input('status');
        if ($request->hasFile('faculty_image')) {
            $existingPath = $testimonial->faculty_image;

            if (File::exists($existingPath)) {
                // Extract the directory path from the existing logo path
                $directoryPath = dirname(public_path($existingPath));

                // Check if the directory exists before attempting to unlink
                if (is_dir($directoryPath)) {
                    unlink(public_path($existingPath));
                }
            }

            $file = $request->file('faculty_image');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('AdminPanelAsset/img/university/faculty_image/'), $name);
            $location = 'AdminPanelAsset/img/university/faculty_image/' . $name;

            $testimonial->faculty_image = $location;
        }

        $testimonial->save();

        return redirect()->route('testimonial.index')->with('success', 'Testimonial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        if (isset($testimonial->faculty_image)) {
            $existingPath = $testimonial->faculty_image;

            if (File::exists($existingPath)) {
                // Extract the directory path from the existing logo path
                $directoryPath = dirname(public_path($existingPath));

                // Check if the directory exists before attempting to unlink
                if (is_dir($directoryPath)) {
                    unlink(public_path($existingPath));
                }
            }
        }

        $testimonial->delete();
        return back()->with('success', 'Testimonial deleted successfully.');
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the university by ID
        $testimonial = Testimonial::find($id);

        if ($testimonial) {
            // Toggle the status (assuming 1 for Active and 0 for Inactive)
            $testimonial->status = $testimonial->status == 1 ? 0 : 1;
            $testimonial->save();
        }

        // Redirect back to the index page
        return redirect()->route('testimonial.index');

    }

}

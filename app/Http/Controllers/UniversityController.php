<?php

namespace App\Http\Controllers;

use App\Models\University;
use App\Models\Image;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::with('images')->orderBy('created_at', 'desc')->get();

        return view('adminpanel.university.index', compact('universities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get();
        return view('adminpanel.university.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request->all();

        $request->validate([
            'name'         => 'required',
            'email'        => 'required',
            'contact'      => 'required',
            'address'      => 'required',
            'gps'          => 'required',
            'latitude'     => 'required',
            'longitude'    => 'required',
        ]);

        $university = new University();
        $university->name = $request->name;
        $university->email = $request->email;
        $university->contact = $request->contact;
        $university->address = $request->address;
        $university->short_description = $request->short_description ?? NULL;
        $university->description = $request->description ?? NULL;
        $university->gps = $request->gps ?? NULL;
        $university->ranking = $request->ranking ?? NULL;
        $university->scholarship = $request->scholarship ?? NULL;
        $university->waiver = $request->waiver ?? NULL;
        $university->department_id = json_encode($request->department_id) ?? NULL;
        $university->logo = $request->logo ?? NULL;
        $university->banner = $request->banner ?? NULL;
        $university->website = $request->website ?? NULL;
        $university->facebook = $request->facebook ?? NULL;
        $university->linkedin = $request->linkedin ?? NULL;
        $university->students = $request->students ?? NULL;
        $university->award = $request->award ?? NULL;
        $university->graduate = $request->graduate ?? NULL;
        $university->faculties = $request->faculties ?? NULL;
        $university->latitude = $request->latitude ?? NULL;
        $university->longitude = $request->longitude ?? NULL;
        $university->user_id = auth()->user()->id;
        $university->ssc = number_format($request->input('ssc'), 2) ?? NULL;// Format to 2 decimal places
        $university->hsc = number_format($request->input('hsc'), 2) ?? NULL;// Format to 2 decimal places

        $university->status = 1;

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('AdminPanelAsset/img/university/logo/'), $name);
            $location = 'AdminPanelAsset/img/university/logo/' . $name;

            $university->logo = $location;
        }

        if ($request->hasFile('banner')) {
            $file = $request->file('banner');
            $name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('AdminPanelAsset/img/university/banner/'), $name);
            $location = 'AdminPanelAsset/img/university/banner/' . $name;

            $university->banner = $location;
        }

        $university->save();

        if ($request->hasfile('images')) {
            foreach ($request->file('images') as $key => $file) {
                $name = $key . '-' . time() . '.' . $file->extension();
                $file->move(public_path('AdminPanelAsset/img/university/uni_images/'), $name);
                $location = 'AdminPanelAsset/img/university/uni_images/' . $name;
                $extension = explode('.', $name);

                $image = new Image();
                $image->url = $location;
                $image->type = $extension[1];
                $image->parentable_id = $university->id;
                $image->parentable_type = University::class;
                $image->save();
            }
        }




        return back()->with('success', 'University Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     *
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        // return
        $university->load('images');
        $selected_departments = json_decode($university->department_id);
        $departments = Department::where('status', 1)->get();
        return view('adminpanel.university.edit', compact('university', 'selected_departments', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, University $university)
    {

        $request->validate([
            'name'         => 'required',
            'email'        => 'required',
            'contact'      => 'required',
            'address'     => 'required',
            'gps'          => 'required',
            'latitude'     => 'required',
            'longitude'    => 'required',
        ]);

        $university->name = $request->name;
        $university->email = $request->email;
        $university->contact = $request->contact;
        $university->address = $request->address;
        $university->short_description = $request->short_description ?? NULL;
        $university->description = $request->description ?? NULL;
        $university->gps = $request->gps ?? NULL;
        $university->ranking = $request->ranking ?? NULL;
        $university->scholarship = $request->scholarship ?? NULL;
        $university->waiver = $request->waiver ?? NULL;
        $university->department_id = json_encode($request->department_id) ?? NULL;
        $university->website = $request->website ?? NULL;
        $university->facebook = $request->facebook ?? NULL;
        $university->linkedin = $request->linkedin ?? NULL;
        $university->students = $request->students ?? NULL;
        $university->award = $request->award ?? NULL;
        $university->graduate = $request->graduate ?? NULL;
        $university->faculties = $request->faculties ?? NULL;
        $university->latitude = $request->latitude ?? NULL;
        $university->longitude = $request->longitude ?? NULL;
        $university->ssc = number_format($request->input('ssc'), 2) ?? NULL;// Format to 2 decimal places
        $university->hsc = number_format($request->input('hsc'), 2) ?? NULL;// Format to 2 decimal places

        $university->status = $request->status ?? 1;

        if ($request->hasFile('logo')) {
            $existingLogoPath = $university->logo;

            if (File::exists($existingLogoPath)) {
                // Extract the directory path from the existing logo path
                $directoryPath = dirname(public_path($existingLogoPath));

                // Check if the directory exists before attempting to unlink
                if (is_dir($directoryPath)) {
                    unlink(public_path($existingLogoPath));
                }
            }

            $file = $request->file('logo');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('AdminPanelAsset/img/university/logo/'), $name);
            $location = 'AdminPanelAsset/img/university/logo/' . $name;

            $university->logo = $location;
        }

        if ($request->hasFile('banner')) {
            $existingBannerPath = $university->banner;

            if (File::exists($existingBannerPath)) {
                // Extract the directory path from the existing logo path
                $directoryPath = dirname(public_path($existingBannerPath));

                // Check if the directory exists before attempting to unlink
                if (is_dir($directoryPath)) {
                    unlink(public_path($existingBannerPath));
                }
            }

            $file = $request->file('banner');
            $name = uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('AdminPanelAsset/img/university/banner/'), $name);
            $location = 'AdminPanelAsset/img/university/banner/' . $name;

            $university->banner = $location;
        }


        $university->save();



        if ($request->hasfile('images')) {

            $university->load('images');

            foreach ($university->images as $image) {

                if (File::exists($image->url)) {
                    // Extract the directory path from the existing logo path
                    $directoryPath = dirname(public_path($image->url));

                    // Check if the directory exists before attempting to unlink
                    if (is_dir($directoryPath)) {
                        unlink(public_path($image->url));
                    }
                }

                $image->delete();
            }

            foreach ($request->file('images') as $key => $file) {
                $name = $key . '-' . time() . '.' . $file->extension();
                $file->move(public_path('AdminPanelAsset/img/university/uni_images/'), $name);
                $location = 'AdminPanelAsset/img/university/uni_images/' . $name;
                $extension = explode('.', $name);

                $image = new Image();
                $image->url = $location;
                $image->type = $extension[1];
                $image->parentable_id = $university->id;
                $image->parentable_type = University::class;
                $image->save();
            }
        }



        return back()->with('success', 'University Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        $university->load('images');

        if (isset($university->images)) {
            foreach ($university->images as $image) {

                if (File::exists($image->url)) {
                    // Extract the directory path from the existing logo path
                    $directoryPath = dirname(public_path($image->url));

                    // Check if the directory exists before attempting to unlink
                    if (is_dir($directoryPath)) {
                        unlink(public_path($image->url));
                    }
                }

                $image->delete();
            }
        }
        if (isset($university->logo)) {
            $existingLogoPath = $university->logo;

            if (File::exists($existingLogoPath)) {
                // Extract the directory path from the existing logo path
                $directoryPath = dirname(public_path($existingLogoPath));

                // Check if the directory exists before attempting to unlink
                if (is_dir($directoryPath)) {
                    unlink(public_path($existingLogoPath));
                }
            }
        }
        if (isset($university->banner)) {
            $existingBannerPath = $university->banner;

            if (File::exists($existingBannerPath)) {
                // Extract the directory path from the existing logo path
                $directoryPath = dirname(public_path($existingBannerPath));

                // Check if the directory exists before attempting to unlink
                if (is_dir($directoryPath)) {
                    unlink(public_path($existingBannerPath));
                }
            }
        }

        $university->delete();

        return back()->with('success', 'University Deleted Successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the university by ID
        $university = University::find($id);

        if ($university) {
            // Toggle the status (assuming 1 for Active and 0 for Inactive)
            $university->status = $university->status == 1 ? 0 : 1;
            $university->save();
        }

        // Redirect back to the index page
        return redirect()->route('university.index');

    }
}

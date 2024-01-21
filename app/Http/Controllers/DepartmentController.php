<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('adminpanel.department.index', compact('departments'));
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
        $request->validate([
            'name' => 'required',
        ]);
        $department = new Department();
        $department->name = $request->input('name');
        $department->subject = json_encode($request->input('subject'));
        $department->save();

        return redirect()->route('department.index')->with('success', 'Department Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        $selected_subject = json_decode($department->subject);
        return view('adminpanel.department.edit', compact('department', 'selected_subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $department->name = $request->input('name');
        $department->subject = json_encode($request->input('subject'));
        $department->status = $request->input('status');
        $department->save();

        return redirect()->route('department.index')->with('success', 'Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('department.index')->with('success', 'Department Deleted Successfully');
    }

    public function updateStatus(Request $request, $id)
    {
        // Find the department by ID
        $department = Department::find($id);

        if ($department) {
            // Toggle the status (assuming 1 for Active and 0 for Inactive)
            $department->status = $department->status == 1 ? 0 : 1;
            $department->save();
        }

        // Redirect back to the index page
        return redirect()->route('department.index');

    }
}

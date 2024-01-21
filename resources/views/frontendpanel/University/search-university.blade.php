@extends('layouts.frontendpanel.master')

@section('links')
@endsection

@section('content')
    <div class="breadcrumb-area">
        <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-4 pt-100 pb-95"
            style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/breadcrumb-bg-4.jpg);">
            <div class="container">
                <h2>Search Your University</h2>
            </div>
        </div>
        <div class="breadcrumb-bottom">
            <div class="container">
                <ul>
                    <li><a href="{{ route('frontend_dashboard') }}">Home</a> <span><i class="fa fa-angle-double-right"></i><a
                                href="{{ route('frontend_university') }}">Universities</a></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="course-area bg-img pt-130 pb-130"
        style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/bg-1.jpg);">
        <div class="container">
            <form action="{{ route('university_search_result') }}">
                <div class="row">
                    <div class="col-md-3">
                        <label for="ssc">SSC Result <span style="color: red;">*</span></label>
                        <input name="ssc" type="number" class="form-control" placeholder="Enter your SSC result" step="0.01" min="0.00" max="5.00" required>
                    </div>
                    <div class="col-md-3">
                        <label for="hsc">HSC Result <span style="color: red;">*</span></label>
                        <input name="hsc" type="number" id="hsc" class="form-control" placeholder="Enter your HSC result" step="0.01" min="0.00" max="5.00" required>
                    </div>
                    <div class="col-md-3">
                        <label for="subject">Favourite Subjects</label>
                        <select id="subject" name="subject[]" class="form-control subject" multiple>
                            <!-- Options for subjects here -->
                            <option value="bangla">Bangla</option>
                            <option value="english">English</option>
                            <option value="gmath">General Math</option>
                            <option value="hmath">Higher Math</option>
                            <option value="physics">Physics</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="biology">Biology</option>
                            <option value="ict">ICT</option>
                            <option value="accounting">Accounting</option>
                            <option value="finance">Finance</option>
                            <option value="marketing">Marketing</option>
                            <option value="management">Management</option>
                            <option value="economics">Economics</option>
                            <option value="statistics">Statistics</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="department">Departments</label>
                        <select name="department[]" id="department" class="form-control department" multiple>
                            <!-- Options for departments here -->
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection


@section('footer_js')
@endsection

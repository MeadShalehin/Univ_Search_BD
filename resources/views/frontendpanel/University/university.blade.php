@extends('layouts.frontendpanel.master')

@section('content')
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url({{ asset('FrontendPanelAsset') }}/img/bg/breadcrumb-bg-3.jpg);">
        <div class="container">
            <h2>Universities</h2>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="{{ route('frontend_dashboard') }}">Home</a> <span><i class="fa fa-angle-double-right"></i><a href="{{ route('frontend_university') }}">Universities</a></span></li>
            </ul>
        </div>
    </div>
</div>
<div class="event-area pt-60 pb-130">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-8 col-md-12 order-2 order-md-1">
                {{--  <a href="{{ route('nearest_university_search') }}">
                    <button class="btn btn-success">Search University in My Area</button>
                </a>  --}}
            </div>
            <div class="col-lg-4 col-md-12 order-1 order-md-2">
                <div class="sidebar-search mb-40">
                    <form action="{{ route('search_universities') }}" method="GET">
                        <input type="text" name="query" placeholder="Search by name/location">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            @php
            $universitiesPerPage = 6;
            $currentPage = request()->get('page', 1);
            $startIndex = ($currentPage - 1) * $universitiesPerPage;
            $universitiesArray = $universities->toArray(); // Convert the collection to an array
            $paginatedUniversities = array_slice($universitiesArray, $startIndex, $universitiesPerPage);
            @endphp

            @foreach ($paginatedUniversities as $universityData)
            <div class="col-lg-4 col-md-6">
                <div class="single-event mb-55 event-gray-bg">
                    <div class="event-img">

                        <a href="{{ route('frontend_university_details', ['id' => $universityData['id']]) }}"><img src="{{ $universityData['logo'] }}" style="height: 227px;" alt=""></a>
                    </div>
                    <div class="event-content">
                        <h3><a href="{{ route('frontend_university_details', ['id' => $universityData['id']]) }}">{{ $universityData['name'] }}</a></h3>
                        <p><a href="{{ route('frontend_university_details', ['id' => $universityData['id']]) }}">{!! substr($universityData['description'], 0, 100) !!}..</a></p>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i class="fa fa-location-arrow"></i>
                                <span>{{ $universityData['address'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pro-pagination-style text-center mt-25">
            <ul>
                @if ($currentPage > 1)
                    <li><a class="prev" href="?page={{ $currentPage - 1 }}"><i class="fa fa-angle-double-left"></i></a></li>
                @endif
                @for ($i = 1; $i <= ceil(count($universities) / $universitiesPerPage); $i++)
                    <li><a class="{{ $i == $currentPage ? 'active' : '' }}" href="?page={{ $i }}">{{ $i }}</a></li>
                @endfor
                @if ($currentPage < ceil(count($universities) / $universitiesPerPage))
                    <li><a class="next" href="?page={{ $currentPage + 1 }}"><i class="fa fa-angle-double-right"></i></a></li>
                @endif
            </ul>
        </div>


    </div>
</div>

@endsection

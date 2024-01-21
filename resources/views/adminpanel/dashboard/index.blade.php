@extends('layouts.adminpanel.master')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Welcome {{ Auth::user()->name }}! 🎉</h5>
                                <p class="mb-4">
                                <?php 
                                    $a=array('When you have a dream, you have got to grab it and never let go', 'Never give up','Life is what happens when you are busy making other plans', 'Many of life’s failures are people who did not realize how close they were to success when they gave up', 'The purpose of our lives is to be happy', 'Money and success don’t change people; they merely amplify what is already there.','Never let the fear of striking out keep you from playing the game','The big lesson in life, baby, is never be scared of anyone or anything','The whole secret of a successful life is to find out what is one’s destiny to do, and then do it.','The unexamined life is not worth living','Turn your wounds into wisdom.','Don’t settle for what life gives you; make life better and build something','Live for each second without hesitation');
                                    $random_keys=rand(0,sizeof($a)-1);
                                    echo $a[$random_keys];                                
                                ?> 
                                </p>

                                <a href="{{ route('admin_dashboard') }}" class="btn btn-sm btn-outline-primary">View
                                    Profile</a>
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                <img src="{{ asset('AdminPanelAsset/img/illustrations/man-with-laptop-light.png') }}"
                                    height="140" alt="View Badge User"
                                    data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
@endsection
@extends('layouts.app')
@section('content')

    <style>
        body {
            background-image: url({{url('images/b8.png')}});
            background-size: cover;
            background-repeat: no-repeat;
            min-height: 700px;
            position: center;


        }
    </style>

    <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{url('/admin')}}">Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/addTrain')}}">Add Trains <span
                                class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/addStation')}}">Add Station</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/addTrip')}}">Add Trip</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/showTrains')}}">Show Trains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/showStations')}}">Show Stations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/showTrips')}}">Show Trips</a>
                    </li>


                </ul>
            </div>

        </nav>
        @yield('jk')
    </div>



@endsection

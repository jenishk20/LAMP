@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>

        @if(count($record)==0)
            <div class="card">
                <div class="card-body">
                    <div style="font-size: 18px">You have no bookings as of now , click below button to book tickets <now></now></div><hr>
                    <button class="btn btn-light">
                        <a href="http://127.0.0.1:8000/home">Book Ticket Now</a>
                    </button>
                </div>

            </div>

        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                @for($i=0;$i<count($record);$i++)
                    <div class="card mt-5">
                        <div class="card-header">
                            <h2><b>{{('Booking No ')}}{{$i+1}}</b></h2>
                        </div>


                        <div class="card-body">

                            <div class="card-body">
                                <table class="table table-striped table-light">
                                    <thead>
                                    <tr>

                                        <th scope="col">Train Name</th>
                                        <th scope="col">Source</th>
                                        <th scope="col">Destination</th>
                                        <th scope="col">Date of Journey</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    <div class="card-header">
                                        <h5><b> Ticket Details</b></h5>
                                    </div>
                                    <tr>
                                        <td>{{$trips[$i][0]->train->train_name}}</td>
                                        <td>{{$trips[$i][0]->fetchSource->station_name}}</td>
                                        <td>{{$trips[$i][count($trips[0])-1]->fetchDestination->station_name}}</td>
                                        <td>{{$date[$i]}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="card-header">
                                    <h5><b>Passenger Details</b></h5>
                                </div>
                                <table class="table table-striped table-light">
                                    <thead>
                                    <tr>

                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Ticket Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @for($j=0;$j<count($record[$i]);$j++)
                                        <tr>

                                            <th scope="row">{{$j+1}}</th>
                                            <td>{{$record[$i][$j]->name}}</td>
                                            <td>{{$record[$i][$j]->age}}</td>
                                            <td>{{$record[$i][$j]->gender}}</td>
                                            <td>{{('CNF')}}</td>
                                        </tr>
                                    @endfor


                                    </tbody>
                                </table>


                                @if($date[$i]>date('Y-m-d'))
                                    {{--                                    {{dd($record[$i])}}--}}
                                    <form action="/home/myBookings/{{$record[$i][0]->reservation_id}}" method="get">
                                        @csrf
                                        <button class="btn btn-danger">Cancel Ticket</button>
                                    </form>
                                @endif
                            </div>
                        </div>


                    </div>

                @endfor
            </div>
        </div>

    </div>

@endsection

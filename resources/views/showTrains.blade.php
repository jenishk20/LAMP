@extends('layouts.app')

@section('content')
    <div class="container">


        @csrf

        @if(count($result)==0)
            <div class="card">
                <div class="card-header">
                    {{('No Available Trains')}}
                </div>
            </div>
        @endif





        @for($i=0;$i<count($result);$i++)
            <div class="card w-50 mx-auto mt-2">
                <div class="card-header d-flex justify-content-between align-items-center">


                    <h5><b>{{$result[$i][0]->train->train_name}}</b></h5>


                    <button class="btn btn-primary">Train Route</button>

                </div>
                <?php

                $date = strtotime(session()->get('doj'));
                $dayname = date('D', $date);
                $month = date('M', $date);
                $day = date('d', $date);

                ?>
                <div class="card-body ">
                    <div class="row">

                        <div class="d-inline-block ">
                            <div
                                style="font-size: 17px;font-family: Arial"> {{session()->get('frms')[0]->station_name}}
                                |
                            </div>
                        </div>

                        <div class="m-auto d-inline-block">
                            <div style="font-size: 17px;font-family: Arial">  {{$dayname}}
                                ,{{$day}}{{" "}}{{$month}}</div>
                        </div>
                        <div class="d-inline-block">
                            <div
                                style="font-size: 17px;font-family: Arial">
                                |{{" "}}{{session()->get('trms')[0]->station_name}}</div>

                        </div>
                    </div>
                    <div class="container mt-5">
                        <table class="table table-striped table-bordered" style="font-size: 15px">
                            <thead>
                            <tr>
                                <th>Status</th>
                                <th>Available Seats</th>
                            </tr>
                            <tr>
                                @if($avail<0)
                                    <td style="color: darkred">Not Available</td>
                                    <td style="color: darkred">0</td>

                                @else
                                    <td style="color: darkgreen">Available</td>
                                    <td style="color: darkgreen">{{$avail}}</td>
                                @endif
                            </tr>
                            </thead>
                        </table>
                    </div>
                    {{--                            @foreach($result[$i] as $trip)--}}
                    {{--                                --}}{{--                                {{dump($trip)}}--}}
                    {{--                                {{$trip->fetchSource->station_name}} ->--}}

                    {{--                            @endforeach--}}
                    {{--                            --}}{{--                            {{$trips[0]->fetchSource->station_name}}--}}
                    {{--                            {{$trip->fetchDestination->station_name}}--}}
                </div>

                <a href="/home/search/book/{{$i}}" class="btn btn-primary">Book Ticket Now</a>
            </div>



        @endfor


    </div>
@endsection

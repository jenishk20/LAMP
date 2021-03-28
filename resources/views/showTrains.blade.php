@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            @csrf
            {{--                <div class="card-header">{{('Available Trains')}}</div>--}}
            @if(count($result)==0)
                {{('No Available Trains')}}
            @endif


            <div class="col-8">
                @foreach($result as $trips)
                    <div class="card w-50 mx-auto mt-2">
                        <div class="card-header">
                            {{$trips[0]->train->train_name}}
                        </div>
                        <div class="card-body text-center">


                            @foreach($trips as $trip)
{{--                                {{dump($trip)}}--}}
                                {{$trip->fetchSource->station_name}} ->

                            @endforeach
{{--                            {{$trips[0]->fetchSource->station_name}}--}}
                            {{$trip->fetchDestination->station_name}}
                        </div>

                        <a href="/home/search/book" class="btn btn-primary">Book Ticket Now</a>
                    </div>
            </div>


            @endforeach

        </div>
    </div>
    </div>
    </div>
@endsection

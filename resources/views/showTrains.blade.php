@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            @csrf

            @if(count($result)==0)
                {{('No Available Trains')}}
            @endif


            <div class="col-8">
                @for($i=0;$i<count($result);$i++)
                    <div class="card w-50 mx-auto mt-2">
                        <div class="card-header">
                            {{$result[$i][0]->train->train_name}}
                        </div>
                        <div class="card-body text-center">


                            @foreach($result[$i] as $trip)
{{--                                {{dump($trip)}}--}}
                                {{$trip->fetchSource->station_name}} ->

                            @endforeach
{{--                            {{$trips[0]->fetchSource->station_name}}--}}
                            {{$trip->fetchDestination->station_name}}
                        </div>

                        <a href="/home/search/book/{{$i}}" class="btn btn-primary">Book Ticket Now</a>
                    </div>
            </div>


            @endfor

        </div>
    </div>
    </div>
    </div>
@endsection

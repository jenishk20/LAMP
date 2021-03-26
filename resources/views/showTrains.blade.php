@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

                <div class="card">
                    @csrf
                    <div class="card-header">{{('Available Trains')}}</div>
{{--                    @if($result->isEmpty())--}}
{{--                        {{('No Available Trains')}}--}}
{{--                    @endif--}}
                    @foreach($result as $trips)
                        <div class="card-body">
                        @foreach($trips as $trip)
                            {{$trip}}
                        @endforeach
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
@endsection

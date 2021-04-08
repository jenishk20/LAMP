@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{('BOOK TICKET NOW')}}</div>
                    <div class="card-body">
                        <form method="get" action="/home/search">
                            @csrf
                            <div class="form-group row">
                                <label for="from" class="col-4 col-form-label">From</label>
                                <div class="col-8">

                                    <select id="from" name="from" required class="custom-select">
                                        @foreach($stations as $station)
                                            <option value="{{$station->id}}">{{$station->station_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="to" class="col-4 col-form-label">To</label>
                                <div class="col-8">
                                    <select id="to" name="to" class="custom-select" required="required">
                                        @foreach($stations as $station)
                                            <option value="{{$station->id}}">{{$station->station_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="doj" class="col-4 col-form-label">Date of Journey</label>
                                <div class="col-8">
                                    <input type="date" id="doj" name="date"  min="2021-3-23" max="2021-6-31">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-4 col-8">
                                    <button name="submit" type="submit" class="btn btn-primary">Search Trains</button>
                                </div>
                            </div>
                        </form>

                    </div>
            </div>
        </div>
    </div>

@endsection

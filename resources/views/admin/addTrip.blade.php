@extends('layouts.header')
@section('jk')

    <div class="container mt-5">

        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>
        <div class="card">
            <div class="card-header">
                <h4><b>Add Trip Data</b></h4>
            </div>
            <div class="card-body">
                <form method="post" action="/admin/addTrip/confirm">
                    @csrf
                    <div class="form-group row">
                        <label for="tname" class="col-4 col-form-label">Train Name</label>
                        <div class="col-8">
                            <select id="tname" name="tname" class="custom-select" required="required">
                                @for($i=0;$i<count($trains);$i++)
                                <option value="{{$trains[$i]->id}}">{{$trains[$i]->train_name}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="sstat" class="col-4 col-form-label">Source Station</label>
                        <div class="col-8">
                            <select id="sstat" name="sstat" class="custom-select" required="required">
                                @for($i=0;$i<count($stations);$i++)
                                    <option value="{{$stations[$i]->id}}">{{$stations[$i]->station_name}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dstat" class="col-4 col-form-label">Destination Station</label>
                        <div class="col-8">
                            <select id="dstat" name="dstat" class="custom-select" required="required">
                                @for($i=0;$i<count($stations);$i++)
                                    <option value="{{$stations[$i]->id}}">{{$stations[$i]->station_name}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tcost" class="col-4 col-form-label">Trip Cost</label>
                        <div class="col-8">
                            <input id="tcost" name="tcost" placeholder="Enter Trip cost" type="text" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stime" class="col-4 col-form-label">Source Departure Time</label>
                        <div class="col-8">
                            <input id="stime" name="stime" type="datetime-local" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dtime" class="col-4 col-form-label">Destination Arrival Time</label>
                        <div class="col-8">
                            <input id="dtime" name="dtime" type="datetime-local" class="form-control" required="required">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </div>
@stop

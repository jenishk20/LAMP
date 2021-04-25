@extends('layouts.header')
@section('jk')

    <div class="container mt-5">

        <div class="card">
            @include('flash-message')
            @yield('content')
        </div>
        <div class="card">
            <div class="card-header">
                <h4><b>Add Train Data</b></h4>
            </div>
            <div class="card-body">

                <form method="post" action="/admin/addTrain/confirm">
                    @csrf
                    <div class="form-group row">
                        <label for="tname" class="col-4 col-form-label">Train Name</label>
                        <div class="col-8">
                            <input id="tname" name="tname" placeholder="Enter Name of Train" type="text"
                                   required="required" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="seats" class="col-4 col-form-label">Total Seats</label>
                        <div class="col-8">
                            <input id="seats" name="seats" placeholder="Enter Total Seats " type="text"
                                   class="form-control" required="required">
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

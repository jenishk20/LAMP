@extends('layouts.header')
@section('jk')
    <div class="container mt-5 style:bb">

        <table class="table table-striped table-hover text-dark" style="font-size: large" >
            <thead>
            <tr>

                <th scope="col">#</th>
                <th scope="col">Train Name</th>
                <th scope="col">Source</th>
                <th scope="col">Destination</th>
                <th scope="col">Trip Cost</th>

            </tr>
            </thead>
            <tbody>


            @for($i=0;$i<count($trips);$i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$train_name[$i]}}</td>
                    <td>{{$from_station[$i]}}</td>
                    <td>{{$to_station[$i]}}</td>
                    <td>{{$trips[$i]->trip_cost}}</td>


                </tr>
            @endfor


            </tbody>
        </table>
    </div>
@endsection

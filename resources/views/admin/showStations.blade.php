@extends('layouts.header')
@section('jk')
    <div class="container mt-5">
        <table class="table table-striped table-hover text-dark" style="font-size: large">
            <thead>
            <tr>

                <th scope="col">#</th>
                <th scope="col">Station Name</th>
                <th scope="col">Station Helpline Number</th>

            </tr>
            </thead>
            <tbody>


            @for($i=0;$i<count($stations);$i++)
                <tr>
                    <th scope="row">{{$i+1}}</th>
                    <td>{{$stations[$i]->station_name}}</td>
                    <td>{{$stations[$i]->contact_number}}</td>

                </tr>
            @endfor


            </tbody>
        </table>
    </div>
@endsection
